<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Space;

class SpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spaces = Space::paginate(10);
        return view('spaces.index', compact('spaces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('spaces.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'capacity' => 'required|integer|min:1',
            'price_per_hour' => 'required|numeric|min:0',
            'type' => 'required|in:desk,room,office',
            'status' => 'required|in:available,maintenance',
        ]);

        Space::create($validated);

        return redirect()->route('spaces.index')->with('success', 'Espacio creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Space $space)
    {
        return view('spaces.show', compact('space'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Space $space)
    {
        return view('spaces.edit', compact('space'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Space $space)
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'description' => 'nullable|string',
            'capacity' => 'integer|min:1',
            'price_per_hour' => 'numeric|min:0',
            'type' => 'in:desk,room,office',
            'status' => 'in:available,maintenance',
        ]);

        $space->update($validated);

        return redirect()->route('spaces.index')->with('success', 'Espacio actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Space $space)
    {
        $space->delete();

        return redirect()->route('spaces.index')->with('success', 'Espacio eliminado exitosamente.');
    }
}
