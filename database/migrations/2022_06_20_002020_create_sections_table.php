<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('alias');
            $table->longText('title')->nullable();
            $table->longText('sub_title')->nullable();
            $table->longText('intro_text')->nullable();
            $table->string('component_type')->default('html');
            $table->integer('component_id')->nullable();
            $table->longText('body')->nullable();
            $table->string('background')->nullable();
            $table->longText('params')->nullable();
            $table->boolean('published')->default(1);
            $table->integer('ordering')->default(0);
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
        Schema::dropIfExists('sections');
    }
}
