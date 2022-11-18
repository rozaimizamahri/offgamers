<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_id')->nullable()->default(null);
            $table->integer('user_id')->nullable()->default(null);
            $table->string('payment_amount', 100)->nullable()->default(null);
            $table->string('payment_discount', 100)->nullable()->default(null);
            $table->string('payment_paid', 100)->nullable()->default(null);
            $table->string('payment_status', 100)->nullable()->default(null); 
            $table->string('payment_by', 100)->nullable()->default(null);
            $table->datetime('payment_dt')->nullable()->default(null); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
