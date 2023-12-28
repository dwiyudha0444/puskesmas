<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persediaan;
use App\Models\Obat;
use DB;
use PDF;

class PersediaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function expPDF()
     {
        $persediaan = Persediaan::whereMonth('created_at', now()->month)->get();
        $latestPersediaan = Persediaan::latest()->first();
        
        $pdf = PDF::loadView('admin.persediaan.exppdf', [
            'persediaan' => $persediaan,
            'latestPersediaan' => $latestPersediaan,
        ]);
        
        return $pdf->download('persediaan.pdf');
     }

    public function index()
    {
        $persediaan = Persediaan::orderBy('id','DESC')->get();
        return view('admin.persediaan.index',compact('persediaan'));
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
        $per = Persediaan::find($id);
        return view('admin.persediaan.edit',compact('per','rel_obat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_obat' => 'required',
            'expired' => 'required',
            'persediaan_awal' => 'required',
            'jumlah_masuk' => 'required',
            'persediaan' => 'required',
            ]);
            
            
            DB::table('tbl_persediaan')->where('id',$id)->update(
                [
                    'id_obat' => $request->id_obat,
                    'expired' => $request->expired,
                    'persediaan_awal' => $request->persediaan_awal,
                    'jumlah_masuk' => $request->jumlah_masuk,
                    'persediaan' => $request->persediaan,
                    'created_at' => now(),
              ]);
            
            return redirect('/persediaan')
            ->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $per = Persediaan::find($id);
        Persediaan::where('id',$id)->delete();
        return redirect()->route('persediaan.index')
            ->with('success','Data Berhasil Dihapus');
    }
}
