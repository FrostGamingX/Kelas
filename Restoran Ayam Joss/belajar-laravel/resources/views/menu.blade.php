@extends('layouts.app')
@section('content')
<style>
    footer{
        position: absolute;
        bottom: 0;
        width: 100%
    }
</style>
<h2 class="text-center mb-4">Menu Kami</h2>

<div class="row">
    @foreach($produks as $produk)
    <div class="col-md-4 mb-3">
        <div class="card">
            <img src="{{ asset('images/' . $produk->gambar) }}" class="card-img-top" alt="{{ $produk->nama }}">
            <div class="card-body text-center">
                <h5 class="card-title">{{ $produk->nama }}</h5>
                <p class="card-text">{{ $produk->deskripsi }}</p>
                <p class="card-text">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                <a href="{{ url('/order') }}" class="btn btn-danger">Pesan Sekarang</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
