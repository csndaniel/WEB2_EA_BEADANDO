<?php

namespace App\Http\Controllers;

use App\Models\Gp;
use Illuminate\Http\Request;

class GpController extends Controller
{
    public function index()
    {
        $gps = Gp::all();
        return view('gps.index', compact('gps'));
    }

    public function create()
    {
        return view('gps.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'datum' => 'required|date',
            'nev' => 'required|string|max:255',
            'helyszin' => 'required|string|max:255',
        ]);

        Gp::create($request->all());

        return redirect()->route('gps.index')->with('success', 'GP sikeresen létrehozva!');
    }

    public function edit($id)
    {
        $gp = Gp::findOrFail($id);
        return view('gps.edit', compact('gp'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'datum' => 'required|date',
            'nev' => 'required|string|max:255',
            'helyszin' => 'required|string|max:255',
        ]);

        $gp = Gp::findOrFail($id);
        $gp->update($request->all());

        return redirect()->route('gps.index')->with('success', 'GP sikeresen frissítve!');
    }

    public function destroy($id)
    {
        $gp = Gp::findOrFail($id);
        $gp->delete();

        return redirect()->route('gps.index')->with('success', 'GP törölve!');
    }
}
