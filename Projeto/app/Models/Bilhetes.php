<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bilhetes extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'sessao_id',
        'lugar_id'
    ];
}
