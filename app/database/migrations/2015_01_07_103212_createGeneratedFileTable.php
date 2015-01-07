<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneratedFileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('GeneratedFiles', function($table)
		{
			$table->bigIncrements('id');
			$table->string('_fileName');
			$table->string('_extension');
			$table->string('_dateCreated');
			$table->string('_createdBy');
			$table->integer('_downloads')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('GeneratedFiles');
	}

}
