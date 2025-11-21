<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uzenet;

class UzenetController extends Controller
{
    // Kapcsolat űrlap megjelenítése
    public function create()
    {
        return view('kapcsolat.form');
    }

    // Üzenet mentése
    public function store(Request $request)
    {
        $request->validate([
            'nev' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'uzenet' => 'required|string|min:5',
        ]);

        Uzenet::create($request->all());

        return redirect()->back()->with('success', 'Üzenetedet sikeresen elküldtük!');
    }

    // Csak admin láthatja az üzenetek listáját
    public function index()
    {
        $uzenetek = Uzenet::latest()->get();
        return view('kapcsolat.lista', compact('uzenetek'));
    }

    // Üzenet törlése (admin)
    public function destroy($id)
    {
        Uzenet::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Üzenet törölve!');
    }
}
