@extends('layouts.app')
@section('content')
<style>
    footer{
        position: absolute;
        bottom: 0;
        width: 100%
    }
</style>
<div class="container py-4">
    <h2 class="text-center mb-4">Visi & Misi</h2>

    <div class="card mb-3 shadow-sm">
        <div class="card-body">
            <h4 class="card-title text-danger">Visi</h4>
            <p class="card-text">
                Menjadi restoran ayam goreng terbaik yang dikenal luas karena cita rasa khas, pelayanan ramah, dan kualitas terbaik di setiap sajian.
            </p>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="card-title text-danger">Misi</h4>
            <ul class="card-text">
                <li>Menyajikan ayam goreng dengan resep khas dan bahan berkualitas.</li>
                <li>Memberikan pengalaman makan yang nyaman, cepat, dan bersih.</li>
                <li>Menjaga kepuasan pelanggan dengan pelayanan terbaik.</li>
                <li>Terus berinovasi dalam menu dan pelayanan untuk memenuhi kebutuhan pelanggan.</li>
            </ul>
        </div>
    </div>
</div>
@endsection
