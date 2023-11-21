<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::orderBy('id','DESC')->get();
        return view('admin.user.index',compact('user'));
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
        $us = User::find($id);
        return view('admin.user.detail',compact('us'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $us = User::find($id);
        return view('admin.user.edit',compact('us'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'role' => 'required'
            ]);
            
            
            DB::table('users')->where('id',$id)->update(
                [
                    'role' => $request->role,
                    'created_at' => now(),
              ]);
            
            return redirect('/user')
            ->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $us = User::find($id);
        User::where('id',$id)->delete();
        return redirect()->route('user.index')
            ->with('success','Data Berhasil Dihapus');
    }
}
