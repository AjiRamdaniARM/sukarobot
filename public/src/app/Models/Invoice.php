<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'image',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function itemRace()
    {
        return $this->belongsToMany(Race::class, 'invoice_race');
    }

    public function participants() {
        return $this->hasMany(Participant::class, 'invoice_id');
    }
}
