<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uzenet extends Model
{
    use HasFactory;

    protected $table = 'uzenetek';

    protected $fillable = [
        'nev',
        'email',
        'uzenet',
    ];
}
