<?php

namespace App\Models;

use App\Models\Kategori;
use App\Models\Instruktur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelatihan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'harga',
        'foto',
        'deskripsi',
        'id_kategori',
        'id_instruktur',
    ];

    public function kategoriId()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function certificate()
    {
        return $this->belongsTo(Sertifikat::class, 'id_pelatihan');
    }
    public function instrukturId()
    {
        return $this->belongsTo(Instruktur::class, 'id_instruktur');
    }
    public function mentahan()
    {
        return $this->hasOne(Mentahan::class, 'id_pelatihan', 'id');
    }
}
