<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sessoes extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'filme_id',
        'sala_id',
        'data',
        'horario_inicio'
    ];
}
