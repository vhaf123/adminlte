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

            $table->unsignedBigInteger('blogger_id')->nullable()->unsigned();

            $table->foreign('blogger_id')
                    ->references('id')
                    ->on('bloggers')
                    ->onDelete('set null');

            $table->string('name');
            $table->string('picture')->nullable();
            $table->string('extracto');

            

            $table->text('body')->nullable();

            $table->enum('status', [
                \App\Post::BORRADOR, \App\Post::PUBLICADO
            ])->nullable()->default(\App\Post::BORRADOR);

            $table->string('slug');

            $table->integer('contador')->default(0)->nullable();

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
        Schema::dropIfExists('posts');
    }
}
