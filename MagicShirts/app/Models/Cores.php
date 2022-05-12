<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cores extends Model{
    use HasFactory, SoftDeletes;
    public $timestamps = false;
    protected $table = 'cores';
    protected $primaryKey = 'codigo';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'codigo',
        'nome'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'deleted_at' => 'datetime'
    ];
}












