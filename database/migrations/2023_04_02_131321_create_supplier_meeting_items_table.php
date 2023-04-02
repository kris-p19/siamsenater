<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierMeetingItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_meeting_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_th')->nullable();
            $table->string('title_en')->nullable();
            $table->text('file')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
        });

        DB::table('supplier_meeting_items')->insert([
            [
                'title_th' => 'คู่มือคุณภาพซัพพลายเออร์',
                'title_en' => 'Supplier Quality Manual',
                'file' => 'SST _ SQM-01 Edition 13 _ 2021.pdf',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title_th' => 'นโยบายการจัดซื้อ',
                'title_en' => 'Purchasing Policy',
                'file' => 'Supplier Meeting 2021  PU.pdf',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title_th' => 'นโยบายความปลอดภัยและสิ่งแวดล้อม',
                'title_en' => 'Safety & Environment Policy',
                'file' => 'Supplier Meeting 2021 Environment.pdf',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title_th' => 'นโยบายร้านค้า',
                'title_en' => 'Store Policy',
                'file' => 'SUPPLIER MEETING 2021 -  STORE.pdf',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title_th' => 'นโยบายคุณภาพ',
                'title_en' => 'Quality Policy',
                'file' => 'Power point Supplier Meeting 2021 QA.pdf',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_meeting_items');
    }
}
