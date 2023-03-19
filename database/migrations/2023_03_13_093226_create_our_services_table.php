 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('service_name_th')->nullable();
            $table->string('service_name_en')->nullable();
            $table->text('service_desciption_th')->nullable();
            $table->text('service_desciption_en')->nullable();
            $table->text('hastag_th')->nullable();
            $table->text('hastag_en')->nullable();
            $table->text('picture_header')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
        });

        DB::table('our_services')->insert([
            ['picture_header'=>'215A9277.jpg','hastag_th'=>'การประกอบโครงที่เท้าแขน','hastag_en'=>'Armrest Frame Assembly','service_name_th'=>'การประกอบโครงที่เท้าแขน','service_name_en'=>'Armrest Frame Assembly','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['picture_header'=>'215A9185.jpg','hastag_th'=>'ตัวยึดและส่วนประกอบ','hastag_en'=>'Bracket & Component','service_name_th'=>'ตัวยึดและส่วนประกอบ','service_name_en'=>'Bracket & Component','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['picture_header'=>'215A9389.jpg','hastag_th'=>'การประกอบโครงเบาะ','hastag_en'=>'Cushion Frame Assembly','service_name_th'=>'การประกอบโครงเบาะ','service_name_en'=>'Cushion Frame Assembly','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['picture_header'=>'215A9262.jpg','hastag_th'=>'ใส่ฝารองนั่ง','hastag_en'=>'Insert Seat Cover','service_name_th'=>'ใส่ฝารองนั่ง','service_name_en'=>'Insert Seat Cover','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['picture_header'=>'215A9257.jpg','hastag_th'=>'ชุดประกอบล็อค','hastag_en'=>'Lock Unit Assembly','service_name_th'=>'ชุดประกอบล็อค','service_name_en'=>'Lock Unit Assembly','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['picture_header'=>'215A9269.jpg','hastag_th'=>'การดัดท่อ','hastag_en'=>'Pipe Bending','service_name_th'=>'การดัดท่อ','service_name_en'=>'Pipe Bending','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['picture_header'=>'215A9349.jpg','hastag_th'=>'ประกอบย่อยท่อ','hastag_en'=>'Pipe Sub Assembly','service_name_th'=>'ประกอบย่อยท่อ','service_name_en'=>'Pipe Sub Assembly','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['picture_header'=>'215A9182.jpg','hastag_th'=>'การประกอบโครงที่นั่ง','hastag_en'=>'Seat Frame Assembly','service_name_th'=>'การประกอบโครงที่นั่ง','service_name_en'=>'Seat Frame Assembly','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['picture_header'=>'215A9215.jpg','hastag_th'=>'การดัดลวด','hastag_en'=>'Wire Bending','service_name_th'=>'การดัดลวด','service_name_en'=>'Wire Bending','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('our_services');
    }
}
