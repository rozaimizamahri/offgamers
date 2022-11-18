<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchanges', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->decimal('primary_rate', 8, 2)->nullable()->default(null);
            $table->string('exchange_name', 100)->nullable()->default(null);   
            $table->string('exchange_desc', 100)->nullable()->default(null);   
            $table->decimal('exchange_rate', 8, 2)->nullable()->default(null);
            $table->string('exchange_status', 100)->nullable()->default(null);   
            $table->string('exchange_by', 100)->nullable()->default(null);
            $table->datetime('exchange_dt')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchanges');
    }
}
