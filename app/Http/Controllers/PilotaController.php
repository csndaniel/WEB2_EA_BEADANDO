<?php

namespace App\Http\Controllers;

use App\Models\Pilota;
use Illuminate\Http\Request;

class PilotaController extends Controller
{
    // Pilóták listája
    public function index()
    {
        $pilotas = Pilota::all();
        return view('pilotas.index', compact('pilotas'));
    }

    // Új pilóta űrlap
    public function create()
    {
        return view('pilotas.create');
    }

    // Új pilóta mentése
    public function store(Request $request)
    {
        $request->validate([
            'nev' => 'required|string|max:255',
            'nemzet' => 'required|string|max:255',
            'szulido' => 'nullable|date',
        ]);

        Pilota::create($request->all());

        return redirect()->route('pilotas.index')->with('success', 'Pilóta sikeresen létrehozva!');
    }

    // Szerkesztés oldal
    public function edit($id)
    {
        $pilota = Pilota::findOrFail($id);
        return view('pilotas.edit', compact('pilota'));
    }

    // Szerkesztés mentése
    public function update(Request $request, $id)
    {
        $request->validate([
            'nev' => 'required|string|max:255',
            'nemzet' => 'required|string|max:255',
            'szulido' => 'nullable|date',
        ]);

        $pilota = Pilota::findOrFail($id);
        $pilota->update($request->all());

        return redirect()->route('pilotas.index')->with('success', 'Pilóta sikeresen frissítve!');
    }

    // Törlés
    public function destroy($id)
    {
        $pilota = Pilota::findOrFail($id);
        $pilota->delete();

        return redirect()->route('pilotas.index')->with('success', 'Pilóta törölve!');
    }
}
