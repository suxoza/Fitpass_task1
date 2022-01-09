<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntryLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entry_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('facility_id')->unsigned()->default(0)->comment = 'id in facilities';
            $table->bigInteger('card_id')->unsigned()->default(0)->comment = 'id in user_cards';
            $table->timestamps();

            $table->foreign('facility_id')->references('id')->on('facilities');
            $table->foreign('card_id')->references('id')->on('user_cards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entry_logs');
    }
}
