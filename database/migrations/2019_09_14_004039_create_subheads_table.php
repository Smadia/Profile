<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubheadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subheads', function (Blueprint $table) {
            $table->bigInteger('parent_id')
                ->unsigned()
                ->index();
            $table->foreign('parent_id')
                ->references('id')
                ->on('heads')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->bigInteger('child_id')
                ->unsigned()
                ->index();
            $table->foreign('child_id')
                ->references('id')
                ->on('heads')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('subheads');
    }
}
