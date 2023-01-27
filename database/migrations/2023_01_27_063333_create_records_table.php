<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();

            // id - number
            // file - string (путь к файлу)
            $table->string('file', 250);
            // title - string - max length 150 - valid
            $table->string('title', 150);
            // slug - string (автоматический транслит title)
            $table->string('slug', 50);
            // description - text - max length 3000
            $table->text('description');
            // tags - array сущности Tag
            $table->integer('tags');
            // view_all - boolean
            $table->boolean('view_all');

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
        Schema::dropIfExists('records');
    }
}
