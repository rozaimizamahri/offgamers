<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
           
            $table->bigIncrements('id'); 
            $table->string('name',100)->nullable();
            $table->string('email',100)->nullable();
            $table->string('password',100)->nullable();   

            $table->string('active',100)->nullable(); 
            $table->datetime('last_login')->nullable()->default(null); 
            $table->datetime('last_logout')->nullable()->default(null);  

            $table->string('created_by_name',100)->nullable(); 
            $table->string('created_by_email',100)->nullable(); 
            $table->datetime('created_by_date')->nullable()->default(null); 
            $table->string('created_remark',3000)->nullable(); 
            $table->string('updated_status',100)->nullable(); 
            $table->integer('updated_count')->nullable()->default(null);  
            $table->string('updated_by_name',100)->nullable(); 
            $table->string('updated_by_email',100)->nullable(); 
            $table->datetime('updated_by_date')->nullable()->default(null);  
            $table->string('updated_remark',3000)->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
