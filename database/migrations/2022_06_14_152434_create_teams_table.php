<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->text('name');
            $table->text('job_title')->nullable();
            $table->longText('intro_text')->nullable();
            $table->string('img')->nullable();
            $table->longText('full_text')->nullable();
            $table->integer('ordering')->default(0);
            $table->boolean('home_page')->default(0);
            $table->boolean('lead')->default(0);
            $table->integer('visit_count')->default(0);
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
        Schema::dropIfExists('teams');
    }
}
