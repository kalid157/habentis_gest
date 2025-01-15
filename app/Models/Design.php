<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Design extends Model
{
    use HasFactory;
    protected $table='designs';
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
}
