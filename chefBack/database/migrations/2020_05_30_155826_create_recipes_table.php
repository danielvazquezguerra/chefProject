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
            $table->integer('serves')->nullable();
            $table->integer('level')->nullable();
            $table->integer('duration')->nullable();
            $table->string('ingredients', 140)->nullable();
            $table->timestamps();

        });

        Schema::table('posts', function (Blueprint $table) {
            
            $table->foreignId('recipe_id')->nullable();
            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
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
