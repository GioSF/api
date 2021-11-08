<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('issues', function (Blueprint $table) {
			$table->id();
			$table->text('title');
			$table->integer('type');
			$table->integer('periodicity');
			$table->dateTime('original_date');
			$table->dateTime('start_date');
			$table->dateTime('end_date');
			$table->integer('number_pages');
			$table->unsignedBigInteger('journal_id');
			$table->foreign('journal_id')->references('id')->on('journals');
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
		Schema::dropIfExists('issues');
	}
}
