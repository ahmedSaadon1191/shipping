<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServantsTable extends Migration {

	public function up()
	{
		Schema::create('servants', function(Blueprint $table) {
			$table->increments('id');
			$table->date('created_at');
			$table->date('updated_at');
			$table->string('name', 255);
			$table->string('adress', 255);
			$table->string('phone', 100);
			$table->integer('age')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('servants');
	}
}
