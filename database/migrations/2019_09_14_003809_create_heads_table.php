<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('image')
                ->nullable();
            $table->string('name')
                ->index();
            $table->text('desc')
                ->nullable();
            $table->text('metas')
                ->nullable();
            $table->boolean('subheading');
            $table->boolean('posting');
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
        Schema::dropIfExists('heads');
    }
}
