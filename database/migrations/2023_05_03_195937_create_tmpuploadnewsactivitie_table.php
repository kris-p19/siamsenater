<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTmpuploadnewsactivitieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tmpuploadnewsactivitie', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('token');
            $table->string('name');
            $table->enum('type',['insert','update'])->default('insert');
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
        Schema::dropIfExists('tmpuploadnewsactivitie');
    }
}
