@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Mobil</h1>
    <div class="card">
        <div class="card-header">
            {{ $car->name }}
        </div>
        <div class="card-body">
            <p>Merek: {{ $car->brand }}</p>
            <p>Plat Nomor: {{ $car->license_plate }}</p>
            <p>Tahun: {{ $car->year }}</p>
            <p>Harga per Hari: {{ $car->price_per_day }}</p>
        </div>
    </div>
</div>
@endsection
