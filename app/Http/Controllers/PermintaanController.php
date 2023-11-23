<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permintaan;
use DB;

class PermintaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permintaan = Permintaan::orderBy('id','DESC')->get();
        return view('admin.permintaan.index',compact('permintaan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permintaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Misalkan Anda menerima data dari formulir melalui $request
        $tgl_permintaan = $request->input('tgl_permintaan');
        $keterangan_permintaan = $request->input('keterangan_permintaan');
        $id_users = $request->input('id_users');

        // Memasukkan data ke dalam tabel
        DB::table('tbl_permintaan')->insert([
            'tgl_permintaan' => $tgl_permintaan,
            'keterangan_permintaan' => $keterangan_permintaan,
            'id_users' => $id_users,
        ]);
        
        return redirect('/permintaan')->with('success', 'Data Berhasil Diubah');
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
        //
    }
}
