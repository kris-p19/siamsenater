<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOneStopServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('one_stop_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content_th')->nullable();
            $table->text('content_en')->nullable();
            $table->timestamps();
        });

        DB::table('one_stop_services')->insert([
            [
                'content_th' => "บริษัทดำเนินธุรกิจเกี่ยวกับการผลิตสินค้า การแปรรูปโลหะแผ่นเป็นส่วนประกอบยานยนต์ เป็นซัพพลายเออร์ลำดับที่ 2 ที่นำสินค้าของบริษัท ผู้โดยสารหมายเลข 1 ของรถ เช่น TOYOTA, ISUZU, NISSAN, FORD, MITSUBISHI เป็นต้น",
                'content_en' => "The company is engaged in the production of products. Sheet metal fabrication into automotive components Become the second supplier that brings the company's products. Passenger number 1 of the car such as TOYOTA, ISUZU, NISSAN, FORD, MITSUBISHI, etc.",
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
        Schema::dropIfExists('one_stop_services');
    }
}
