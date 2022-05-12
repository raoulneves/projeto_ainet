<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorias extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'nome'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'deleted_at' => 'datetime'
    ];
}
