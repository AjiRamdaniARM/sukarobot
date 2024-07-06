<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'point',
        'duration',
        'session',
        'date_race',
        'price',
        'deadline_reg',
        'team',
        'max_people',
        'document',
        'image',
    ];

    protected $dates = [
        'duration',
        'date_race',
        'deadline_reg',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function price()
    {
        return "Rp. " .  number_format($this->price,0,',','.');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function participants()
    {
        return $this->hasMany(Participant::class, 'race_id');
    }
}
