@extends('layouts.master')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Nilai Min dan Max Kriteria</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Kriteria</th>
                    <th>Min</th>
                    <th>Max</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>c1</td>
                    <td>{{ $c1min['produks'] }}</td>
                    <td>{{ $c1max['produks'] }}</td>
                </tr>
                <tr>
                    <td>c2</td>
                    <td>{{ $c2min['produks'] }}</td>
                    <td>{{ $c2max['produks'] }}</td>
                </tr>
                <tr>
                    <td>c3</td>
                    <td>{{ $c3min['produks'] }}</td>
                    <td>{{ $c3max['produks'] }}</td>
                </tr>
                <tr>
                    <td>c4</td>
                    <td>{{ $c4min['produks'] }}</td>
                    <td>{{ $c4max['produks'] }}</td>
                </tr>
                <tr>
                    <td>c5</td>
                    <td>{{ $c5min['produks'] }}</td>
                    <td>{{ $c5max['produks'] }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Bobot</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    @foreach ($kriteria as $item)
                    <th>{{ $item->bobot }} %</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <!-- Data rows will go here if needed -->
            </tbody>
        </table>
    </div>
</div>


@include('admin.waspas.normalisasi')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Menghitung Nilai Qi</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>WSM</th>
                    <th>WPM</th>
                    <th>Qi</th>
                    <th>Rank</th>
                </tr>
            </thead>
            <tbody>
                @php
                    // Buat array untuk menyimpan nilai WSM dan WPM beserta nama produk
                    $results = [];
                    foreach ($data as $item) {
                        $wsm = (((($item->c1 / $c1max['produks']) * $widget1['kriterias']) +
                               (($item->c2 / $c2max['produks']) * $widget2['kriterias']) +
                               (($item->c3 / $c3max['produks']) * $widget3['kriterias']) +
                               (($item->c4 / $c4max['produks']) * $widget4['kriterias']) +
                               (($item->c5 / $c5max['produks']) * $widget5['kriterias'])) * 0.5);

                        $wpm = ((pow($item->c1 / $c1max['produks'], $widget1['kriterias'])) *
                               (pow($item->c2 / $c2max['produks'], $widget2['kriterias'])) *
                               (pow($item->c3 / $c3max['produks'], $widget3['kriterias'])) *
                               (pow($item->c4 / $c4max['produks'], $widget4['kriterias'])) *
                               (pow($item->c5 / $c5max['produks'], $widget5['kriterias'])) * 0.5);

                               $qi = $wsm + $wpm;

                        $results[] = [
                            'nama' => $item->nama,
                            'wsm' => $wsm,
                            'wpm' => $wpm,
                            'qi' => $qi
                        ];
                    }

                    // Urutkan hasil berdasarkan WSM dan WPM untuk mendapatkan rank
                    usort($results, function ($a, $b) {
                        return $b['wsm'] <=> $a['wsm']; // Urutkan berdasarkan WSM, dapatkan ranking secara menurun
                    });

                    $rankedResults = array_map(function ($item, $index) {
                        $item['rank'] = $index + 1; // Tambahkan ranking, mulai dari 1
                        return $item;
                    }, $results, array_keys($results));
                @endphp

                @foreach ($rankedResults as $item)
                <tr>
                    <td>{{ $item['nama'] }}</td>
                    <td>{{ $item['wsm'] }}</td>
                    <td>{{ $item['wpm'] }}</td>
                    <td>{{ $item['qi'] }}</td>
                    <td>{{ $item['rank'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
