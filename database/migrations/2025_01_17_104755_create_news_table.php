<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id(); // Automatisch een primary key
            $table->string('title'); // Titel van het nieuws
            $table->string('image'); // Pad naar de afbeelding
            $table->text('content'); // Inhoud van het nieuwsbericht
            $table->timestamp('published_at')->nullable(); // Publicatiedatum
            $table->timestamps(); // Timestamps voor created_at en updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news'); // Verwijder de tabel als de migratie wordt teruggedraaid
    }
}
