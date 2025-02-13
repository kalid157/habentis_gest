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
        'tranche1',
        'tranche2',
        'tranche3',
        'tranche4',
        'montant',
        'montantrestant'
    ];


        protected $hidden = [
            'password',
            'remember_token',
        ];
        protected $casts = [
            'email_verified_at' => 'datetime',
        ];
       public function sectionGroups()
        {
            return $this->belongsToMany(SectionGroup::class, 'user_section_group');
        }
}
