<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenresTable extends Migration
{
    public function up()
    {
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('genre');
        });

        Schema::table('books', function (Blueprint $table) {
            $table->foreignId('genre_id')->constrained();
        });
    }

    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign(['genre_id']);
            $table->dropColumn('genre_id');
        });

        Schema::table('books', function (Blueprint $table) {
            $table->string('genre')->nullable();
        });

        Schema::dropIfExists('genres');
    }
}