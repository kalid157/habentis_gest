<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Apprenant extends Model
{
    use HasFactory;
    protected $table = 'apprenants';
    protected $fillable = [
        'name',
        'surname',
        'email',
        'address',
        'phone',
        'formation',
        'session',
        'montant'
    ];
   /* use HasFactory;

    protected $fillable = [
        'name', 'prenom', 'email', 'address', 'phone', 'formation_id', 'session', 'montant'
    ];

    protected $casts = [
        'montant' => 'integer', // Assuming montant is an integer representing the amount
        'session' => 'string',  //Or date, depending on how you store it
    ];


    public function formation(): BelongsTo
    {
        return $this->belongsTo(Formation::class);
    }*/
}
