<?php

namespace App\Http\Controllers;

use App\Models\Eredmeny;
use App\Models\Pilota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiagramController extends Controller
{
    
    public function pontok(Request $request)
{
    // Év választás
    $ev = $request->query('ev');

    // Évlista
    $evLista = \App\Models\Gp::selectRaw('YEAR(datum) as ev')
        ->groupBy('ev')
        ->orderBy('ev', 'desc')
        ->get()
        ->pluck('ev');

    if (!$ev && count($evLista) > 0) {
        $ev = $evLista[0];
    }

    // Pontszámok év szerint (helyesen csatlakoztatva)
    $datas = \App\Models\Pilota::select(
            'pilotas.nev',
            DB::raw('SUM(eredmenies.pont) as osszpont')
        )
        ->leftJoin('eredmenies', 'pilotas.id', '=', 'eredmenies.pilota_id')
        ->leftJoin('gps', function($join) use ($ev) {
            $join->on('eredmenies.gp_id', '=', 'gps.id')
                 ->whereRaw('YEAR(gps.datum) = ?', [$ev]);
        })
        ->groupBy('pilotas.id', 'pilotas.nev')
        ->orderByDesc('osszpont')
        ->get();

    $labels = $datas->pluck('nev');
    $points = $datas->pluck('osszpont');

    return view('diagram.pontok', compact('labels', 'points', 'ev', 'evLista'));
}



}
