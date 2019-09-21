<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->bigIncrements('id')
                ->index();
            $table->bigInteger('portofolio_id')
                ->unsigned()
                ->nullable()
                ->index();
            $table->foreign('portofolio_id')
                ->references('id')
                ->on('portofolios')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->bigInteger('client_id')
                ->unsigned()
                ->nullable()
                ->index();
            $table->foreign('client_id')
                ->references('id')
                ->on('clients')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->text('image')
                ->nullable();
            $table->string('name')
                ->index();
            $table->text('content');
            $table->text('helper')
                ->nullable();
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
        Schema::dropIfExists('testimonials');
    }
}
