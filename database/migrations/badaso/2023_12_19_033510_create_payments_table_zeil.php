<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTableZeil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::create('payments', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->autoIncrement();
			$table->bigInteger('rental_id')->unsigned();
			$table->string('payment_method', 100);
			$table->integer('payment_amount');
			$table->date('payment_date');
			$table->string('payment_status', 100);
			$table->timestamps();
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->foreign('rental_id')->references('id')->on('rentals')->onDelete('restrict')->onUpdate('no action');
        });

        } catch (PDOException $ex) {
            $this->down();
            throw $ex;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
