@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Selamat Datang</h1>

    <!-- Definisi WASPAS -->
    <div class="mb-4">
        <h2 class="h4 mb-3 font-weight-bold">Apa itu WASPAS?</h2>
        <p>
            WASPAS (Weighted Aggregated Sum Product Assessment) adalah metode sistem pendukung keputusan yang digunakan untuk mengevaluasi dan merangking alternatif berdasarkan berbagai kriteria. Metode ini menggabungkan dua model utama: Model Jumlah Tertimbang (WSM) dan Model Produk Tertimbang (WPM). WSM menghitung nilai tertimbang dari alternatif dengan menjumlahkan hasil perkalian antara nilai kriteria dan bobot kriteria, sedangkan WPM menghitung nilai tertimbang dengan mengalikan hasil pangkat dari nilai kriteria dan bobot kriteria. Penggabungan kedua model ini memberikan pendekatan yang lebih komprehensif dalam menentukan keputusan yang optimal.
        </p>
    </div>

    <!-- Kelebihan dan Kekurangan -->
    <div class="row mb-4">
        <div class="col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <h4 class="font-weight-bold text-success">Kelebihan WASPAS</h4>
                    <ul>
                        <li>Mampu mengintegrasikan berbagai kriteria untuk penilaian yang lebih komprehensif.</li>
                        <li>Memberikan hasil yang lebih stabil dengan menggabungkan metode WSM dan WPM.</li>
                        <li>Memudahkan dalam pengambilan keputusan dengan memberikan ranking alternatif yang jelas.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <h4 class="font-weight-bold text-danger">Kekurangan WASPAS</h4>
                    <ul>
                        <li>Memerlukan penetapan bobot kriteria yang akurat, yang dapat menjadi subyektif.</li>
                        <li>Pengaruh dari bobot yang tidak seimbang dapat mempengaruhi hasil akhir secara signifikan.</li>
                        <li>Proses perhitungan yang kompleks dapat membutuhkan waktu dan sumber daya yang lebih.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Tahapan WASPAS -->
    <div class="mb-4">
        <h2 class="h4 mb-3 font-weight-bold">Tahapan dalam Metode WASPAS</h2>
        <p>
            Metode WASPAS melalui beberapa tahapan utama sebagai berikut:
        </p>
        <ol>
            <li><strong>Pengumpulan Data:</strong> Mengumpulkan data alternatif dan kriteria yang relevan untuk evaluasi.</li>
            <li><strong>Pemberian Bobot:</strong> Menetapkan bobot untuk setiap kriteria berdasarkan pentingnya masing-masing kriteria.</li>
            <li><strong>Normalisasi Data:</strong> Menormalkan data agar semua kriteria berada dalam skala yang sama.</li>
            <li><strong>Perhitungan WSM dan WPM:</strong> Menghitung nilai tertimbang menggunakan metode WSM dan WPM.</li>
            <li><strong>Penggabungan Hasil:</strong> Menggabungkan hasil dari kedua metode untuk mendapatkan ranking akhir alternatif.</li>
            <li><strong>Analisis dan Pengambilan Keputusan:</strong> Menganalisis hasil dan membuat keputusan berdasarkan ranking akhir yang diperoleh.</li>
        </ol>
    </div>

</div>
@endsection
