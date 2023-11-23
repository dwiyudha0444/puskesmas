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
    
        // Memasukkan data ke dalam tabel
        DB::table('tbl_obat_masuk')->insert([
            'tgl_masuk' => $tgl_masuk,
            'keterangan_masuk' => $keterangan_masuk,
            'id_users' => $id_users,
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
