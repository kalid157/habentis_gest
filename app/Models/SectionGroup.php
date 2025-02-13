<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SectionGroup extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'formation_id'];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_section_group');
    }
}
