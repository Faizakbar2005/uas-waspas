@extends('layouts.master')
@section('content')
    @if(count($errors)>0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
      {{ $error }}
    </div>
    @endforeach
  @endif

  @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
      {{ Session('success') }}
    </div>

  @endif
<div class="col-lg-12 order-lg-1">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Produk</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('produk.update' , $produk->id ) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" value="{{ $produk->nama }}">
            </div>
            <div class="form-group">
                <label>Tanggung Jawab</label>
                <input type="number" step="any" class="form-control" name="c1" value="{{ $produk->c1 }}">
            </div>
            <div class="form-group">
                <label>Disiplin</label>
                <input type="number" step="any" class="form-control" name="c2" value="{{ $produk->c2 }}">
            </div>
            <div class="form-group">
                <label>Komunikasi</label>
                <input type="number" step="any" class="form-control" name="c3" value="{{ $produk->c3 }}">
            </div>
            <div class="form-group">
                <label>Inisiatif</label>
                <input type="number" step="any" class="form-control" name="c4" value="{{ $produk->c4 }}">
            </div>
            <div class="form-group">
                <label>Keaktifan</label>
                <input type="number" step="any" class="form-control" name="c5" value="{{ $produk->c5 }}">
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-block">Update Produk</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection