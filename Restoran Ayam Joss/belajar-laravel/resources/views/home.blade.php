@extends('layouts.app')
@section('content')

{{-- Banner Carousel --}}
<div id="carouselBanner" class="carousel slide mb-4" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($banners as $index => $banner)
        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
            <a href="{{ url('/menu') }}">
                <img src="{{ asset('images/' . $banner->gambar) }}" class="d-block w-100 banner-img clickable-banner" alt="{{ $banner->judul }}" style="max-height: 400px;">
            </a>
            @if($banner->judul)
            <div class="carousel-caption d-none d-md-block">
                <h5>{{ $banner->judul }}</h5>
            </div>
            @endif
        </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselBanner" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselBanner" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

{{-- Produk --}}
<h2 class="text-center mb-4">Menu Pilihan</h2>
<div class="row">
    @foreach($produks as $produk)
    <div class="col-md-4 mb-3">
        <div class="card">
            <img src="{{ asset('images/' . $produk->gambar) }}" class="card-img-top" alt="{{ $produk->nama }}">
            <div class="card-body text-center">
                <h5 class="card-title">{{ $produk->nama }}</h5>
                <p class="card-text">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                <a href="{{ url('/order') }}" class="btn btn-danger">Pesan Sekarang</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
