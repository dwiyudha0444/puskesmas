<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObatKeluar;
use App\Models\Pemakaian;
use App\Models\Obat;
use DB;
use PDF;

class ObatKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $rel_obat = Obat::all();
        $obat_keluar = ObatKeluar::orderBy('id','DESC')->get();
        return view('admin.obat_keluar.index',compact('obat_keluar','rel_obat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rel_obat = Obat::all();
        return view('admin.obat_keluar.create',compact('rel_obat'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // Misalkan Anda menerima obat_keluar dari formulir melalui $request
        $id_obat2 = $request->input('id_obat');
        $tgl_keluar = $request->input('tgl_keluar');
        $keterangan_keluar = $request->input('keterangan_keluar');
        $satuan = $request->input('satuan');
        $jumlah = $request->input('jumlah');
        $id_users = $request->input('id_users');
        $id_obat_keluar = $request->input('id_obat_keluar');
        $id_obat = $request->input('id_obat');
    
        // Memasukkan obat_keluar ke dalam tabel tbl_obat_keluar dan mendapatkan ID baru
        $obatKeluarId = DB::table('tbl_obat_keluar')->insertGetId([
            'id_obat' => $id_obat2,
            'tgl_keluar' => $tgl_keluar,
            'keterangan_keluar' => $keterangan_keluar,
            'satuan' => $satuan,
            'jumlah' => $jumlah,
            'id_users' => $id_users,
            
        ]);
    
        // Memasukkan obat_keluar ke dalam tabel tbl_pemakaian dengan menggunakan ID baru
        DB::table('tbl_pemakaian')->insert([
            'id_obat_keluar' => $obatKeluarId,
            'id_obat' => $id_obat,
            'created_at' => now(),
        ]);
    
        return redirect('/obat-keluar')->with('success', 'Data Berhasil Diubah');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {           
                
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rel_obat = Obat::all();
        $obkel = ObatKeluar::find($id);
        return view('admin.obat_keluar.edit',compact('obkel','rel_obat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tgl_keluar' => 'required',
            'id_obat' => 'required',
            'keterangan_keluar' => 'required',
            'satuan' => 'required',
            'jumlah' => 'required'
            ]);
            
            
            DB::table('tbl_obat_keluar')->where('id',$id)->update(
                [
                    'tgl_keluar' => $request->tgl_keluar,
                    'id_obat' => $request->id_obat,
                    'keterangan_keluar' => $request->keterangan_keluar,
                    'satuan' => $request->satuan,
                    'jumlah' => $request->jumlah,
                    'created_at' => now(),
              ]);
            
            return redirect('/obat-keluar')
            ->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $obke= ObatKeluar::find($id);
        ObatKeluar::where('id',$id)->delete();
        return redirect()->route('obat-keluar.index')
            ->with('success','Data Berhasil Dihapus');
    }

    
}
