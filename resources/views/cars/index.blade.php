@extends('layouts.app')

@section('content')
<div class="container">
    <h1>List Mobil</h1>
    <a href="{{ route('cars.create') }}" class="btn btn-primary">Tambah Mobil</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Merek</th>
                <th>Plat Nomor</th>
                <th>Tahun</th>
                <th>Harga per Hari</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
            <tr>
                <td>{{ $car->name }}</td>
                <td>{{ $car->brand }}</td>
                <td>{{ $car->license_plate }}</td>
                <td>{{ $car->year }}</td>
                <td>{{ $car->price_per_day }}</td>
                <td>
                    <a href="{{ route('cars.show', $car->id) }}" class="btn btn-info">Detail</a>
                    <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
