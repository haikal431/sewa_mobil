@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Mobil Baru</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('cars.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="brand">Merek</label>
            <input type="text" name="brand" id="brand" class="form-control" value="{{ old('brand') }}">
        </div>
        <div class="form-group">
            <label for="license_plate">Plat Nomor</label>
            <input type="text" name="license_plate" id="license_plate" class="form-control" value="{{ old('license_plate') }}">
        </div>
        <div class="form-group">
            <label for="year">Tahun</label>
            <input type="number" name="year" id="year" class="form-control" value="{{ old('year') }}">
        </div>
        <div class="form-group">
            <label for="price_per_day">Harga per Hari</label>
            <input type="number" name="price_per_day" id="price_per_day" class="form-control" value="{{ old('price_per_day') }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
