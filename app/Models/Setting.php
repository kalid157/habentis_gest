<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public function index()
    {
        // Fetch the user registrations count
        $userRegistrations = Setting::where('key', 'user_registrations')->value('value') ?? 0;


        return view('dashboard', [
           'userRegistrations' => $userRegistrations,
            // ... other data
        ]);
     }
}
