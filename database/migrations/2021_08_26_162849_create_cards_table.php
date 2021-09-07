<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cards', function (Blueprint $table) {
			$table->id();
			$table->text('subject')->nullable();
			$table->date('date_issue')->nullable();
			$table->date('duration_issue')->nullable();
			$table->integer('page')->nullable();
			$table->text('abstract')->nullable();
			$table->text('comment')->nullable();
			$table->text('issue')->nullable();
			$table->unsignedBigInteger('journal_id')->nullable();
			$table->unsignedBigInteger('organization_id')->nullable();

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
		Schema::dropIfExists('cards');
	}
}
