<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->json('name');
            $table->string('alias');
            $table->string('link')->nullable();
            $table->string('type');
            $table->integer('menu_type')->nullable();
            $table->boolean('is_home')->default(0);
            $table->boolean('published')->default(1);
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('component_id')->unsigned()->nullable();
            $table->integer('ordering')->unsigned();
            $table->text('params')->nullable();
            $table->integer('created_by')->unsigned()->nullable();
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
        Schema::dropIfExists('menus');
    }
}
