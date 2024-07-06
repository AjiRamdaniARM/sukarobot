<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentahan extends Model
{
    use HasFactory;

    protected $fillable = [
        'mentahan',
        'id_pelatihan',
    ];

    public function pelatihan()
    {
        return $this->belongsTo(Pelatihan::class, 'id_pelatihan');
    }
}

