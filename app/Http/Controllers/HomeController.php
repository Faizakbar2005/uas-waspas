<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Produk;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlahAlternatif = Produk::count();
        $jumlahKriteria = Kriteria::count();

        // Ambil semua produk
        $produk = Produk::get();

        // Ambil semua kriteria dan bobotnya
        $kriteriaList = Kriteria::all();

        // Jika jumlah kriteria kurang dari 5, batalkan perhitungan
        if ($jumlahKriteria < 5) {
            return redirect()->back()->with('error', 'Jumlah kriteria harus minimal 5.');
        }

        // Bobot dari kriteria
        $bobot = [];
        foreach ($kriteriaList as $item) {
            $bobot[$item->kode] = $item->bobot / 100;
        }

        // Ambil nilai min dan max untuk setiap kriteria
        $c1max = Produk::max('c1');
        $c2max = Produk::max('c2');
        $c3max = Produk::max('c3');
        $c4max = Produk::max('c4');
        $c5max = Produk::max('c5');

        // Perhitungan nilai Qi
        $rankingData = $produk->map(function ($item) use ($c1max, $c2max, $c3max, $c4max, $c5max, $bobot) {
            // Perhitungan nilai Qi
            $wsm = 
                (($item->c1 / $c1max) * $bobot['C1']) +
                (($item->c2 / $c2max) * $bobot['C2']) +
                (($item->c3 / $c3max) * $bobot['C3']) +
                (($item->c4 / $c4max) * $bobot['C4']) +
                (($item->c5 / $c5max) * $bobot['C5']);

            $wpm = 
                pow(($item->c1 / $c1max), $bobot['C1']) *
                pow(($item->c2 / $c2max), $bobot['C2']) *
                pow(($item->c3 / $c3max), $bobot['C3']) *
                pow(($item->c4 / $c4max), $bobot['C4']) *
                pow(($item->c5 / $c5max), $bobot['C5']);

            $qi = (0.5 * $wsm) + (0.5 * $wpm);

            $item->qi = $qi;

            return $item;
        });

        // Urutkan berdasarkan nilai Qi
        $rankingData = $rankingData->sortByDesc('qi')->values();

        return view('admin.waspas.home', compact('jumlahAlternatif', 'jumlahKriteria', 'rankingData'));
    }
}
