<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kriteria;
use App\Models\produk;
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
        
        // Ambil nilai min dan max untuk setiap kriteria
        $c1max = Produk::max('c1');
        $c2max = Produk::max('c2');
        $c3max = Produk::max('c3');
        $c4max = Produk::max('c4');
        $c5max = Produk::max('c5');

        // Bobot yang diberikan sebagai persentase
        $widget1 = 0.30;
        $widget2 = 0.25;
        $widget3 = 0.10;
        $widget4 = 0.20;
        $widget5 = 0.15;

        // Perhitungan hasil WSM, WPM, dan Qi
        $rankingData = $produk->map(function ($item) use ($c1max, $c2max, $c3max, $c4max, $c5max, $widget1, $widget2, $widget3, $widget4, $widget5) {
            $wsm = 
                (($item->c1 / $c1max) * $widget1) +
                (($item->c2 / $c2max) * $widget2) +
                (($item->c3 / $c3max) * $widget3) +
                (($item->c4 / $c4max) * $widget4) +
                (($item->c5 / $c5max) * $widget5);

            $wpm = 
                pow(($item->c1 / $c1max), $widget1) *
                pow(($item->c2 / $c2max), $widget2) *
                pow(($item->c3 / $c3max), $widget3) *
                pow(($item->c4 / $c4max), $widget4) *
                pow(($item->c5 / $c5max), $widget5);

            $qi = (0.5 * $wsm) + (0.5 * $wpm);

            $item->wsm = $wsm;
            $item->wpm = $wpm;
            $item->qi = $qi;

            return $item;
        });

        // Urutkan berdasarkan nilai Qi
        $rankingData = $rankingData->sortByDesc('qi')->values();

        return view('admin.waspas.home', compact('jumlahAlternatif', 'jumlahKriteria', 'rankingData'));
    }
}
