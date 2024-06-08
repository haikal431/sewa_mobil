<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    // Method untuk menyimpan data mobil baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'license_plate' => 'required|string|max:255',
            'year' => 'required|integer|min:1886|max:' . date('Y'),
            'price_per_day' => 'required|numeric|min:0',
        ]);

        // Simpan data mobil ke database
        Car::create($request->all());

        // Redirect ke halaman daftar mobil dengan pesan sukses
        return redirect()->route('cars.index')->with('success', 'Mobil berhasil ditambahkan.');
    }

    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('cars.show', compact('car'));
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        $car->name = $request->name;
        $car->brand = $request->brand;
        $car->license_plate = $request->license_plate;
        $car->year = $request->year;
        $car->price_per_day = $request->price_per_day;
        $car->save();

        return redirect()->route('cars.index');
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->route('cars.index');
    }
}
