@extends('layouts.app')

@section('content')
<div class="container">
    <h1>List Penyewaan</h1>
    <a href="{{ route('rentals.create') }}" class="btn btn-primary">Tambah Penyewaan</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Mobil</th>
                <th>Penyewa</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rentals as $rental)
            <tr>
                <td>{{ $rental->car->name }}</td>
                <td>{{ $rental->user->name }}</td>
                <td>{{ $rental->start_date }}</td>
                <td>{{ $rental->end_date }}</td>
                <td>{{ $rental->total_price }}</td>
                <td>
                    <a href="{{ route('rentals.show', $rental->id) }}" class="btn btn-info">Detail</a>
                    <a href="{{ route('rentals.edit', $rental->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST" style="display:inline;">
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
