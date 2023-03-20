<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlideShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slide_shows', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('picture');
            $table->string('url')->default('empty');
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
        });

        DB::table('slide_shows')->insert([
            [
                'picture' => 'slide1.jpg',
                'url' => 'empty',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'picture' => 'slide2.jpg',
                'url' => 'empty',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'picture' => 'slide3.jpg',
                'url' => 'empty',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slide_shows');
    }
}
