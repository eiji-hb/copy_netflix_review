<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('vtype');
            $table->text('img');
            $table->integer('nfid');
            $table->string('imdbid');
            $table->string('title');
            $table->dateTime('titledate');
            $table->string('jp_title');
            $table->text('synopsis');
            $table->integer('year');
            $table->integer('runtime');
            $table->text('synopsis_jp');
            $table->string('video_id');
            $table->string('channel_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
