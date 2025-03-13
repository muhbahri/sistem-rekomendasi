<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Pertanyaan extends Model
{
    protected $fillable = ['kriteria_id', 'teks_pertanyaan', 'nilai_max'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}

