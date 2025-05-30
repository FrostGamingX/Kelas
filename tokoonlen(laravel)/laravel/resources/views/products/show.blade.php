@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('home', ['category' => $product->category->name]) }}">{{ $product->category->name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-5">
            <div class="card">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                @else
                    <img src="{{ asset('images/no-image.jpg') }}" class="card-img-top" alt="No Image">
                @endif
            </div>
        </div>
        <div class="col-md-7">
            <h1>{{ $product->name }}</h1>
            <div class="badge bg-primary mb-3">{{ $product->category->name }}</div>
            <h3 class="text-primary mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>
            <div class="mb-4">
                <h5>Description:</h5>
                <p>{{ $product->description }}</p>
            </div>
            
            @auth
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-auto">
                            <label for="quantity" class="col-form-label">Quantity:</label>
                        </div>
                        <div class="col-auto">
                            <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </div>
                    </div>
                </form>
            @else
                <div class="alert alert-info">
                    Please <a href="{{ route('login') }}">login</a> to add this product to your cart.
                </div>
            @endauth
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Comments</h5>
                </div>
                <div class="card-body">
                    @forelse($product->comments as $comment)
                        <div class="mb-4 pb-3 border-bottom">
                            <div class="d-flex justify-content-between">
                                <h6>{{ $comment->user->name }}</h6>
                                <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                            </div>
                            <p>{{ $comment->content }}</p>
                            
                            @if(Auth::check() && (Auth::id() == $comment->user_id || Auth::user()->is_admin))
                                <form action="{{ route('comment.destroy', $comment->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            @endif
                        </div>
                    @empty
                        <p>No comments yet.</p>
                    @endforelse

                    @auth
                        <form action="{{ route('comment.store', $product->id) }}" method="POST" class="mt-4">
                            @csrf
                            <div class="mb-3">
                                <label for="content" class="form-label">Add a comment:</label>
                                <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    @else
                        <div class="alert alert-info mt-4">
                            Please <a href="{{ route('login') }}">login</a> to add a comment.
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection