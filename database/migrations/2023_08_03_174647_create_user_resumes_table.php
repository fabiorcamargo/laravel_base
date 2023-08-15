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
        Schema::create('user_resumes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('nome');
            $table->longText('objetivo');
            $table->json('skills');
            $table->timestamp('nascimento');
            $table->string('telefone');
            $table->string('email');
            $table->string('uf');
            $table->string('cidade');
            $table->string('cursos_complementares')->nullable();
            $table->string('formacao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_resumes');
    }
};
