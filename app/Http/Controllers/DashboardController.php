<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Obat;
use App\Models\Kategori;
use App\Models\ObatKeluar;
use App\Models\Pemakaian;
use App\Models\ObatMasuk;
use App\Models\Persediaan;
use App\Models\Permintaan;
use App\Models\PermintaanDetail;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalUser = User::count();
        $totalObat = Obat::count();
        $totalKategori = Kategori::count();
        $totalObatKeluar = ObatKeluar::count();
        $totalPemakaian = Pemakaian::count();
        $totalObatMasuk = ObatMasuk::count();
        $totalPersediaan = Persediaan::count();
        $totalPermintaan = Permintaan::count();
        $totalPermintaanDetail = PermintaanDetail::count();

        return view('admin.dashboard.index')
        ->with('totalUser',$totalUser)
        ->with('totalObat',$totalObat)
        ->with('totalKategori',$totalKategori)
        ->with('totalObatKeluar',$totalObatKeluar)
        ->with('totalPemakaian',$totalPemakaian)
        ->with('totalObatMasuk',$totalObatMasuk)
        ->with('totalPersediaan',$totalPersediaan)
        ->with('totalPermintaan',$totalPermintaan)
        ->with('totalPermintaanDetail',$totalPermintaanDetail);
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
