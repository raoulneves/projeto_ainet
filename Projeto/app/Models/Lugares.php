<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lugares extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'sala_id'
    ];
}
