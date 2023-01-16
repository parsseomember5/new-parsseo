<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('header_logo',1024)->nullable();
            $table->string('header_address',255)->nullable();
            $table->string('header_email',255)->nullable();
            $table->string('header_btn_text',255)->nullable();
            $table->string('header_btn_icon',255)->nullable();
            $table->string('header_btn_link',255)->nullable();
            $table->string('twitter',255)->nullable();
            $table->string('youtube',255)->nullable();
            $table->string('instagram',255)->nullable();
            $table->string('linkedin',255)->nullable();
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
        Schema::dropIfExists('general_settings');
    }
}
