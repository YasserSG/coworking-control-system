<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
             $reservations = Auth::user()->reservations()->with('space')->paginate(10);
        } else {
             $reservations = Reservation::with(['user', 'space'])->paginate(10);
        }
        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $spaces = \App\Models\Space::where('status', 'available')->get();
        return view('reservations.create', compact('spaces'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'space_id' => 'required|exists:spaces,id',
            'start_time' => 'required|date|after:now',
            'end_time' => 'required|date|after:start_time',
        ]);

        // Calculate total price (simplified logic)
        $space = \App\Models\Space::find($validated['space_id']);
        $hours = (strtotime($validated['end_time']) - strtotime($validated['start_time'])) / 3600;
        $total_price = $hours * $space->price_per_hour;

        Reservation::create([
            'user_id' => Auth::id() ?? 1, // Fallback to user 1 for testing if no auth
            'space_id' => $validated['space_id'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'total_price' => $total_price,
            'status' => 'confirmed', // Auto-confirm for now
        ]);

        return redirect()->route('reservations.index')->with('success', 'Reserva creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        // Usually users can't edit reservations easily, maybe just cancel.
        // But for admin/crud purposes:
        $spaces = \App\Models\Space::all();
        return view('reservations.edit', compact('reservation', 'spaces'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'status' => 'in:pending,confirmed,cancelled,completed',
        ]);

        $reservation->update($validated);

        return redirect()->route('reservations.index')->with('success', 'Reserva actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Reserva eliminada exitosamente.');
    }
}
