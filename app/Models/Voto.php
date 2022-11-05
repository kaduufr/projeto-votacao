<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    use HasFactory;

  protected $table = 'voto';

  protected $fillable = [
    'bloco',
    'apartamento',
    'cod_chapa',
  ];

  protected $visible = [
    'id',
    'bloco',
    'apartamento',
    'cod_chapa',
  ];
}
