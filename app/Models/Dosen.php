<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\dosen as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Dosen extends Model
{
    use HasFactoryn, Notifiable;

    protected $fillable = [
        'nip',
        'nama',
        'password',
        'prodi',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
