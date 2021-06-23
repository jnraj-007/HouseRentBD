<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('description');
            $table->double('rentAmount','11','2');
            $table->string('region');
            $table->string('sectorNo');
            $table->string('roadNo');
            $table->string('houseNo');
            $table->integer('bedroom')->nullable();
            $table->integer('bathroom')->nullable();
            $table->integer('area')->nullable();
            $table->string('unit')->nullable();
            $table->text('image');
            $table->text('multiImage')->nullable();
            $table->text('video')->nullable();
            $table->foreignId('categoryId')->constrained('categories')->restrictOnDelete();
            $table->foreignId('authorId');
            $table->string('authorRole');
            $table->string('authorName');
            $table->foreignId('packageId')->nullable();
            $table->string('status')->default('Active');
            $table->double('latitude','10','5')->nullable();
            $table->double('longitude','10','5')->nullable();
            $table->timestamps();
            $table->date('expire_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
