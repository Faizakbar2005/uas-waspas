<?php

namespace App\Http\Controllers;

use App\Models\kriteria;
use App\Models\produk;
use Illuminate\Http\Request;

class HitungController extends Controller
{
    /**
     * Display the result of the WASPAS calculation.
     */
    public function hitung(Request $request)
    {
        // Ambil semua kriteria dari database
        $kriteria = kriteria::all()->keyBy('kode'); // Key by 'kode' untuk akses mudah

        // Ambil bobot dari kriteria dan hapus simbol persen jika ada
        $bobot1 = $this->parseBobot($kriteria['C1']->bobot ?? '0');
        $bobot2 = $this->parseBobot($kriteria['C2']->bobot ?? '0');
        $bobot3 = $this->parseBobot($kriteria['C3']->bobot ?? '0');
        $bobot4 = $this->parseBobot($kriteria['C4']->bobot ?? '0');
        $bobot5 = $this->parseBobot($kriteria['C5']->bobot ?? '0');

        $widget1 = ['kriterias' => $bobot1];
        $widget2 = ['kriterias' => $bobot2];
        $widget3 = ['kriterias' => $bobot3];
        $widget4 = ['kriterias' => $bobot4];
        $widget5 = ['kriterias' => $bobot5];

        // Ambil semua produk
        $produk = produk::get();
        $data = produk::orderBy('nama', 'asc')->get();

        // Ambil nilai min dan max untuk setiap kriteria
        $minc1 = produk::min('c1');
        $maxc1 = produk::max('c1');
        $minc2 = produk::min('c2');
        $maxc2 = produk::max('c2');
        $minc3 = produk::min('c3');
        $maxc3 = produk::max('c3');
        $minc4 = produk::min('c4');
        $maxc4 = produk::max('c4');
        $minc5 = produk::min('c5');
        $maxc5 = produk::max('c5');

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
            'c1min', 'c1max', 'c2min', 'c2max', 'c3min', 'c3max', 'c4min', 'c4max', 'c5min', 'c5max',
            'kriteria' // Pastikan 'kriteria' dikirimkan ke view
        ));
    }

    /**
     * Helper function to parse and convert bobot to numeric value
     *
     * @param string $bobot
     * @return float
     */
    private function parseBobot($bobot)
    {
        return (float) str_replace('%', '', $bobot) / 100;
    }
}
