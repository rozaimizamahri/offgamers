<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rewards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('payment_id')->nullable()->default(null);
            $table->integer('order_id')->nullable()->default(null);
            $table->integer('user_id')->nullable()->default(null);
            $table->string('reward_refno', 100)->nullable()->default(null);
            $table->string('reward_amount', 100)->nullable()->default(null);
            $table->string('reward_status', 100)->nullable()->default(null); 
            $table->string('reward_active', 100)->nullable()->default(null); 
            $table->string('reward_used', 100)->nullable()->default(null); 
            $table->string('reward_by', 100)->nullable()->default(null);
            $table->datetime('reward_dt')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rewards');
    }
}
