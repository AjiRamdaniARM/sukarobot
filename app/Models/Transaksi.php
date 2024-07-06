<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_transaksi',
        'foto',
        'status',
        'id_user',
        'id_pelatihan',
    ];

    public function userId()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function pelatihanId()
    {
        return $this->belongsTo(Pelatihan::class, 'id_pelatihan');
    }
}
