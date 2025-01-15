<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recette extends Model
{
    use HasFactory;
    
    protected $fillable = ['date', 'description', 'montant','solde'];
    protected $casts = [
        'date' => 'datetime',
    ];
}
