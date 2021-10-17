<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContribuiblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contribuibles', function (Blueprint $table) {
            $table->id();
            $table->morphs('contribuible');
            $table->unsignedBigInteger('contribuition_id');
			$table->foreign('contribuition_id')->references('id')->on('contribuitions')->onDelete('cascade');
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
        Schema::dropIfExists('contribuibles');
    }
}
