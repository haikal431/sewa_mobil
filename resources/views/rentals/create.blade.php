@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Penyewaan</h1>
    <form action="{{ route('rentals.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="car_id">Mobil</label>
            <select name="car_id" id="car_id" class="form-control">
                @foreach($cars as $car)
                <option value="{{ $car->id }}">{{ $car->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="start_date">Tanggal Mulai</label>
            <input type="date" name="start_date" id="start_date" class="form-control">
        </div>
        <div class="form-group">
            <label for="end_date">Tanggal Selesai</label>
            <input type="date" name="end_date" id="end_date" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
