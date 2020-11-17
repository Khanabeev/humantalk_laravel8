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
            $table->string('title');
            $table->string('slug')->default('post');
            $table->unsignedTinyInteger('status')->nullable()->default(0)->comment('published==1, draft==2');
            $table->unsignedInteger('mark')->nullable()->comment('Level of importance of post');
            $table->string('lg_image')->nullable();
            $table->string('md_image')->nullable();
            $table->string('sm_image')->nullable();
            $table->string('gallery_image')->nullable();
            $table->string('header_image')->nullable();
            $table->integer('views')->nullable()->comment('Total number of views');
            $table->string('time_to_read')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
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
