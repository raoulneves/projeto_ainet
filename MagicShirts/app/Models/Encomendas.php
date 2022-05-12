<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encomendas extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'estado',
        'cliente_id',
        'data',
        'preco_total',
        'notas',
        'nif',
        'endereco',
        'tipo_pagamento',
        'ref_pagamento',
        'recibo_url',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'  
    ];










}