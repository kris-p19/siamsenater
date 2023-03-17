<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subject_en',150)->nullable();
            $table->string('subject_th',150)->nullable();
            $table->string('path');
            $table->string('icon')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
        });

        DB::table('about_us')->insert([
            [
                'subject_en' => 'Company Info',
                'subject_th' => 'ข้อมูลบริษัท',
                'path'       => '/about-us/company-info',
                'icon'       => 'business',   
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'subject_en' => 'Company History',
                'subject_th' => 'ประวัติบริษัท',
                'path'       => '/about-us/history',
                'icon'       => 'history',   
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'subject_en' => 'Award & Certificate',
                'subject_th' => 'รางวัลและใบรับรอง',
                'path'       => '/about-us/award-certificate',
                'icon'       => 'emoji_events',   
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
        Schema::dropIfExists('about_us');
    }
}
