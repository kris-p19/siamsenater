<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_us', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('conpany_name_en')->nullable();
            $table->string('conpany_name_th')->nullable();
            $table->string('address_en')->nullable();
            $table->string('address_th')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('contact1st_th')->nullable();
            $table->string('contact2st_th')->nullable();
            $table->string('contact1st_en')->nullable();
            $table->string('contact2st_en')->nullable();
            $table->string('picture_map')->nullable();
            $table->string('url_googlemap')->nullable();
            $table->string('url_facebook')->nullable();
            $table->string('url_twitter')->nullable();
            $table->string('url_instagram')->nullable();
            $table->string('url_youtube')->nullable();
            $table->string('url_line')->nullable();
            $table->string('url_tiktok')->nullable();
            $table->timestamps();
        });

        DB::table('contact_us')->insert([
            [
                'conpany_name_en' => config('app.name_full_en'),
                'conpany_name_th' => config('app.name_full_th'),
                'address_en' => 'No. 727 Moo 15, Soi Thai Prakan 20, Bang Sao Thong Subdistrict, Bang Sao Thong District Samut Prakan Province 10570',
                'address_th' => 'เลขที่ 727 หมู่15 ซอยไทยประกัน 20 ตำบลบางเสาธง อำเภอบางเสาธง จังหวัดสมุทรปราการ 10570',
                'phone' => '02-763-8890-2',
                'fax' => '02-763-8893-4',
                'contact1st_en' => 'Ms.Janjira Autantikul<br>(Asst. Managing Director)|jautantikul@siamsenater.co.th',
                'contact2st_en' => 'Mr.Natee U-wichian<br>(Business Department Manager)|ny@siamsenater.co.th',
                'contact1st_th' => 'Ms.Janjira Autantikul<br>(Asst. Managing Director)|jautantikul@siamsenater.co.th',
                'contact2st_th' => 'Mr.Natee U-wichian<br>(Business Department Manager)|ny@siamsenater.co.th',
                'picture_map' => 'images/Map SST-large-large.png',
                'url_googlemap' => 'https://goo.gl/maps/sk1qrLvLuFJg5w9N7',
                'url_facebook' => 'https://www.facebook.com/siamsenater/',
                'url_twitter' => null,
                'url_instagram' => null,
                'url_youtube' => null,
                'url_line' => null,
                'url_tiktok' => null,
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
        Schema::dropIfExists('contact_us');
    }
}
