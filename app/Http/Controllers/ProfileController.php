<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $us = User::find($id);
        return view('admin.profile.edit',compact('us'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'nip' => 'required|max:45',
            'email' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg'
            ]);
            //Film::create($request->all());
            //---ambil foto lama
            $foto = DB::table('users')->select('foto')->where('id',$id)->get();
            foreach($foto as $co){
                $namaFileFotoLama = $co->foto;
            }
            //---aoakah user ingin ganti foto lama
            if(!empty($request->foto)){
                //jika ada foto lama , hapus terlebih dahulu
                if(!empty($fil->foto)) unlink('assets/profile/img'.$fil->foto);
                //foto lama ganti foto baru
                $fileName=$request->name.'.'.$request->foto->extension();
                //$fileName=$request->foto->getClientOriginalName();
                $request->foto->move(public_path('assets/profile/img'),$fileName);
            }
            //---user tidak ganti foto lama
            else{
                $fileName = $namaFileFotoLama;
            }
            DB::table('users')->where('id',$id)->update(
                [
                    'name' => $request->name,
                    'nip' => $request->nip,
                    'email' => $request->email,
                    'foto' => $fileName,
                    'updated_at' => now(),
              ]);
            
            return redirect('/profile')
            ->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
