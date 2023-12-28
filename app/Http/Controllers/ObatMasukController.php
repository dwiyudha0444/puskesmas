<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObatMasuk;
use App\Models\Obat;
use DB;

class ObatMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obat_masuk = ObatMasuk::orderBy('id','DESC')->get();
        return view('admin.obat_masuk.index',compact('obat_masuk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rel_obat = Obat::all();
        return view('admin.obat_masuk.create',compact('rel_obat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Misalkan Anda menerima data dari formulir melalui $request
        $id_obat2 = $request->input('id_obat');
        $tgl_masuk = $request->input('tgl_masuk');
        $keterangan_masuk = $request->input('keterangan_masuk');
        $satuan = $request->input('satuan');
        $jumlah = $request->input('jumlah');
        $id_users = $request->input('id_users');
        $id_obat_masuk = $request->input('id_obat_masuk');
        $id_obat = $request->input('id_obat');
    
        // Memasukkan data ke dalam tabel tbl_obat_keluar dan mendapatkan ID baru
        $obatMasukId = DB::table('tbl_obat_masuk')->insertGetId([
            'id_obat' => $id_obat2,
            'tgl_masuk' => $tgl_masuk,
            'keterangan_masuk' => $keterangan_masuk,
            'satuan' => $satuan,
            'jumlah' => $jumlah,
            'id_users' => $id_users,
        ]);

        // Memasukkan data ke dalam tabel tbl_persediaan dengan menggunakan ID baru
        DB::table('tbl_persediaan')->insert([
            'id_obat_masuk' => $obatMasukId,
            'id_obat' => $id_obat,
            'created_at' => now(),
            
        ]);

        return redirect('/obat-masuk')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $obmas = ObatMasuk::find($id);
        $rel_obat = Obat::all();
        return view('admin.obat_masuk.edit',compact('obmas','rel_obat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tgl_masuk' => 'required',
            'id_obat' => 'required',
            'keterangan_masuk' => 'required',
            'satuan' => 'required',
            'jumlah' => 'required'
            ]);
            
            
            DB::table('tbl_obat_masuk')->where('id',$id)->update(
                [
                    'tgl_masuk' => $request->tgl_masuk,
                    'id_obat' => $request->id_obat,
                    'keterangan_masuk' => $request->keterangan_masuk,
                    'satuan' => $request->satuan,
                    'jumlah' => $request->jumlah,
                    'created_at' => now(),
              ]);
            
            return redirect('/obat-masuk')
            ->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $obemas = ObatMasuk::find($id);
        ObatMasuk::where('id',$id)->delete();
        return redirect()->route('obat-masuk.index')
            ->with('success','Data Berhasil Dihapus');
    }
}
