<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements FilamentUser
{
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

     public function canAccessPanel(Panel $panel): bool
    {
        return true; // admins table = admin only
    }
}
