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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable(); // Voeg de username toe
            $table->date('birthdate')->nullable(); // Voeg de verjaardag toe
            $table->text('about_me')->nullable(); // Voeg de "about me" tekst toe
            $table->string('profile_photo')->nullable(); // Voeg de profielfoto toe
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'birthdate', 'about_me', 'profile_photo']); // Verwijder de velden
        });
    }
};
