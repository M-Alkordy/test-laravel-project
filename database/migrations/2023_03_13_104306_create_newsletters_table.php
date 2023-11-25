<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewslettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsletters', function (Blueprint $table) {
            $table->id();
            $table->string('subject')->nullable();
            $table->string('from_email')->nullable();
            $table->string('from_name')->nullable();
            $table->string('reply_email')->nullable();
            $table->string('reply_name')->nullable();
            $table->longText('message')->nullable();
            $table->boolean('published')->default(1);
            $table->dateTime('last_sent')->nullable();
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
        Schema::dropIfExists('newsletters');
    }
}
