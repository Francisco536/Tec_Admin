<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('formacions', function (Blueprint $table) {
            $table->id();
            $table->string('name_curso');
            $table->string('categoria');
            $table->string('tema');
            $table->string('fech_inicio');
            $table->string('fech_fin');
            $table->string('horario');
            $table->string('name_instructor');
            $table->string('institucion_instructor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formacions');
    }
};
