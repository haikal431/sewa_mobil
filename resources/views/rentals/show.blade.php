@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Penyewaan</h1>
    <div class="card">
        <div class="card-header">
            {{ $rental->car->name }}
        </div>
        <div class="card-body">
            <p>Penyewa: {{ $rental->user->name }}</p>
            <p>Tanggal Mulai: {{ $rental->start_date }}</p>
            <p>Tanggal Selesai: {{ $rental->end_date }}</p>
            <p>Total Harga: {{ $rental->total_price }}</p>
        </div>
    </div>
</div>
@endsection
