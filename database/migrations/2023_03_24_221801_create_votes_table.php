<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_th');
            $table->string('name_en');
            $table->string('score',10);
            $table->timestamps();
        });

        DB::table('votes')->insert([
            [ 'score' => 5, 'name_th' => 'พึงพอใจมากที่สุด', 'name_en' => 'Most satisfied', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'score' => 4, 'name_th' => 'พึงพอใจมาก', 'name_en' => 'Very satisfied', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'score' => 3, 'name_th' => 'พึงพอใจปานกลาง', 'name_en' => 'Moderately satisfied', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'score' => 2, 'name_th' => 'พึงพอใจน้อย', 'name_en' => 'Less satisfied', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'score' => 1, 'name_th' => 'พึงพอใจน้อยที่สุด / ให้ปรับปรุง', 'name_en' => 'Least Satisfied / Improved', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
