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

    public function chapas()
    {
      return $this->hasMany(Chapa::class, 'cod_votacao', 'id');
    }
}
