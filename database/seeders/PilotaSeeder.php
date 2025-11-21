<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PILota;
use Illuminate\Support\Carbon;

class PilotaSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('data/pilota.txt');

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

            // Az első sor a fejléc → kihagyjuk
            if ($isFirst) {
                $isFirst = false;
                continue;
            }

            $parts = explode("\t", $line);

            // Várjuk: az, nev, nem, szuldat, nemzet
            $az      = $parts[0] ?? null;
            $nev     = $parts[1] ?? null;
            $nem     = $parts[2] ?? null; // most nem használjuk
            $szuldat = $parts[3] ?? null;
            $nemzet  = $parts[4] ?? null;

            if (!$nev) {
                continue;
            }

            $date = null;
            if ($szuldat) {
                // 1911.6.24 → 1911-06-24
                $dParts = explode('.', $szuldat);
                if (count($dParts) === 3) {
                    $year  = (int)$dParts[0];
                    $month = (int)$dParts[1];
                    $day   = (int)$dParts[2];

                    $date = sprintf('%04d-%02d-%02d', $year, $month, $day);
                }
            }

            Pilota::create([
                'nev'     => $nev,
                'nemzet'  => $nemzet ?? '',
                'szulido' => $date,
            ]);
        }

        fclose($handle);
    }
}
