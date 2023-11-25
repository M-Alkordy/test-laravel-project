<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->text('title');
            $table->longText('sub_title')->nullable();
            $table->longText('intro_text')->nullable();
            $table->longText('full_text')->nullable();
            $table->string('icon')->nullable();
            $table->string('img')->nullable();
            $table->integer('ordering')->default(0);
            $table->boolean('published')->default(1);
            $table->longText('params')->nullable();
            $table->boolean('home_page')->default(1);
            $table->integer('visit_count')->default(0);
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
        Schema::dropIfExists('services');
    }
}
