@extends('layouts.master')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('kriteria.create') }}" class="btn btn-primary float-right">
            <i class="fas fa-fw fa-plus-circle"></i>Tambah Data
        </a>
        <h5 class="m-0 font-weight-bold text-primary">Kriteria</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Bobot</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($kriteria as $key => $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->kode }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->bobot }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('kriteria.edit', $item->id) }}" class="btn btn-success btn-sm mr-1">
                                    <i class="fas fa-fw fa-edit"></i>
                                </a>
                                <form action="{{ route('kriteria.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        <i class="fas fa-fw fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
