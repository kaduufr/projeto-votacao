<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('chapa', function (Blueprint $table) {
      $table->id();
      $table->string('nome_chapa')->nullable(false);
      $table->string('cod_chapa')->nullable(false);
      $table->string('nome_sindico')->nullable(false);
      $table->string('cpf_sindico')->nullable(false);
      $table->string('nome_subsindico')->nullable(false);
      $table->string('cpf_subsindico')->nullable(false);
      $table->foreignId('cod_eleicao')->references('id')->on('eleicao')->nullable(false);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('chapa');
  }
};
