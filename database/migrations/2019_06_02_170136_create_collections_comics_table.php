<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionsComicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections_comics', function (Blueprint $table) {
            $table->unsignedBigInteger('id_collection');
            $table->unsignedBigInteger('id_comic');
            $table->timestamps();

            //entrambe sono chiavi primarie quindi
            $table->primary(['id_collection', 'id_comic']);

            //e sono foreign key
            $table->foreign('id_collection')->references('id')->on('collections')->onDelete('cascade');
            $table->foreign('id_comic')->references('id')->on('comics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collection_comic');
    }
}
