<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToEventsSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events_settings', function (Blueprint $table) {
            $table->string('event1_image',1024)->after('event1_text')->nullable();
            $table->string('event2_image',1024)->after('event2_text')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events_settings', function (Blueprint $table) {
            //
        });
    }
}
