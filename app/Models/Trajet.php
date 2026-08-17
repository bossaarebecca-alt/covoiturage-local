<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ville_depart',
        'description_depart',
        'ville_arrivee',
        'description_arrivee',
        'date_trajet',
        'places_disponibles',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}