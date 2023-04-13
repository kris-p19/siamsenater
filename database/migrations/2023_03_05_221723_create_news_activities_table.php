<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_th');
            $table->string('title_en');
            $table->string('picture_header')->nullable();
            $table->text('content_th');
            $table->text('content_en');
            $table->string('group_type_th')->nullable();
            $table->string('group_type_en')->nullable();
            $table->text('picture_gallery')->nullable();
            $table->integer('conter')->default(0)->nullable();
            $table->text('keyword_th')->nullable();
            $table->text('keyword_en')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->datetime('public_datetime');
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
        Schema::dropIfExists('news_activities');
    }
}
