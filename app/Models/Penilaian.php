<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    public function negara()
{
    return $this->belongsTo(Negara::class);
}

public function kriteria()
{
    return $this->belongsTo(Kriteria::class);
}

}
