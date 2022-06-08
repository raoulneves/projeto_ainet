<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exibicao extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'id',
        'filme_id',
        'sala_id',
        'data',
        'horário_inicio',
        'custom'
    ];
}
