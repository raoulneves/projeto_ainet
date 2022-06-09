<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generos extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'code',
        'nome',
        'deleted_at'
    ];
}
