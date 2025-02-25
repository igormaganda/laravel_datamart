<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class B2b extends Model
{
    use HasFactory;

    // Nom de la table (s'il n'est pas le pluriel du nom du modèle)
    protected $table = 'b2b'; 

    // Définir les colonnes qui peuvent être assignées en masse
    protected $fillable = [
        'name', 
        'category',
        'address',
        'email',
        // Ajoute ici toutes les autres colonnes de ta table
    ];

    // Si tu utilises des timestamps (created_at, updated_at)
    public $timestamps = true;
}
