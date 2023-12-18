<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermintaanDetail;
use App\Models\Obat;
use DB;
use PDF;

class PermintaanDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function expPDF()
     {
         $permintaan_detail = PermintaanDetail::whereMonth('created_at', now()->month)->get();
         // dd($permintaan_detail);
         
         $pdf = PDF::loadView('admin.permintaan_detail.exppdf', ['permintaan_detail' => $permintaan_detail]);
         
         return $pdf->download('permintaan_detail.pdf');
     }

    public function index()
    {
        $permintaan_detail = PermintaanDetail::orderBy('id','DESC')->get();
        return view('admin.permintaan_detail.index',compact('permintaan_detail'));
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
        $rel_obat = Obat::all();
        $per = PermintaanDetail::find($id);
        return view('admin.permintaan_detail.edit',compact('per','rel_obat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_obat' => 'required',
            'persediaan' => 'required',
            'status' => 'required'
            ]);
            
            
            DB::table('tbl_permintaan_detail')->where('id',$id)->update(
                [
                    'id_obat' => $request->id_obat,
                    'persediaan' => $request->persediaan,
                    'status' => $request->status,
                    'created_at' => now(),
              ]);
            
            return redirect('/permintaan-detail')
            ->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $per = PermintaanDetail::find($id);
        PermintaanDetail::where('id',$id)->delete();
        return redirect()->route('permintaan-detail.index')
            ->with('success','Data Berhasil Dihapus');
    }
}
