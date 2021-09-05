<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('journals', function (Blueprint $table) {
			$table->id();
			$table->text('title');
			$table->text('initials')->nullable();
			$table->text('format_type')->nullable();
			$table->text('localization')->nullable();
			$table->text('printing')->nullable();
			$table->text('idiom')->nullable();
			$table->dateTime('creation_date')->nullable();
			$table->dateTime('end_date')->nullable();
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
		Schema::dropIfExists('journals');
	}
}
