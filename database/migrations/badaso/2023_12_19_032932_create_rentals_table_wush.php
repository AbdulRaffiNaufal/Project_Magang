<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalsTableWush extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::create('rentals', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->autoIncrement();
			$table->bigInteger('car_id')->unsigned();
			$table->bigInteger('user_id')->unsigned();
			$table->bigInteger('employee_id')->unsigned();
			$table->string('rental_code', 100);
			$table->date('start_date');
			$table->date('end_date');
			$table->integer('duration');
			$table->float('total_cost', 100,2);
			$table->enum('rental_status', ['Disewa','Selesai']);
			$table->timestamps();
        });

        Schema::table('rentals', function (Blueprint $table) {
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('restrict')->onUpdate('no action');
			$table->foreign('user_id')->references('id')->on('badaso_users')->onDelete('restrict')->onUpdate('no action');
			$table->foreign('employee_id')->references('id')->on('employees')->onDelete('restrict')->onUpdate('no action');
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
        Schema::dropIfExists('rentals');
    }
}
