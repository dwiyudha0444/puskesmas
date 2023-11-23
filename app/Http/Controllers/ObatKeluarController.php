<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObatKeluar;
use DB;

class ObatKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obat_keluar = ObatKeluar::orderBy('id','DESC')->get();
        return view('admin.obat_keluar.index',compact('obat_keluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.obat_keluar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Misalkan Anda menerima data dari formulir melalui $request
        $tgl_keluar = $request->input('tgl_keluar');
        $keterangan_keluar = $request->input('keterangan_keluar');
        $id_users = $request->input('id_users');

        // Memasukkan data ke dalam tabel
        DB::table('tbl_obat_keluar')->insert([
            'tgl_keluar' => $tgl_keluar,
            'keterangan_keluar' => $keterangan_keluar,
            'id_users' => $id_users,
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
        $obke= ObatKeluar::find($id);
        ObatKeluar::where('id',$id)->delete();
        return redirect()->route('obat-keluar.index')
            ->with('success','Data Berhasil Dihapus');
    }
}
