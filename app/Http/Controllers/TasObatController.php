<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class TasObatController extends Controller
{
    /** Kapan saja obat diminum, berdasarkan jumlah kali sehari. */
    private const JADWAL = [
        1 => ['pagi'],
        2 => ['pagi', 'malam'],
        3 => ['pagi', 'siang', 'malam'],
        4 => ['pagi', 'siang', 'sore', 'malam'],
    ];

    private const WAKTU = [
        'pagi'  => ['label' => 'Pagi',  'ikon' => '🌅'],
        'siang' => ['label' => 'Siang', 'ikon' => '☀️'],
        'sore'  => ['label' => 'Sore',  'ikon' => '🌇'],
        'malam' => ['label' => 'Malam', 'ikon' => '🌙'],
    ];

    public function show(string $slug): View
    {
        $tas = $this->cariTas($slug);

        $totalDosis = 0;

        $tas['obat'] = collect($tas['obat'])->map(function (array $obat) use (&$totalDosis) {
            $frekuensi = max(1, min(4, (int) $obat['frekuensi']));

            $obat['frekuensi'] = $frekuensi;
            $obat['waktu'] = collect(self::JADWAL[$frekuensi])
                ->map(fn (string $kunci) => ['kunci' => $kunci] + self::WAKTU[$kunci])
                ->all();

            $totalDosis += $frekuensi;

            return $obat;
        })->all();

        return view('tas', [
            'slug' => $slug,
            'tas' => $tas,
            'totalDosis' => $totalDosis,
        ]);
    }

    public function qr(string $slug): View
    {
        return view('qr', [
            'slug' => $slug,
            'tas' => $this->cariTas($slug),
        ]);
    }

    private function cariTas(string $slug): array
    {
        $semua = config('tas', []);

        abort_unless(isset($semua[$slug]), 404);

        return $semua[$slug];
    }
}
