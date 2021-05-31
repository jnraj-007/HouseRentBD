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
            $table->id();
            $table->string('packageId')->default('General user');
            $table->string('name');
            $table->string('role','10')->default('Tenant');
            $table->text('about')->unique()->nullable();
            $table->text('address')->nullable();
            $table->text('gender')->nullable();
            $table->integer('nIdNumber')->nullable();
            $table->text('verification')->default('not verified');
            $table->text('image')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
