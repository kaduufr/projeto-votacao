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
        Schema::create('poll', function (Blueprint $table) {
            $table->id();
            $table->string('name_mate')->nullable(false);
            $table->string('cod_mate')->nullable(false);
            $table->string('name_syndic')->nullable(false);
            $table->string('cpf_syndic')->nullable(false);
            $table->string('name_subsyndic')->nullable(false);
            $table->string('cpf_subsyndic')->nullable(false);
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('poll');
    }
};
