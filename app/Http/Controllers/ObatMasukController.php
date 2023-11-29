<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObatMasuk;
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
        return view('admin.obat_masuk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Misalkan Anda menerima data dari formulir melalui $request
        $tgl_masuk = $request->input('tgl_masuk');
        $keterangan_masuk = $request->input('keterangan_masuk');
        $id_users = $request->input('id_users');
        $id_obat_masuk = $request->input('id_obat_masuk');
        $id_obat = $request->input('id_obat');
    
        // Memasukkan data ke dalam tabel tbl_obat_keluar dan mendapatkan ID baru
        $obatMasukId = DB::table('tbl_obat_masuk')->insertGetId([
            'tgl_masuk' => $tgl_masuk,
            'keterangan_masuk' => $keterangan_masuk,
            'id_users' => $id_users,
        ]);

        // Memasukkan data ke dalam tabel tbl_persediaan dengan menggunakan ID baru
        DB::table('tbl_persediaan')->insert([
            'id_obat_masuk' => $obatMasukId,
            'id_obat' => $id_obat,
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
        return view('admin.obat_masuk.edit',compact('obmas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tgl_masuk' => 'required',
            'keterangan_masuk' => 'required'
            ]);
            
            
            DB::table('tbl_obat_masuk')->where('id',$id)->update(
                [
                    'tgl_masuk' => $request->tgl_masuk,
                    'keterangan_masuk' => $request->keterangan_masuk,
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
