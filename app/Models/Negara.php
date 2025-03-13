<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Negara extends Model
{
    public function penilaians()
{
    return $this->hasMany(Penilaian::class);
}

}
