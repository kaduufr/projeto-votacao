<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $nome_chapa
 * @property string $cod_chapa
 * @property string $nome_sindico
 * @property string $cpf_sindico
 * @property string $nome_subsindico
 * @property string $cpf_subsindico
 * @property int $cod_eleicao
 *
 */

class Chapa extends Model
{
    use HasFactory;

  protected $table = 'chapa';

  protected $fillable = [
    'nome_chapa',
    'cod_chapa',
    'nome_sindico',
    'cpf_sindico',
    'nome_subsindico',
    'cpf_subsindico',
    'cod_eleicao'
  ];

  protected $visible = [
    'id',
    'nome_chapa',
    'cod_chapa',
    'nome_sindico',
    'cpf_sindico',
    'nome_subsindico',
    'cpf_subsindico',
    'cod_eleicao'
  ];

  public function votos()
  {
    return $this->hasMany(Voto::class, 'cod_chapa', 'id');
  }
}
