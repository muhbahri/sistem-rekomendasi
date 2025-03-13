<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Models\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FormController extends Controller
{
    
    public function index()
    {
        $kriteria = Kriteria::with('pertanyaan')->get();
        $hasil = []; // Pastikan hasil ada, bisa kosong jika belum ada rekomendasi
    
        return view('dashboard', compact('kriteria', 'hasil'));
    }
    


public function simpanJawaban(Request $request)
{
    $jawaban = $request->input('jawaban');
    $userId = Auth::id();
    

    foreach ($jawaban as $kriteriaId => $nilaiArray) {
        $score = array_sum($nilaiArray);

        UserAnswer::updateOrCreate(
            ['user_id' => $userId, 'kriteria_id' => $kriteriaId],
            ['score' => $score]
        );
    }

    return redirect('/rekomendasi')->with('success', 'Jawaban berhasil disimpan!');
}


}
