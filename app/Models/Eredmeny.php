<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eredmeny extends Model
{
    use HasFactory;

    protected $table = 'eredmenies';

    protected $fillable = [
        'pilota_id',
        'gp_id',
        'pozicio',
        'pont',
    ];

    public function pilota()
    {
        return $this->belongsTo(Pilota::class, 'pilota_id');
    }

    public function gp()
    {
        return $this->belongsTo(Gp::class, 'gp_id');
    }
}
