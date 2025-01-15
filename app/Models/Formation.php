<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formation extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function apprenants(): HasMany
    {
        return $this->hasMany(Apprenant::class);
    }
}
