<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->boolean('auto_keywords')->default(1);
            $table->longText('keywords')->nullable();
            $table->string('logo')->nullable();
            $table->boolean('online')->default(1);
            $table->string('main_email');
            $table->longText('contact')->nullable();
            $table->longText('address')->nullable();
            $table->string('google_analytics_id')->nullable();
            $table->string('primary_color')->nullable();
            $table->string('secondary_color')->nullable();
            $table->integer('visit_count')->default(0);
            $table->longText('style')->nullable();
            $table->string('selected_style');
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
        Schema::dropIfExists('settings');
    }
}
