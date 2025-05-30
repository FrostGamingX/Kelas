@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<div class="container">
    <h1 class="mb-4">Shopping Cart</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($cartItems->count() > 0)
        <div class="card">
            <div class="card-body">
                @foreach($cartItems as $item)
                    <div class="row cart-item">
                        <div class="col-md-2">
                            @if($item->product->image)
                                <img src="{{ asset('storage/' . $item->product->image) }}" class="img-fluid rounded" alt="{{ $item->product->name }}">
                            @else
                                <img src="{{ asset('images/no-image.jpg') }}" class="img-fluid rounded" alt="No Image">
                            @endif
                        </div>
                        <div class="col-md-4">
                            <h5><a href="{{ route('product.show', $item->product->id) }}" class="text-decoration-none">{{ $item->product->name }}</a></h5>
                            <p class="text-muted">{{ Str::limit($item->product->description, 100) }}</p>
                        </div>
                        <div class="col-md-2 text-center">
                            <p class="fw-bold">Rp {{ number_format($item->product->price, 0, ',', '.') }}</p>
                        </div>
                        <div class="col-md-2 text-center">
                            <p>{{ $item->quantity }}</p>
                        </div>
                        <div class="col-md-2 text-end">
                            <p class="fw-bold">Rp {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</p>
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="cart_id" value="{{ $item->id }}">
                                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                            </form>
                        </div>
                    </div>
                @endforeach

                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h5 class="card-title">Order Summary</h5>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Subtotal:</span>
                                    <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Shipping:</span>
                                    <span>Free</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between fw-bold">
                                    <span>Total:</span>
                                    <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                                </div>
                                <div class="d-grid gap-2 mt-3">
                                    <a href="{{ route('checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
                                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">Continue Shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-info">
            Your cart is empty. <a href="{{ route('home') }}">Continue shopping</a>.
        </div>
    @endif
</div>
@endsection