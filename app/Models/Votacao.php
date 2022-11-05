<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votacao extends Model
{
    use HasFactory;

    protected $table = 'votacao';

    protected $fillable = [
      'name_mate',
      'cod_mate',
      'name_syndic',
      'cpf_syndic',
      'name_subsyndic',
      'cpf_subsyndic',
      'is_active'
    ];
}
