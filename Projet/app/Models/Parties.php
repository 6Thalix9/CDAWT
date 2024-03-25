<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parties extends Model
{
    use HasFactory;
    protected $table = 'parties';

    // Les attributs qui sont mass assignable
    protected $fillable = [
        'max_players',
        'is_public',
        'creator_id',
    ];

    // Les attributs qui doivent être cachés pour les tableaux
    protected $hidden = [
        // Si vous avez des attributs à cacher dans les réponses JSON, listez-les ici
    ];

    // Les attributs qui doivent être castés en types natifs
    protected $casts = [
        'is_public' => 'boolean',
    ];
}
