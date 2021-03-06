<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returns', function (Blueprint $table) {
            $table->increments('id');
			$table->date('created_at');
			$table->date('updated_at');
			$table->date('rescive_date');
			$table->string('resever_name', 100);
			$table->string('resver_phone', 100)->unique();
			$table->integer('supplier_id')->unsigned();
			$table->integer('city_id')->unsigned();
			$table->string('adress', 255);
			$table->integer('product_price')->unsigned();
			$table->integer('status_id')->unsigned()->default(0);
			$table->integer('order_id')->unsigned()->default(0);
			$table->string('package_number');
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('returns');
    }
}
