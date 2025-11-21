<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gp extends Model
{
    use HasFactory;

    protected $table = 'gps';

    protected $fillable = [
        'datum',
        'nev',
        'helyszin',
    ];

    public function eredmenyek()
    {
        return $this->hasMany(Eredmeny::class, 'gp_id');
    }
}
