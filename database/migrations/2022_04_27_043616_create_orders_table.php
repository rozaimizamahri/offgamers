<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable()->default(null);
            $table->string('refno', 100)->nullable()->default(null);
            $table->string('name', 100)->nullable()->default(null);
            $table->string('amount', 100)->nullable()->default(null);
            $table->string('status', 100)->nullable()->default(null);
            $table->string('submit_by', 100)->nullable()->default(null);
            $table->datetime('submit_dt')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
