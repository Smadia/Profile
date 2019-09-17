<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortofoliosServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portofolios_services', function (Blueprint $table) {
            $table->bigInteger('portofolio_id')
                ->unsigned()
                ->index();
            $table->foreign('portofolio_id')
                ->references('id')
                ->on('portofolios')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->bigInteger('service_id')
                ->unsigned()
                ->index();
            $table->foreign('service_id')
                ->references('id')
                ->on('services')
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
        Schema::dropIfExists('portofolios_services');
    }
}
