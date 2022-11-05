<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleicao extends Model
{
    use HasFactory;

    protected $table = 'eleicao';

    protected $fillable = [
      'ativa'
    ];

    protected $visible = [
      'id',
      'is_active'
    ];
}
