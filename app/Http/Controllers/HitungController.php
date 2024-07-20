<?php

namespace App\Http\Controllers;
use App\Models\kriteria;
use App\Models\produk;
use Illuminate\Http\Request;

class HitungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

    public function hitung(Request $request)
{
    $kriteria = kriteria::sum('bobot');

    // Bobot yang diberikan sebagai persentase
    $bobot1 = 30 / 100;
    $bobot2 = 25 / 100;
    $bobot3 = 10 / 100;
    $bobot4 = 20 / 100;
    $bobot5 = 15 / 100;

    $widget1 = ['kriterias' => $bobot1];
    $widget2 = ['kriterias' => $bobot2];
    $widget3 = ['kriterias' => $bobot3];
    $widget4 = ['kriterias' => $bobot4];
    $widget5 = ['kriterias' => $bobot5];

    // Ambil semua produk
    $produk = produk::get();
    
    $data = produk::orderBy('nama', 'asc')->get();

    // Ambil nilai min dan max untuk setiap kriteria
    $minc1 = produk::min('C1');
    $maxc1 = produk::max('C1');
    $minc2 = produk::min('C2');
    $maxc2 = produk::max('C2');
    $minc3 = produk::min('C3');
    $maxc3 = produk::max('C3');
    $minc4 = produk::min('C4');
    $maxc4 = produk::max('C4');
    $minc5 = produk::min('C5');
    $maxc5 = produk::max('C5');

    // Pastikan data min dan max valid dan tidak nol
    if ($maxc1 == 0 || $maxc2 == 0 || $maxc3 == 0 || $maxc4 == 0 || $maxc5 == 0) {
        abort(500, 'Max value for one or more criteria is zero.');
    }

    $c1min = ['produks' => $minc1];
    $c1max = ['produks' => $maxc1];
    $c2min = ['produks' => $minc2];
    $c2max = ['produks' => $maxc2];
    $c3min = ['produks' => $minc3];
    $c3max = ['produks' => $maxc3];
    $c4min = ['produks' => $minc4];
    $c4max = ['produks' => $maxc4];
    $c5min = ['produks' => $minc5];
    $c5max = ['produks' => $maxc5];

    // Perhitungan hasil WSM
    $hasil = $minc1 / $maxc1;
    $hasil1 = ['produks' => $hasil];

    return view('admin.waspas.hitung', compact(
        'hasil1', 'data', 'widget1', 'widget2', 'widget3', 'widget4', 'widget5', 
        'c1min', 'c1max', 'c2min', 'c2max', 'c3min', 'c3max', 'c4min', 'c4max', 'c5min', 'c5max'
    ));
}

}
