<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Filme extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'code';
    protected $keyType = 'string';

    public $timestamps = false;
    protected $fillable = [
        'code',
        'nome'
    ];

    public function filmes()
    {
        return $this->belongsTo(Filme::class, 'genero_code', 'code');
    }
}
