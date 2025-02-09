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
        Schema::table('books', function (Blueprint $table) {
            $table->unsignedTinyInteger('page');
            $table->unsignedTinyInteger('chapter');
            $table->tinyText('name');
            $table->tinyText('author');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumns('books', [
            'page',
            'chapter',
            'name',
            'author',
        ]);
    }
};