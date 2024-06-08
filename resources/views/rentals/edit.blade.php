@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Penyewaan</h1>
    <form action="{{ route('rentals.update', $rental->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="car_id">Mobil</label>
            <select name="car_id" id="car_id" class="form-control">
                @foreach($cars as $car)
                <option value="{{ $car->id }}" {{ $rental->car_id == $car->id ? 'selected' : '' }}>{{ $car->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="start_date">Tanggal Mulai</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $rental->start_date }}">
        </div>
        <div class="form-group">
            <label for="end_date">Tanggal Selesai</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $rental->end_date }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
