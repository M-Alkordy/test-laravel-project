<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogoGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logo_groups', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->integer('row')->default(1);
            $table->integer('col')->default(6);
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
        Schema::dropIfExists('logo_groups');
    }
}
