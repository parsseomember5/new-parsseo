<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeoFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('general_settings', function (Blueprint $table) {
            $table->string('home_canonical',512)->nullable();
            $table->string('main_nav_title',255)->nullable();
            $table->string('home_title',255)->nullable();
            $table->string('home_h1',255)->nullable();
            $table->string('home_meta_description',1024)->nullable();
            $table->boolean('show_popup')->default(true);
            $table->string('popup_title',255)->nullable();
            $table->string('popup_seconds',255)->nullable();
            $table->string('popup_image',1024)->nullable();
            $table->string('call_button_number',255)->nullable();
            $table->string('call_button_text',255)->nullable();
            $table->string('whatsapp_button_number',255)->nullable();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->string('canonical',512)->nullable();
        });
        Schema::table('post_categories', function (Blueprint $table) {
            $table->string('canonical',512)->nullable();
            $table->mediumText('description')->nullable();
            $table->string('meta_description',1024)->nullable();
        });
        Schema::table('portfolios', function (Blueprint $table) {
            $table->string('canonical',512)->nullable();
        });
        Schema::table('portfolio_categories', function (Blueprint $table) {
            $table->string('canonical',512)->nullable();
            $table->mediumText('description')->nullable();
            $table->string('meta_description',1024)->nullable();
        });
        Schema::table('pages', function (Blueprint $table) {
            $table->string('canonical',512)->nullable();
            $table->string('meta_description',1024)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
