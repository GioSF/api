<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemPagesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('system_pages', function (Blueprint $table) {
			$table->id();
			$table->char('slug');
			$table->char('title');
			$table->text('content')->nullable();
			$table->unsignedBigInteger('organization_id');
			$table->foreign('organization_id')->references('id')->on('organizations');
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
		Schema::dropIfExists('system_pages');
	}
}
