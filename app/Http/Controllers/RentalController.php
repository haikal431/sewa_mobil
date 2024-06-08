<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::with('car', 'user')->get();
        return view('rentals.index', compact('rentals'));
    }

    public function create()
    {
        $cars = Car::all();
        return view('rentals.create', compact('cars'));
    }

    public function store(Request $request)
    {
        $rental = new Rental();
        $rental->user_id = Auth::id();
        $rental->car_id = $request->car_id;
        $rental->start_date = $request->start_date;
        $rental->end_date = $request->end_date;
        
        $car = Car::find($request->car_id);
        $days = $rental->start_date->diffInDays($rental->end_date);
        $rental->total_price = $car->price_per_day * $days;
        
        $rental->save();

        return redirect()->route('rentals.index');
    }

    public function show($id)
    {
        $rental = Rental::with('car', 'user')->findOrFail($id);
        return view('rentals.show', compact('rental'));
    }

    public function edit($id)
    {
        $rental = Rental::findOrFail($id);
        $cars = Car::all();
        return view('rentals.edit', compact('rental', 'cars'));
    }

    public function update(Request $request, $id)
    {
        $rental = Rental::findOrFail($id);
        $rental->car_id = $request->car_id;
        $rental->start_date = $request->start_date;
        $rental->end_date = $request->end_date;

        $car = Car::find($request->car_id);
        $days = $rental->start_date->diffInDays($rental->end_date);
        $rental->total_price = $car->price_per_day * $days;

        $rental->save();

        return redirect()->route('rentals.index');
    }

    public function destroy($id)
    {
        $rental = Rental::findOrFail($id);
        $rental->delete();

        return redirect()->route('rentals.index');
    }
}
