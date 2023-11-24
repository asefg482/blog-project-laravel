<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::create(
            'blogs' , function(Blueprint $table)
        {
            $table->id();
            $table->string('title' , 90);
            $table->string('slug' , 100)->unique();
            $table->string('description' , 90);
            $table->string('short_description' , 350);
            $table->longText('content');
            $table->string('image');


            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('blogs');
    }
};
