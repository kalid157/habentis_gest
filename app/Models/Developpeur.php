<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Developpeur extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'surname', 
        'email', 
        'address', 
        'phone', 
        'formation', 
        'session', 
        'montant'];
}
