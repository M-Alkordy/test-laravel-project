<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('note')->nullable();
            $table->longText('pre_text')->nullable();
            $table->integer('ordering')->default(0);
            $table->string('position')->nullable();
            $table->boolean('published')->default(1);
            $table->string('module')->default('HTML');
            $table->boolean('show_title')->default(0);
            $table->longText('params')->nullable();
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
        Schema::dropIfExists('modules');
    }
}
