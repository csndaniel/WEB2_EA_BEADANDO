<?php

namespace App\Http\Controllers;

use App\Models\Eredmeny;
use App\Models\Pilota;
use App\Models\Gp;
use Illuminate\Http\Request;

class EredmenyController extends Controller
{
    public function index()
    {
        $eredmenyek = Eredmeny::with(['pilota', 'gp'])->get();
        return view('eredmenyek.index', compact('eredmenyek'));
    }

    public function create()
    {
        $pilotas = Pilota::all();
        $gps = Gp::all();

        return view('eredmenyek.create', compact('pilotas', 'gps'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pilota_id' => 'required|exists:pilotas,id',
            'gp_id' => 'required|exists:gps,id',
            'pozicio' => 'required|integer|min:1|max:50',
            'pont' => 'required|integer|min:0|max:50',
        ]);

        Eredmeny::create($request->all());

        return redirect()->route('eredmenyek.index')->with('success', 'Eredmény felvéve!');
    }

    public function edit($id)
    {
        $eredmeny = Eredmeny::findOrFail($id);
        $pilotas = Pilota::all();
        $gps = Gp::all();

        return view('eredmenyek.edit', compact('eredmeny', 'pilotas', 'gps'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pilota_id' => 'required|exists:pilotas,id',
            'gp_id' => 'required|exists:gps,id',
            'pozicio' => 'required|integer|min:1|max:50',
            'pont' => 'required|integer|min:0|max:50',
        ]);

        $eredmeny = Eredmeny::findOrFail($id);
        $eredmeny->update($request->all());

        return redirect()->route('eredmenyek.index')->with('success', 'Eredmény frissítve!');
    }

    public function destroy($id)
    {
        $eredmeny = Eredmeny::findOrFail($id);
        $eredmeny->delete();

        return redirect()->route('eredmenyek.index')->with('success', 'Eredmény törölve!');
    }
}
