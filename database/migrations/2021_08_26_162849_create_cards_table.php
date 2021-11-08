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
			$table->text('subject');
			$table->date('date_issue');
			$table->date('duration_issue');
			$table->text('abstract')->nullable();
			$table->text('comment')->nullable();
			$table->unsignedBigInteger('user_id')->nullable();
			$table->foreign('user_id')->references('id')->on('users')->nullable();
			$table->unsignedBigInteger('organization_id');
			$table->foreign('organization_id')->references('id')->on('organizations');
			$table->morphs('cardable');
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
