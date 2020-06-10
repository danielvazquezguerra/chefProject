<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {

            $table->id();
            $table->integer('user_id');
            $table->text('title');
            $table->string('images', 150)->nullable();
            $table->string('serves')->nullable();
            $table->string('level')->nullable();
            $table->string('duration')->nullable();
            $table->string('ingredients', 140)->nullable();
            $table->string('method', 140)->nullable();
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
        Schema::dropIfExists('recipes');
    }
}
