<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tshirts extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'encomenda_id',
        'estampa_id',
        'cor_codigo',
        'tamanho',
        'quantidade',
        'preco_un',
        'subtotal'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}