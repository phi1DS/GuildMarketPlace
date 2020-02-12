<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradeObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trade_objects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('wowhead_id');
            $table->unsignedInteger('quantity');

            $table->unsignedBigInteger('trade_request_id');
            $table->foreign('trade_request_id')
                ->references('id')
                ->on('trade_requests')
                ->onDelete('cascade');
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
        Schema::dropIfExists('trade_objects');
    }
}
