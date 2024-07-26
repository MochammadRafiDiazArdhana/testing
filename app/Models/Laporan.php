<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table = 'laporan';
    protected $fillable = [
        'id_user',
        'tempat_penugasan',
        'tugas',
        'tanggal',
        'honor',
        'fee',
        'foto'
    ];
    public function users(){
        return $this->belongsTo(Users::class);
    }
}
