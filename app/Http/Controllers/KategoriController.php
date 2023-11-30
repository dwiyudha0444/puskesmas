<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::orderBy('id','DESC')->get();
        return view('admin.kategori.index',compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //arahkan ke form input data
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                
        // Misalkan Anda menerima data dari formulir melalui $request
        $nama_kategori = $request->input('nama_kategori');
        
        // Memasukkan data ke dalam tabel
        DB::table('tbl_kategori')->insert([
            'nama_kategori' => $nama_kategori,
            ]);
                
        return redirect('/kategori')->with('success', 'Data Berhasil Diubah');
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
        $kat = Kategori::find($id);
        //arahkan ke form input data
        return view('admin.kategori.edit',compact('kat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kategori' => 'required',
            ]);
            
            
            DB::table('tbl_kategori')->where('id',$id)->update(
                [
                    'nama_kategori' => $request->nama_kategori,
                    'created_at' => now(),
              ]);
            
            return redirect('/kategori')
            ->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ob = Kategori::find($id);
        Kategori::where('id',$id)->delete();
        return redirect()->route('kategori.index')
            ->with('success','Data Berhasil Dihapus');
    }
}
