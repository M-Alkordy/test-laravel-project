<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->integer('slider_id')->unsigned();
            $table->string('name');
            $table->text('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('img')->nullable();
            $table->string('link_type')->nullable();
            $table->string('link_value')->nullable();
            $table->text('link_text')->nullable();
            $table->integer('ordering')->default(0);
            $table->boolean('published')->default(1);
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
        Schema::dropIfExists('slides');
    }
}
