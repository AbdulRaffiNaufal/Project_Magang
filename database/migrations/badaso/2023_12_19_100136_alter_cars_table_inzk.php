<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCarsTableInzk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::table('cars', function (Blueprint $table) {
            $table->integer('is_available')->charset('')->collation('')->change();
			$table->integer('is_used')->charset('')->collation('')->change();
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

        Schema::table('cars', function (Blueprint $table) {
            $table->integer('is_available')->nullable(true)->charset('')->collation('')->change();
			$table->integer('is_used')->nullable(true)->charset('')->collation('')->change();
        });
    }
}
