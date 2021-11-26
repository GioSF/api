<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContributionsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contributions', function (Blueprint $table) {
			$table->id();
			$table->text('content');
			$table->text('feedback_admin');
			$table->boolean('feedback_admin_status');
			$table->unsignedBigInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users');
			$table->morphs('contribuable');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('contributions');
	}
}
