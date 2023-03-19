<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_name_en',150)->nullable();
            $table->text('customer_description_en')->nullable();
            $table->string('customer_name_th',150)->nullable();
            $table->text('customer_description_th')->nullable();
            $table->text('customer_logo')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
        });

        DB::table('customers')->insert([
            ['customer_name_th' => 'ชื่อลูกค้า', 'customer_name_en' => 'Customer Name', 'customer_description_en' => 'Customer Detail' , 'customer_description_th' => 'คำอธิบายลูกค้า', 'customer_logo'=>'1.jpg', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['customer_name_th' => 'ชื่อลูกค้า', 'customer_name_en' => 'Customer Name', 'customer_description_en' => 'Customer Detail' , 'customer_description_th' => 'คำอธิบายลูกค้า', 'customer_logo'=>'2.jpg', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['customer_name_th' => 'ชื่อลูกค้า', 'customer_name_en' => 'Customer Name', 'customer_description_en' => 'Customer Detail' , 'customer_description_th' => 'คำอธิบายลูกค้า', 'customer_logo'=>'3.png', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['customer_name_th' => 'ชื่อลูกค้า', 'customer_name_en' => 'Customer Name', 'customer_description_en' => 'Customer Detail' , 'customer_description_th' => 'คำอธิบายลูกค้า', 'customer_logo'=>'4.png', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['customer_name_th' => 'ชื่อลูกค้า', 'customer_name_en' => 'Customer Name', 'customer_description_en' => 'Customer Detail' , 'customer_description_th' => 'คำอธิบายลูกค้า', 'customer_logo'=>'5.jpg', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['customer_name_th' => 'ชื่อลูกค้า', 'customer_name_en' => 'Customer Name', 'customer_description_en' => 'Customer Detail' , 'customer_description_th' => 'คำอธิบายลูกค้า', 'customer_logo'=>'6.jpg', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['customer_name_th' => 'ชื่อลูกค้า', 'customer_name_en' => 'Customer Name', 'customer_description_en' => 'Customer Detail' , 'customer_description_th' => 'คำอธิบายลูกค้า', 'customer_logo'=>'7.jpg', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['customer_name_th' => 'ชื่อลูกค้า', 'customer_name_en' => 'Customer Name', 'customer_description_en' => 'Customer Detail' , 'customer_description_th' => 'คำอธิบายลูกค้า', 'customer_logo'=>'8.jpg', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['customer_name_th' => 'ชื่อลูกค้า', 'customer_name_en' => 'Customer Name', 'customer_description_en' => 'Customer Detail' , 'customer_description_th' => 'คำอธิบายลูกค้า', 'customer_logo'=>'9.jpg', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['customer_name_th' => 'ชื่อลูกค้า', 'customer_name_en' => 'Customer Name', 'customer_description_en' => 'Customer Detail' , 'customer_description_th' => 'คำอธิบายลูกค้า', 'customer_logo'=>'10.jpg', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['customer_name_th' => 'ชื่อลูกค้า', 'customer_name_en' => 'Customer Name', 'customer_description_en' => 'Customer Detail' , 'customer_description_th' => 'คำอธิบายลูกค้า', 'customer_logo'=>'11.png', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['customer_name_th' => 'ชื่อลูกค้า', 'customer_name_en' => 'Customer Name', 'customer_description_en' => 'Customer Detail' , 'customer_description_th' => 'คำอธิบายลูกค้า', 'customer_logo'=>'12.jpg', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['customer_name_th' => 'ชื่อลูกค้า', 'customer_name_en' => 'Customer Name', 'customer_description_en' => 'Customer Detail' , 'customer_description_th' => 'คำอธิบายลูกค้า', 'customer_logo'=>'13.jpg', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['customer_name_th' => 'ชื่อลูกค้า', 'customer_name_en' => 'Customer Name', 'customer_description_en' => 'Customer Detail' , 'customer_description_th' => 'คำอธิบายลูกค้า', 'customer_logo'=>'14.jpg', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['customer_name_th' => 'ชื่อลูกค้า', 'customer_name_en' => 'Customer Name', 'customer_description_en' => 'Customer Detail' , 'customer_description_th' => 'คำอธิบายลูกค้า', 'customer_logo'=>'15.jpg', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['customer_name_th' => 'ชื่อลูกค้า', 'customer_name_en' => 'Customer Name', 'customer_description_en' => 'Customer Detail' , 'customer_description_th' => 'คำอธิบายลูกค้า', 'customer_logo'=>'16.jpg', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
