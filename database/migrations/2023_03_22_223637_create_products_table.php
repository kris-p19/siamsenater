<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('group_name_th')->nullable();
            $table->string('group_name_en')->nullable();
            $table->string('name_th')->nullable();
            $table->string('name_en')->nullable();
            $table->text('desciption_th')->nullable();
            $table->text('desciption_en')->nullable();
            $table->text('picture');
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
        });

        DB::table('products')->insert([
            // BRACKET & COMPONENTS
            ['group_name_th'=>'BRACKET & COMPONENTS','group_name_en'=>'BRACKET & COMPONENTS','picture'=>'1-3-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'BRACKET & COMPONENTS','group_name_en'=>'BRACKET & COMPONENTS','picture'=>'2-3-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'BRACKET & COMPONENTS','group_name_en'=>'BRACKET & COMPONENTS','picture'=>'3-3-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'BRACKET & COMPONENTS','group_name_en'=>'BRACKET & COMPONENTS','picture'=>'4-3-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'BRACKET & COMPONENTS','group_name_en'=>'BRACKET & COMPONENTS','picture'=>'5-4-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'BRACKET & COMPONENTS','group_name_en'=>'BRACKET & COMPONENTS','picture'=>'6-4-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            // CLIP FOR LEAF SPRING
            ['group_name_th'=>'CLIP FOR LEAF SPRING','group_name_en'=>'CLIP FOR LEAF SPRING','picture'=>'1-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'CLIP FOR LEAF SPRING','group_name_en'=>'CLIP FOR LEAF SPRING','picture'=>'2-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'CLIP FOR LEAF SPRING','group_name_en'=>'CLIP FOR LEAF SPRING','picture'=>'3-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'CLIP FOR LEAF SPRING','group_name_en'=>'CLIP FOR LEAF SPRING','picture'=>'4-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'CLIP FOR LEAF SPRING','group_name_en'=>'CLIP FOR LEAF SPRING','picture'=>'5-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'CLIP FOR LEAF SPRING','group_name_en'=>'CLIP FOR LEAF SPRING','picture'=>'6-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            // FRAME ARMREST SUB ASS'Y
            ['group_name_th'=>'FRAME ARMREST SUB ASS\'Y','group_name_en'=>'FRAME ARMREST SUB ASS\'Y','picture'=>'1-2.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'FRAME ARMREST SUB ASS\'Y','group_name_en'=>'FRAME ARMREST SUB ASS\'Y','picture'=>'2-2-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'FRAME ARMREST SUB ASS\'Y','group_name_en'=>'FRAME ARMREST SUB ASS\'Y','picture'=>'3-2-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'FRAME ARMREST SUB ASS\'Y','group_name_en'=>'FRAME ARMREST SUB ASS\'Y','picture'=>'4-2-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'FRAME ARMREST SUB ASS\'Y','group_name_en'=>'FRAME ARMREST SUB ASS\'Y','picture'=>'5-3-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'FRAME ARMREST SUB ASS\'Y','group_name_en'=>'FRAME ARMREST SUB ASS\'Y','picture'=>'6-3-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            // FRAME SUB ASS'Y
            ['group_name_th'=>'FRAME SUB ASS\'Y','group_name_en'=>'FRAME SUB ASS\'Y','picture'=>'1-4-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'FRAME SUB ASS\'Y','group_name_en'=>'FRAME SUB ASS\'Y','picture'=>'2-4-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'FRAME SUB ASS\'Y','group_name_en'=>'FRAME SUB ASS\'Y','picture'=>'3-4-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'FRAME SUB ASS\'Y','group_name_en'=>'FRAME SUB ASS\'Y','picture'=>'4-4-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'FRAME SUB ASS\'Y','group_name_en'=>'FRAME SUB ASS\'Y','picture'=>'5-5-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'FRAME SUB ASS\'Y','group_name_en'=>'FRAME SUB ASS\'Y','picture'=>'6-5-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'FRAME SUB ASS\'Y','group_name_en'=>'FRAME SUB ASS\'Y','picture'=>'7-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'FRAME SUB ASS\'Y','group_name_en'=>'FRAME SUB ASS\'Y','picture'=>'8-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'FRAME SUB ASS\'Y','group_name_en'=>'FRAME SUB ASS\'Y','picture'=>'9-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'FRAME SUB ASS\'Y','group_name_en'=>'FRAME SUB ASS\'Y','picture'=>'10-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'FRAME SUB ASS\'Y','group_name_en'=>'FRAME SUB ASS\'Y','picture'=>'11-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'FRAME SUB ASS\'Y','group_name_en'=>'FRAME SUB ASS\'Y','picture'=>'12-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'FRAME SUB ASS\'Y','group_name_en'=>'FRAME SUB ASS\'Y','picture'=>'13-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            // INSERT WIRE
            ['group_name_th'=>'INSERT WIRE','group_name_en'=>'INSERT WIRE','picture'=>'1-6.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'INSERT WIRE','group_name_en'=>'INSERT WIRE','picture'=>'2-6-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'INSERT WIRE','group_name_en'=>'INSERT WIRE','picture'=>'3-6-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'INSERT WIRE','group_name_en'=>'INSERT WIRE','picture'=>'4-6-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            // LOCK UNIT ASS'Y
            ['group_name_th'=>'LOCK UNIT ASS\'Y','group_name_en'=>'LOCK UNIT ASS\'Y','picture'=>'1-7-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'LOCK UNIT ASS\'Y','group_name_en'=>'LOCK UNIT ASS\'Y','picture'=>'2-7-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'LOCK UNIT ASS\'Y','group_name_en'=>'LOCK UNIT ASS\'Y','picture'=>'3-7-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'LOCK UNIT ASS\'Y','group_name_en'=>'LOCK UNIT ASS\'Y','picture'=>'4-7-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'LOCK UNIT ASS\'Y','group_name_en'=>'LOCK UNIT ASS\'Y','picture'=>'5-7-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            // PIPE BENDING
            ['group_name_th'=>'PIPE BENDING','group_name_en'=>'PIPE BENDING','picture'=>'1-5-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'PIPE BENDING','group_name_en'=>'PIPE BENDING','picture'=>'2-5-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'PIPE BENDING','group_name_en'=>'PIPE BENDING','picture'=>'3-5-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'PIPE BENDING','group_name_en'=>'PIPE BENDING','picture'=>'4-5-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'PIPE BENDING','group_name_en'=>'PIPE BENDING','picture'=>'5-6-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'PIPE BENDING','group_name_en'=>'PIPE BENDING','picture'=>'6-6-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['group_name_th'=>'PIPE BENDING','group_name_en'=>'PIPE BENDING','picture'=>'7-3-large.jpg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
