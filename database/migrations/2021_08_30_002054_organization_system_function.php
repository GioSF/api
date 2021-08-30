<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrganizationSystemFunction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_system_functions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_system_function');
            $table->unsignedBigInteger('id_organization');
            $table->foreign('id_system_function')->references('id')->on('system_functions')->onDelete('cascade');
            $table->foreign('id_organization')->references('id')->on('organizations')->onDelete('cascade');

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
        Schema::dropIfExists('organization_system_functions');
    }
}
