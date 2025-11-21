<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Eredmeny;
use App\Models\Pilota;
use App\Models\Gp;

class EredmenySeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('data/eredmeny.txt');

        if (!file_exists($path)) {
            return;
        }

        $handle = fopen($path, 'r');
        if (!$handle) {
            return;
        }

        $isFirst = true;

        while (($line = fgets($handle)) !== false) {
            $line = trim($line);
            if ($line === '') continue;

            // Fejléc kihagyása
            if ($isFirst) {
                $isFirst = false;
                continue;
            }

            $parts = explode("\t", $line);

            // datum, pilotaaz, helyezes...
            $rawDate  = $parts[0] ?? null;
            $rawPozicio = $parts[2] ?? null;

            // Dátum konvertálás
            $dParts = explode('.', $rawDate);
            if (count($dParts) !== 3) continue;

            $date = sprintf('%04d-%02d-%02d', $dParts[0], $dParts[1], $dParts[2]);

            // Pilóta random (mert pilótaazonosító nem köthető össze a TXT-vel)
            $pilota = Pilota::inRandomOrder()->first();
            if (!$pilota) continue;

            // GP keresése dátum alapján
            $gp = Gp::where('datum', $date)->first();
            if (!$gp) continue;

            // Pozíció: ha nincs, random legyen
            if (is_numeric($rawPozicio) && (int)$rawPozicio > 0) {
                $pozicio = (int)$rawPozicio;
            } else {
                $pozicio = rand(1, 20);
            }

            // Pontszám
            $pontok = [
                1 => 25, 2 => 18, 3 => 15, 4 => 12,
                5 => 10, 6 => 8, 7 => 6, 8 => 4,
                9 => 2, 10 => 1
            ];

            $pont = $pontok[$pozicio] ?? 0;

            // Rekord mentése
            Eredmeny::create([
                'pilota_id' => $pilota->id,
                'gp_id'     => $gp->id,
                'pozicio'   => $pozicio,
                'pont'      => $pont,
            ]);
        }

        fclose($handle);
    }
}
