<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precos extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'preco_un_catalogo',
        'preco_un_proprio',
        'preco_un_catalogo_desconto',
        'preco_un_proprio_desconto',
        'quantidade_desconto'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
