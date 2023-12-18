<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemakaian;
use App\Models\Obat;
use App\Models\ObatKeluar;
use DB;
use PDF;

class PemakaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function expPDF()
    {
        $pemakaian = Pemakaian::all();
        // dd($pemakaian);
        
        $pdf = PDF::loadView('admin.pemakaian.exppdf', ['pemakaian' => $pemakaian]);
        
        return $pdf->download('pemakaian.pdf');
    }

    public function index()
    {
        $pemakaian = Pemakaian::orderBy('id','DESC')->get();
        return view('admin.pemakaian.index',compact('pemakaian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //ambil master untuk dilooping di select option
        $rel_obat = Obat::all();
        $rel_obat_keluar = ObatKeluar::all();
        //arahkan ke form input data
        return view('admin.pemakaian.create',compact('rel_obat','rel_obat_keluar'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Misalkan Anda menerima data dari formulir melalui $request
        $id_obat = $request->input('id_obat');
        $jumlah_keluar = $request->input('jumlah_keluar');
        $id_obat_keluar = $request->input('id_obat_keluar');
        
        // Memasukkan data ke dalam tabel
        DB::table('tbl_pemakaian')->insert([
            'id_obat' => $id_obat,
            'jumlah_keluar' => $jumlah_keluar,
            'id_obat_keluar' => $id_obat_keluar,
            ]);
                
        return redirect('/pemakaian')->with('success', 'Data Berhasil Diubah');
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
        $pem = Pemakaian::find($id);
        return view('admin.pemakaian.edit',compact('pem','rel_obat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_obat' => 'required',
            'jumlah_keluar' => 'required'
            ]);
            
            
            DB::table('tbl_pemakaian')->where('id',$id)->update(
                [
                    'id_obat' => $request->id_obat,
                    'jumlah_keluar' => $request->jumlah_keluar,
                    'created_at' => now(),
              ]);
            
            return redirect('/pemakaian')
            ->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pem = Pemakaian::find($id);
        Pemakaian::where('id',$id)->delete();
        return redirect()->route('pemakaian.index')
            ->with('success','Data Berhasil Dihapus');
    }
}
