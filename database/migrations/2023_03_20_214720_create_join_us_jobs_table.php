<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinUsJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('join_us_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('job_name_th');
            $table->text('job_description_th');
            $table->string('job_name_en');
            $table->text('job_description_en');
            $table->date('date_begin');
            $table->date('date_end');
            $table->integer('maximum_regis')->default(1);
            $table->enum('status',['active','inactive'])->default('active');
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
        Schema::dropIfExists('join_us_jobs');
    }
}
