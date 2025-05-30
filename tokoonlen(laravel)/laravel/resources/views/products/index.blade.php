@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="hero-section text-center">
    <div class="container">
        <h1>Welcome to Toko Online</h1>
        <p class="lead">Find the best products at the best prices</p>
    </div>
</div>

<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Categories</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('home') }}" class="btn {{ !request('category') ? 'btn-primary' : 'btn-outline-primary' }}">All</a>
                        @foreach($categories as $cat)
                            <a href="{{ route('home', ['category' => $cat->name]) }}" 
                               class="btn {{ request('category') == $cat->name ? 'btn-primary' : 'btn-outline-primary' }}">
                                {{ $cat->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @forelse($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card product-card h-100">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top product-image" alt="{{ $product->name }}">
                    @else
                        <img src="{{ asset('images/no-image.jpg') }}" class="card-img-top product-image" alt="No Image">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-truncate">{{ $product->description }}</p>
                        <div class="mt-auto">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-primary fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                <a href="{{ route('product.show', $product->id) }}" class="btn btn-sm btn-outline-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <small class="text-muted">Category: {{ $product->category->name }}</small>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    No products found.
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection