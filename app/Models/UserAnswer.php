<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    protected $fillable = ['user_id', 'kriteria_id', 'score'];
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function kriteria() {
        return $this->belongsTo(Kriteria::class);
    }
}
