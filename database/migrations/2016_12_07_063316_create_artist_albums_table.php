<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_albums', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';

            $table->increments('id');
            $table->integer('artist_id')->unsigned()->nullable();
            $table->foreign('artist_id')
                ->references('id')
                ->on('artists')
                ->onDelete('restrict');

            $table->string('title');
            $table->string('title_romanized')->nullable();
            $table->string('genre');
            $table->string('cover_url')->nullable();
            $table->boolean('visible')->default(0);

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
        Schema::drop('artist_albums');
    }
}