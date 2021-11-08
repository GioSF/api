<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationSystemFunctionTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organization_system_function', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('system_function_id');
			$table->unsignedBigInteger('organization_id');
			$table->foreign('system_function_id')->references('id')->on('system_functions');
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
		Schema::dropIfExists('organization_system_function');
	}
}
