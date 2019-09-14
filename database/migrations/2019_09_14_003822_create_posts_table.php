<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id')
                ->index();
            $table->bigInteger('head_id')
                ->unsigned()
                ->index();
            $table->foreign('head_id')
                ->references('id')
                ->on('heads')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->bigInteger('user_id')
                ->unsigned()
                ->nullable()
                ->index();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->text('image')
                ->nullable();
            $table->string('title')
                ->index();
            $table->text('content')
                ->nullable();
            $table->text('tags')
                ->nullable();
            $table->text('metas')
                ->nullable();
            $table->boolean('commenting');
            $table->bigInteger('claps')
                ->default(0);
            $table->bigInteger('likes')
                ->default(0);
            $table->bigInteger('dislikes')
                ->default(0);
            $table->bigInteger('views')
                ->default(0);
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
