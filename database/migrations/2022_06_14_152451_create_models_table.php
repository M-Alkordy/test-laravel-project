<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('models', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->longText('title')->nullable();
            $table->longText('intro_text')->nullable();
            $table->text('note')->nullable();
            $table->longText('contect')->nullable();
            $table->integer('ordering')->default(0);
            $table->string('position')->nullable();
            $table->boolean('published')->default(1);
            $table->string('module')->nullable();
            $table->boolean('show_title')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('models');
    }
}
