<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocaleFieldToSettingTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('about_settings', function (Blueprint $table) {
            $table->string('locale',2)->after('id')->default('fa');
        });
        Schema::table('article_settings', function (Blueprint $table) {
            $table->string('locale',2)->after('id')->default('fa');
        });
        Schema::table('counter_box_settings', function (Blueprint $table) {
            $table->string('locale',2)->after('id')->default('fa');
        });
        Schema::table('events_settings', function (Blueprint $table) {
            $table->string('locale',2)->after('id')->default('fa');
        });
        Schema::table('features_settings', function (Blueprint $table) {
            $table->string('locale',2)->after('id')->default('fa');
        });
        Schema::table('feedbacks_settings', function (Blueprint $table) {
            $table->string('locale',2)->after('id')->default('fa');
        });
        Schema::table('general_settings', function (Blueprint $table) {
            $table->string('locale',2)->after('id')->default('fa');
        });
        Schema::table('hero_settings', function (Blueprint $table) {
            $table->string('locale',2)->after('id')->default('fa');
        });
        Schema::table('portfolios_settings', function (Blueprint $table) {
            $table->string('locale',2)->after('id')->default('fa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('setting_tables', function (Blueprint $table) {
            //
        });
    }
}
