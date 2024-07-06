<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bukti extends Model
{
    use HasFactory;
    public function userId()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function pelatihanId()
    {
        return $this->belongsTo(Pelatihan::class, 'id_pelatihan');
    }
}
