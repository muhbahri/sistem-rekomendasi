<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kriteria;
use App\Models\Negara;
use App\Models\Penilaian;
use App\Models\UserAnswer;

class RekomendasiController extends Controller
{
    public function hitungMoora()
{
    $negara = Negara::all();
    $kriteria = Kriteria::all();
    $penilaian = Penilaian::all();

    // Mengambil jawaban user sebagai bobot dinamis

    $matriks = [];
    foreach ($negara as $n) {
        foreach ($kriteria as $k) {
            $nilai = $penilaian->where('negara_id', $n->id)->where('kriteria_id', $k->id)->first()->nilai ?? 0;
            $matriks[$n->id][$k->id] = $nilai;
        }
    }

    // Normalisasi Matriks
    $normalisasi = [];
    foreach ($kriteria as $k) {
        $akarJumlahKuadrat = sqrt(array_sum(array_map(fn($nilai) => pow($nilai[$k->id], 2), $matriks)));
        foreach ($negara as $n) {
            $normalisasi[$n->id][$k->id] = $matriks[$n->id][$k->id] / $akarJumlahKuadrat;
        }
    }

    // Menghitung Nilai Optimasi dengan Bobot Dinamis
    $hasil = [];
    foreach ($negara as $n) {
        $benefit = 0;
        $cost = 0;
        foreach ($kriteria as $k) {
            // Mengambil bobot dari jawaban user atau default ke 1
            $bobotDinamis = $userAnswers[$k->id] ?? 1;
            $nilaiTerbobot = $normalisasi[$n->id][$k->id] * $k->bobot * $bobotDinamis;

            if ($k->jenis === 'benefit') {
                $benefit += $nilaiTerbobot;
            } else {
                $cost += $nilaiTerbobot;
            }
        }
        $hasil[$n->id] = $benefit - $cost;
    }

    // Mengurutkan Hasil
    arsort($hasil);

    $rekomendasi = array_keys($hasil);

    return view('dashboard', compact('rekomendasi', 'hasil', 'negara'));
}


}
