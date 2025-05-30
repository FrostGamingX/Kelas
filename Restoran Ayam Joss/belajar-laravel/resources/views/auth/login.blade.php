@extends('layouts.app')
@section('content')
<style>
    footer{
        position: absolute;
        bottom: 0;
        width: 100%
    }
</style>
<div class="container col-md-4 py-5">
    <h3 class="text-center mb-4">Login</h3>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <button class="btn btn-primary w-100">Login</button>
    </form>
</div>
@endsection
