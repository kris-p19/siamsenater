<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internship_programs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content_th')->nullable();
            $table->text('content_en')->nullable();
            $table->timestamps();
        });

        DB::table('internship_programs')->insert([
            [
                'content_th' => "",
                'content_en' => "",
                'created_at' => date('Y-m-m H:i:s'),
                'updated_at' => date('Y-m-m H:i:s')
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
        Schema::dropIfExists('internship_programs');
    }
}
