<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hot_issues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('picture');
            $table->string('url')->default('empty');
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
        });

        DB::table('hot_issues')->insert([
            [
                'picture' => '300x300.jpg',
                'url' => 'empty',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'picture' => '300x300.jpg',
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
        Schema::dropIfExists('hot_issues');
    }
}
