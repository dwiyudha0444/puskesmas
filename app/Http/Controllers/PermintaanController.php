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
                $id_permintaan = $request->input('id_permintaan');
                $id_obat = $request->input('id_obat');
            
                // Memasukkan data ke dalam tabel tbl_permintaan dan mendapatkan ID baru
                $obatPermintaanId = DB::table('tbl_permintaan')->insertGetId([
                    'tgl_permintaan' => $tgl_permintaan,
                    'keterangan_permintaan' => $keterangan_permintaan,
                    'id_users' => $id_users,
                ]);
            
                // Memasukkan data ke dalam tabel tbl_permintaan dengan menggunakan ID baru
                DB::table('tbl_permintaan_detail')->insert([
                    'id_permintaan' => $obatPermintaanId,
                    'id_obat' => $id_obat,
                    'created_at' => now(),
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
        $per = Permintaan::find($id);
        return view('admin.permintaan.edit',compact('per'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tgl_permintaan' => 'required',
            'keterangan_permintaan' => 'required'
            ]);
            
            
            DB::table('tbl_permintaan')->where('id',$id)->update(
                [
                    'tgl_permintaan' => $request->tgl_permintaan,
                    'keterangan_permintaan' => $request->keterangan_permintaan,
                    'created_at' => now(),
              ]);
            
            return redirect('/permintaan')
            ->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $per = Permintaan::find($id);
        Permintaan::where('id',$id)->delete();
        return redirect()->route('permintaan.index')
            ->with('success','Data Berhasil Dihapus');
    }
}
