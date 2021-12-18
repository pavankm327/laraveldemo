<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('accounts', function (Blueprint $table) {
            $table->id(); 
            $table->string('name',50);
            $table->string('email')->unique();
            $table->string('phone_no',15);
			$table->string('branch_name',100);
			$table->string('branch_code',20);
            $table->string('account_type',20)->nullable();
            $table->string('balance',100)->nullable();
            $table->text('address')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('accounts');
    }
}
