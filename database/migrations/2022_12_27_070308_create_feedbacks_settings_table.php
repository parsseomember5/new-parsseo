<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbacksSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks_settings', function (Blueprint $table) {
            $table->id();
            $table->string('feedbacks_uptitle',255)->nullable();
            $table->string('feedbacks_title',255)->nullable();
            $table->string('feedbacks_count',255)->nullable();
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
        Schema::dropIfExists('feedbacks_settings');
    }
}
