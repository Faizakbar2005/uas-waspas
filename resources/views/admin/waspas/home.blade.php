@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

      <!-- Penjelasan Proyek -->
    <div class="mb-4">
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#penjelasanProyek" aria-expanded="false" aria-controls="penjelasanProyek">
            Tampilkan Penjelasan Projek
        </button>
        <div class="collapse mt-3" id="penjelasanProyek">
            <div class="card card-body">
                <p class="font-weight-bold">
                Projek ini merupakan projek Ujian Akhir Semester oleh Kelompok 1. Proyek ini menggunakan metode WASPAS (Weighted Aggregated Sum Product Assessment) untuk mengevaluasi dan merangking alternatif berdasarkan berbagai kriteria. Metode WASPAS menggabungkan Model Jumlah Tertimbang (WSM) dan Model Produk Tertimbang (WPM) untuk mencapai proses pengambilan keputusan yang lebih akurat dan andal. Dalam proyek ini, kami menganalisis berbagai alternatif, menghitung nilai tertimbang mereka berdasarkan kriteria yang telah ditentukan, dan merangking mereka untuk menentukan pilihan terbaik.
                </p>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Total Data Alternatif Card -->
        <div class="col-l-3 col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Data Alternatif</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahAlternatif }} Orang</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-day fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Kriteria Card -->
        <div class="col-l-3 col-md-12 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Kriteria</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahKriteria }} Kriteria</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tasks fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Hasil Perangkingan -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Hasil Perangkingan WASPAS</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>WSM</th>
                        <th>WPM</th>
                        <th>Qi</th>
                        <th>Ranking</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rankingData as $index => $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->wsm }}</td>
                        <td>{{ $item->wpm }}</td>
                        <td>{{ $item->qi }}</td>
                        <td>{{ $index + 1 }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
