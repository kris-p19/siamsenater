<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_configurations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('groups');
            $table->string('names');
            $table->string('contents');
            $table->timestamps();
        });

        DB::table('system_configurations')->insert([
            // System Font
            [
                'groups'        => 'system_font',
                'names'         => 'font_th',
                'contents'      => 'Noto Sans Thai',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'groups'        => 'system_font',
                'names'         => 'font_en',
                'contents'      => 'Poppins',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
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
        Schema::dropIfExists('system_configurations');
    }
}
