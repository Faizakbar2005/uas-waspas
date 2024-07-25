<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPK WASPAS</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5;
            color: #333;
        }
        .header {
            background-color: #007BFF;
            padding: 20px;
            text-align: center;
            color: white;
            position: relative;
        }
        .header h1 {
            margin: 0;
        }
        .nav {
            position: absolute;
            right: 20px;
            top: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }
        .nav-link {
            margin-bottom: 10px;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: transparent;
            transition: background-color 0.3s, color 0.3s;
        }
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .content h2 {
            color: #007BFF;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }
        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }
        .card img {
            max-width: 100px;
            margin-bottom: 20px;
        }
        .card h3 {
            margin-bottom: 10px;
            color: #333;
        }
        .card p {
            color: #777;
        }
        .box {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        .box h3 {
            margin-top: 0;
            color: #007BFF;
        }
        .footer {
            text-align: center;
            padding: 20px;
            background-color: #f0f2f5;
            color: #777;
        }
        .card-name {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            border: 1px solid #ddd;
        }
        .card-name h3 {
            margin-bottom: 10px;
            color: #333;
            font-size: 1.2em;
        }
        .card-name p {
            color: #777;
            font-size: 1em;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Selamat Datang di Sistem Perhitungan Metode WASPAS</h1>
        <p>Projek Ujian Akhir Semester Mata Kuliah Framework Programming dan Sistem Pendukung Keputusan</p>
        @if (Route::has('login'))
            <nav class="nav">
                @auth
                    <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="nav-link">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    @endif
                @endauth
            </nav>
        @endif
    </div>
    <div class="container">
        <div class="content">
            <h2>Anggota Kelompok 1</h2>
            <div class="grid">
                <div class="card-name">
                    <h3>Sep Sarip Hidayatulloh</h3>
                    <p>2207411011</p>
                </div>
                <div class="card-name">
                    <h3>Faiz Akbar</h3>
                    <p>2207411010</p>
                </div>
                <div class="card-name">
                    <h3>Tia Anata</h3>
                    <p>2207411012</p>
                </div>
            </div>
        </div>

        <div class="box">
            <h3>Definisi WASPAS</h3>
            <p>WASPAS (Weighted Aggregated Sum Product Assessment) adalah metode pengambilan keputusan multi-kriteria yang menggabungkan pendekatan penjumlahan berbobot dan pendekatan produk berbobot. Metode ini digunakan untuk mengevaluasi dan memilih alternatif terbaik dari beberapa pilihan berdasarkan sejumlah kriteria yang telah ditentukan.</p>
        </div>

        <div class="box">
            <h3>Kelebihan dan Kekurangan WASPAS</h3>
            <h4>Kelebihan:</h4>
            <ul>
                <li>Menggabungkan dua pendekatan, sehingga memberikan hasil yang lebih akurat dan dapat diandalkan.</li>
                <li>Mudah diimplementasikan dan digunakan dalam berbagai jenis masalah pengambilan keputusan.</li>
                <li>Mempertimbangkan bobot masing-masing kriteria, sehingga hasil akhir lebih objektif.</li>
            </ul>
            <h4>Kekurangan:</h4>
            <ul>
                <li>Membutuhkan penentuan bobot yang akurat untuk setiap kriteria, yang bisa subjektif.</li>
                <li>Memerlukan pemahaman yang baik tentang metode ini untuk menghindari kesalahan dalam perhitungan.</li>
            </ul>
        </div>

        <div class="content">
            <h2>Tahapan WASPAS</h2>
            <div class="grid">
                <div class="card">
                    <h3>Tahap 1</h3>
                    <p>Menentukan kriteria yang relevan untuk pengambilan keputusan.</p>
                </div>
                <div class="card">
                    <h3>Tahap 2</h3>
                    <p>Menentukan bobot untuk setiap kriteria berdasarkan tingkat kepentingannya.</p>
                </div>
                <div class="card">
                    <h3>Tahap 3</h3>
                    <p>Menyusun matriks keputusan berdasarkan nilai setiap alternatif untuk masing-masing kriteria.</p>
                </div>
                <div class="card">
                    <h3>Tahap 4</h3>
                    <p>Menghitung skor dengan metode penjumlahan berbobot (WAM) dan metode produk berbobot (WPM).</p>
                </div>
                <div class="card">
                    <h3>Tahap 5</h3>
                    <p>Menggabungkan hasil dari WAM dan WPM untuk mendapatkan skor akhir setiap alternatif.</p>
                </div>
                <div class="card">
                    <h3>Tahap 6</h3>
                    <p>Menentukan peringkat alternatif berdasarkan skor akhir untuk memilih alternatif terbaik.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </div>
</body>
</html>
