<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Kategori;
use DB;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obat = Obat::orderBy('id','DESC')->get();
        return view('admin.obat.index',compact('obat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //ambil master untuk dilooping di select option
        $rel_kategori = Kategori::all();
        //arahkan ke form input data
        return view('admin.obat.create',compact('rel_kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // Misalkan Anda menerima data dari formulir melalui $request
        $id_kategori = $request->input('id_kategori');
        $nama_obat = $request->input('nama_obat');
        $kode_obat = $request->input('kode_obat');
        $satuan = $request->input('satuan');
        $stok_awal = $request->input('stok_awal');
        $sisa_stok = $request->input('sisa_stok');
        $penerimaan = $request->input('penerimaan');
        $persediaan = $request->input('persediaan');
        $pemakaian = $request->input('pemakaian');
        $permintaan = $request->input('permintaan');
        
        // Memasukkan data ke dalam tabel
        DB::table('tbl_obat')->insert([
            'id_kategori' => $id_kategori,
            'nama_obat' => $nama_obat,
            'kode_obat' => $kode_obat,
            'satuan' => $satuan,
            'stok_awal' => $stok_awal,
            'sisa_stok' => $sisa_stok,
            'penerimaan' => $penerimaan,
            'persediaan' => $persediaan,
            'pemakaian' => $pemakaian,
            'permintaan' => $permintaan,
            'created_at' => now(),
            ]);
                
        return redirect('/obat')->with('success', 'Data Berhasil Diubah');
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
        //ambil master untuk dilooping di select option
        $rel_kategori = Kategori::all();
        $ob = Obat::find($id);
        //arahkan ke form input data
        return view('admin.obat.edit',compact('ob','rel_kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_kategori' => 'required',
            'nama_obat' => 'required',
            'kode_obat' => 'required',
            'satuan' => 'required',
            'stok_awal' => 'required',
            'sisa_stok' => 'required',
            'penerimaan' => 'required',
            'persediaan' => 'required',
            'pemakaian' => 'required',
            'permintaan' => 'required',
            ]);
            
            
            DB::table('tbl_obat')->where('id',$id)->update(
                [
                    'id_kategori' => $request->id_kategori,
                    'nama_obat' => $request->nama_obat,
                    'kode_obat' => $request->kode_obat,
                    'satuan' => $request->satuan,
                    'stok_awal' => $request->stok_awal,
                    'sisa_stok' => $request->sisa_stok,
                    'penerimaan' => $request->penerimaan,
                    'persediaan' => $request->persediaan,
                    'pemakaian' => $request->pemakaian,
                    'permintaan' => $request->permintaan,
                    'created_at' => now(),
              ]);
            
            return redirect('/obat')
            ->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ob = Obat::find($id);
        Obat::where('id',$id)->delete();
        return redirect()->route('obat.index')
            ->with('success','Data Berhasil Dihapus');
    }
}
