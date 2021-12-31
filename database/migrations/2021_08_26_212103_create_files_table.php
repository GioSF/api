<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('files', function (Blueprint $table) {
			$table->id();
			$table->text('slug');
			$table->text('title');
			$table->text('description');
			$table->text('filepath')->nullable();
			$table->unsignedBigInteger('organization_id');
			$table->foreign('organization_id')->references('id')->on('organizations');
			$table->text('hash_name');
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
		Schema::dropIfExists('files');
	}
}
