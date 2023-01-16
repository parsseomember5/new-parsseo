<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToAboutSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('about_settings', function (Blueprint $table) {
            $table->string('about2_image',512)->nullable();
            $table->string('about2_uptitle',255)->nullable();
            $table->string('about2_title',255)->nullable();
            $table->string('about2_text',512)->nullable();
            $table->string('about2_btn_text',255)->nullable();
            $table->string('about2_btn_icon',255)->nullable();
            $table->string('about2_btn_link',255)->nullable();
            $table->string('about2_item1_title',255)->nullable();
            $table->string('about2_item1_text',255)->nullable();
            $table->string('about2_item2_title',255)->nullable();
            $table->string('about2_item2_text',255)->nullable();
            $table->string('about2_item3_title',255)->nullable();
            $table->string('about2_item3_text',255)->nullable();
            $table->string('about3_image',512)->nullable();
            $table->string('about3_uptitle',255)->nullable();
            $table->string('about3_title',255)->nullable();
            $table->string('about3_text',512)->nullable();
            $table->string('about3_btn_text',255)->nullable();
            $table->string('about3_btn_icon',255)->nullable();
            $table->string('about3_btn_link',255)->nullable();
            $table->string('about3_item1_title',255)->nullable();
            $table->string('about3_item1_text',255)->nullable();
            $table->string('about3_item2_title',255)->nullable();
            $table->string('about3_item2_text',255)->nullable();
            $table->string('about3_item3_title',255)->nullable();
            $table->string('about3_item3_text',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('about_settings', function (Blueprint $table) {
            //
        });
    }
}
