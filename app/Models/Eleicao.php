<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $ativa
 *
 */

class Eleicao extends Model
{
    use HasFactory;

    protected $table = 'eleicao';

    protected $fillable = [
      'ativa',
    ];

    protected $visible = [
      'id',
      'ativa'
    ];


    public function votos()
    {
      return $this->hasMany(Voto::class, 'cod_eleicao', 'id');
    }

    public function chapas()
    {
      return $this->belongsToMany(Chapa::class, 'eleicao_chapa', 'cod_eleicao', 'cod_chapa');
    }
}
