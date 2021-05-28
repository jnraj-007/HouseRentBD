<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserpackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userpackages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userId');
            $table->foreignId('package_id');
            $table->integer('package_price');
            $table->text('packageName');
            $table->integer('numberOfPosts');
            $table->string('paymentMethod');
            $table->string('transactionId');
            $table->string('current_package_status')->default('Inactive');
            $table->integer('amountToPay');
            $table->string('status')->default('pending');
            $table->integer('usedPost')->default(0);
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
        Schema::dropIfExists('userpackages');
    }
}
