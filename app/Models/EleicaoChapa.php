<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EleicaoChapa extends Model
{
    use HasFactory;

    protected $table = 'eleicao_chapa';

    protected $fillable = [
      'cod_eleicao',
      'cod_chapa'
    ];

    protected $visible = [
      'cod_eleicao',
      'cod_chapa'
    ];

    public function eleicao()
    {
      return $this->belongsTo(Eleicao::class, 'cod_eleicao', 'id');
    }

    public function chapa()
    {
      return $this->belongsTo(Chapa::class, 'cod_chapa', 'id');
    }
}
