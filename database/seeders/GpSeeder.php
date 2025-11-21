<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gp;

class GpSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('data/gp.txt');

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
            if ($line === '') {
                continue;
            }

            // Fejléc kihagyása
            if ($isFirst) {
                $isFirst = false;
                continue;
            }

            $parts = explode("\t", $line);

            // datum, nev, helyszin
            $rawDate = $parts[0] ?? null;
            $nev     = $parts[1] ?? null;
            $helyszin= $parts[2] ?? null;

            if (!$rawDate || !$nev) {
                continue;
            }

            // 1994.05.15 → 1994-05-15
            $date = null;
            $dParts = explode('.', $rawDate);
            if (count($dParts) == 3) {
                $year  = (int)$dParts[0];
                $month = (int)$dParts[1];
                $day   = (int)$dParts[2];

                $date = sprintf('%04d-%02d-%02d', $year, $month, $day);
            } else {
                // ha valami nagyon fura, kihagyjuk
                continue;
            }

            Gp::create([
                'datum'   => $date,
                'nev'     => $nev,
                'helyszin'=> $helyszin ?? '',
            ]);
        }

        fclose($handle);
    }
}
