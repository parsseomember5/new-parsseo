<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('general_settings', function (Blueprint $table) {
            $table->string('footer_logo',1024)->nullable();
            $table->string('footer_under_logo_text',255)->nullable();
            $table->string('footer_list1_title',255)->nullable();
            $table->string('footer_list2_title',255)->nullable();
            $table->string('footer_list3_title',255)->nullable();
            $table->string('footer_phone',255)->nullable();
            $table->string('footer_email',255)->nullable();
            $table->string('footer_address',255)->nullable();
            $table->mediumText('footer_copyright')->nullable();
            $table->string('footer_box_small_text',255)->nullable();
            $table->string('footer_box_large_text',255)->nullable();
            $table->string('footer_box_btn_text',255)->nullable();
            $table->string('footer_box_btn_icon',255)->nullable();
            $table->string('footer_box_btn_link',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('general_settings', function (Blueprint $table) {
            //
        });
    }
}
