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
        Schema::create('apprentis', function (Blueprint $table) {
            $table->id('NumApprenti');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->date('date_naissance');
            $table->string('addresse');
            $table->string('ville');
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apprentis');
    }
};
