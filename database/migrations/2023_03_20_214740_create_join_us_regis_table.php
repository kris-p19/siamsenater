<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinUsRegisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('join_us_regis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->text('phone');
            $table->text('email');
            $table->integer('age');
            $table->date('birth_date');
            $table->text('id_card');
            $table->integer('job_id');
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
        Schema::dropIfExists('join_us_regis');
    }
}
