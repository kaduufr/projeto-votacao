<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voto', function (Blueprint $table) {
            $table->id();
            $table->string('bloco')->nullable(false);
            $table->string('apartamento')->nullable(false);
            $table->foreignId('cod_chapa')->references('id')->on('chapa')->nullable(false);
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
        Schema::dropIfExists('voto');
    }
};
