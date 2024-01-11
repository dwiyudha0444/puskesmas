<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use PDF;

class LplpoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function expPDF()
     {
        $obat = Obat::whereMonth('created_at', now()->month)->get();
        $latestObat = Obat::latest()->first();
        
        $pdf = PDF::loadView('admin.lplpo.exppdf', [
            'obat' => $obat,
            'latestObat' => $latestObat,
        ]);
        
        return $pdf->download('LPLPO.pdf');

     }

    public function index()
    {
        //
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
