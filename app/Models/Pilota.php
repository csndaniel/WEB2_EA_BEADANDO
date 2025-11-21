<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pilota extends Model
{
    use HasFactory;

    protected $table = 'pilotas';

    protected $fillable = [
        'nev',
        'nemzet',
        'szulido',
    ];

    public function eredmenyek()
    {
        return $this->hasMany(Eredmeny::class, 'pilota_id');
    }
}
