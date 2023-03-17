<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('about_us_id');
            $table->enum('datatype',['text','image','file'])->default('text');
            $table->string('subject_th')->nullable();
            $table->string('subject_en')->nullable();
            $table->text('content_th')->nullable();
            $table->text('content_en')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
        });

        DB::table('about_us_items')->insert([
            [ 'about_us_id' => 1, 'datatype' => 'text', 'subject_th' => 'ชื่อบริษัท',       'subject_en' => 'Company name', 'content_th' => 'บริษัท สยามซีเนเตอร์ จำกัด', 'content_en' => 'SIAM SENATER CO.,LTD.', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 1, 'datatype' => 'text', 'subject_th' => 'ประเภทของธุรกิจ', 'subject_en' => 'Type of business', 'content_th' => 'อุตสาหกรรมชิ้นส่วนรถยนต์. ประเภทบริษัท ลักษณะการดำเนินงานจะเป็นรูปแบบธุรกิจขนาดย่อม (SMEs) ที่บริหารโดยคนไทย 100%', 'content_en' => 'The automobile parts industry. Company type The nature of the operation will be the model of small businesses (SMEs) managed by the Thai people 100%', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 1, 'datatype' => 'text', 'subject_th' => 'ที่จัดตั้งขึ้น',      'subject_en' => 'Established', 'content_th' => '20 มิถุนายน 2523', 'content_en' => 'June 20, 1980', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 1, 'datatype' => 'text', 'subject_th' => 'กรรมการผู้จัดการ', 'subject_en' => 'Managing director', 'content_th' => 'Mr. Chumchai  Autantikul', 'content_en' => 'Mr. Chumchai Autantikul', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 1, 'datatype' => 'text', 'subject_th' => 'ผลิตภัณฑ์และการดำเนินงาน', 'subject_en' => 'Products and Operations', 'content_th' => "บริษัทดำเนินธุรกิจเกี่ยวกับการผลิตสินค้า การแปรรูปโลหะแผ่นเป็นส่วนประกอบยานยนต์ เป็นซัพพลายเออร์ลำดับที่ 2 ที่นำสินค้าของบริษัท ผู้โดยสารหมายเลข 1 ของรถ เช่น TOYOTA, ISUZU, NISSAN, FORD, MITSUBISHI เป็นต้น", 'content_en' => "The company is engaged in the production of goods. Sheet metal processing is a automotive component. As the 2nd order supplier to bring the company's products. Passenger No. 1 to the car as TOYOTA, ISUZU, NISSAN, FORD, MITSUBISHI etc.", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 1, 'datatype' => 'image', 'subject_th' => 'ได้รับการรับรอง', 'subject_en' => 'Received Certification', 'content_th' => '9105014786_979042.jpg', 'content_en' => '9105014786_979042.jpg', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 1, 'datatype' => 'file', 'subject_th' => 'นโยบายต่อต้านการทุจริต', 'subject_en' => 'Anti-Corruption Policy', 'content_th' => 'anti-corruption policy.pdf', 'content_en' => 'anti-corruption policy.pdf', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 1, 'datatype' => 'file', 'subject_th' => 'จริยธรรมทางธุรกิจ', 'subject_en' => 'Business Ethics', 'content_th' => 'Business Ethics.pdf', 'content_en' => 'Business Ethics.pdf', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 1, 'datatype' => 'text', 'subject_th' => 'ที่อยู่', 'subject_en' => 'Address', 'content_th' => '727 หมู่ 15 ถ.เทพารักษ์ ต.บางเสาธง อ.บางเสาธง สมุทรปราการ 10570', 'content_en' => '727 MOO 15 Teparak Road, T.Bangsaothong , A.Bangsaothong Samutprakarn 10570', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 1, 'datatype' => 'text', 'subject_th' => 'โทรศัพท์', 'subject_en' => 'Telephone', 'content_th' => '02-763-8890-2', 'content_en' => '02-763-8890-2', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 1, 'datatype' => 'text', 'subject_th' => 'แฟกซ์', 'subject_en' => 'FAX', 'content_th' => '02-763-8893-4', 'content_en' => '02-763-8893-4', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            
            [ 'about_us_id' => 2, 'datatype' => 'text', 'subject_th' => 'ปี พ.ศ. 2523', 'subject_en' => 'Year ' . (2523-543), 'content_th' => 'บริษัทฯ ก่อตั้งเมื่อวันที่ 20  มิถุนายน 2523 ที่ถนนสุขุมวิท 101/1 ต.บางจาก มีพื้นที่โรงงานทั้งหมดอยู่ที่ 1,344 ตารางเมตร โดยเริ่มต้นธุรกิจทำชิ้นส่วนถังดับเพลิง', 'content_en' => 'The company was established on June 20, 1980 at Sukhumvit 101/1 Road, Bangchak Subdistrict, with a total factory area of 1,344 square meters, starting with the business of making fire extinguisher parts.', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 2, 'datatype' => 'text', 'subject_th' => 'ปี พ.ศ. 2527', 'subject_en' => 'Year ' . (2527-543), 'content_th' => 'อยู่ในช่วงเริ่มต้นขยายการผลิตชิ้นส่วนยานยนต์ในปริมาณที่ไม่มาก (Small Volume)', 'content_en' => 'It is in the early stage of expanding the production of automotive parts in small volumes.', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 2, 'datatype' => 'text', 'subject_th' => 'ปี พ.ศ. 2541', 'subject_en' => 'Year ' . (2541-543), 'content_th' => 'เริ่มผลิตชิ้นส่วนยานยนต์ OEM และดำเนินการขอรับรองระบบคุณภาพเพื่อให้ชิ้นงานได้มาตรฐาน', 'content_en' => 'Started to produce OEM automotive parts and proceeded to apply for a quality system certification to ensure standardized workpieces.', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 2, 'datatype' => 'text', 'subject_th' => 'ปี พ.ศ. 2548', 'subject_en' => 'Year ' . (2548-543), 'content_th' => 'รับผลิตชิ้นส่วน Clip For Leaf Spring ซึ่งเป็นงานแปรรูปโลหะ โดยการปั๊มขึ้นรูปเป็นส่วนใหญ่ ในปริมาณที่มากขึ้น (Big Volume)', 'content_en' => 'Produce Clip For Leaf Spring parts, which is a metal processing work. mainly by stamping in larger quantities (Big Volume)', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 2, 'datatype' => 'text', 'subject_th' => 'ปี พ.ศ. 2550', 'subject_en' => 'Year ' . (2550-543), 'content_th' => 'ทั้งนี้เพื่อรองรับกำลังการผลิตที่เพิ่มมากขึ้น และบริษัทฯ ต้องการเพิ่มศักยภาพ รวมถึง ความหลากหลายของผลิตภัณฑ์ ทางบริษัทฯ จึงได้ย้ายฐานการผลิตมาที่ ซอยไทยประกัน ถนนเทพารักษ์ กม. 21 จ.สมุทรปราการ โดยมีพื้นที่ทำการประมาณ 6 ไร่', 'content_en' => 'In order to support the increasing production capacity and the company wants to increase the potential, including the variety of products, the company therefore moved the production base to Soi Thai Insurance, Thepharak Road, km. 21, Samut Prakan Province. with an area of approximately 6 rai', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 2, 'datatype' => 'text', 'subject_th' => 'ปี พ.ศ. 2552', 'subject_en' => 'Year ' . (2552-543), 'content_th' => 'เริ่มรับผลิตชิ้นงานเชื่อมประกอบที่พักแขน/โครงเบาะรถยนต์อย่างเต็มรูปแบบ โดยมีนโยบายให้งานเชื่อมประกอบเป็น Product Champion', 'content_en' => 'Began manufacturing full-scale welding parts for armrests/car seat frames. It has a policy to make welding work as a Product Champion.', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 2, 'datatype' => 'text', 'subject_th' => 'ปี พ.ศ. 2556', 'subject_en' => 'Year ' . (2556-543), 'content_th' => 'ทางบริษัทฯ ทำการขยายพื้นที่โรงงานอีกครั้ง เพื่อรองรับงานเชื่อมประกอบในรถยนต์ใน Model ใหม่ ๆ ซึ่งในปัจจุบัน บริษัทฯ มีพื้นที่ทำการประมาณ 6.2 ไร่', 'content_en' => 'The company has expanded the factory area again. To support welding and assembly work in new models of cars, which at present, the company has an area of ​​approximately 6.2 rai.', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],

            [ 'about_us_id' => 3, 'datatype' => 'image', 'subject_th' => 'News TTCC', 'subject_en' => 'News TTCC', 'content_th' => 'news ttcc.png', 'content_en' => 'news ttcc.png', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 3, 'datatype' => 'image', 'subject_th' => 'THAILAND TPS CO-OPERATION CLUB Runner Up 2015 Jishuken Activity Leader Group Siam Senater Co.,Ltd. January 23,2016', 'subject_en' => 'THAILAND TPS CO-OPERATION CLUB Runner Up 2015 Jishuken Activity Leader Group Siam Senater Co.,Ltd. January 23,2016', 'content_th' => 'ttcc.png', 'content_en' => 'ttcc.png', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 3, 'datatype' => 'image', 'subject_th' => "Prime Minister's Industry Aword 2012", 'subject_en' => "Prime Minister's Industry Aword 2012", 'content_th' => '031.png', 'content_en' => '031.png', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 3, 'datatype' => 'image', 'subject_th' => 'Good Logistice Practice Development Aword 2011', 'subject_en' => 'Good Logistice Practice Development Aword 2011', 'content_th' => '06.png', 'content_en' => '06.png', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 3, 'datatype' => 'image', 'subject_th' => '3rd SME National Awords 2010', 'subject_en' => '3rd SME National Awords 2010', 'content_th' => '08.png', 'content_en' => '08.png', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 3, 'datatype' => 'image', 'subject_th' => 'Logistic Model Awards 2010', 'subject_en' => 'Logistic Model Awards 2010', 'content_th' => '09.png', 'content_en' => '09.png', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 3, 'datatype' => 'image', 'subject_th' => 'The establishment of cooperation Education forms of cooperative education', 'subject_en' => 'The establishment of cooperation Education forms of cooperative education', 'content_th' => '07.png', 'content_en' => '07.png', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 3, 'datatype' => 'image', 'subject_th' => 'THE BEST Leadership Aword September 9,2016', 'subject_en' => 'THE BEST Leadership Aword September 9,2016', 'content_th' => 'ERP01.png', 'content_en' => 'ERP01.png', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 3, 'datatype' => 'image', 'subject_th' => 'had participated in TPS Activities 2014 Siam Senater Co.,Ltd.', 'subject_en' => 'had participated in TPS Activities 2014 Siam Senater Co.,Ltd.', 'content_th' => 'tps_award2014.png', 'content_en' => 'tps_award2014.png', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 3, 'datatype' => 'image', 'subject_th' => 'THE BEST Of quality performance 2015 Siam Senater co.,Ltd', 'subject_en' => 'THE BEST Of quality performance 2015 Siam Senater co.,Ltd', 'content_th' => 'TBUS.png', 'content_en' => 'TBUS.png', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 3, 'datatype' => 'image', 'subject_th' => 'AHRDP TPS Best Practice Dojo Company 2008', 'subject_en' => 'AHRDP TPS Best Practice Dojo Company 2008', 'content_th' => '01.png', 'content_en' => '01.png', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 3, 'datatype' => 'image', 'subject_th' => 'THE Best Of Supplier "DELIVERY PERFORMANCE"', 'subject_en' => 'THE Best Of Supplier "DELIVERY PERFORMANCE"', 'content_th' => 'toyotaaword2-2.png', 'content_en' => 'toyotaaword2-2.png', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 3, 'datatype' => 'image', 'subject_th' => 'Award training of management and to their environment.', 'subject_en' => 'Award training of management and to their environment.', 'content_th' => '021.png', 'content_en' => '021.png', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 3, 'datatype' => 'image', 'subject_th' => 'Banboo Factory Quality Imprcvement 2008-2009 CPM ACTIVITY', 'subject_en' => 'Banboo Factory Quality Imprcvement 2008-2009 CPM ACTIVITY', 'content_th' => '041.png', 'content_en' => '041.png', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 3, 'datatype' => 'image', 'subject_th' => 'Quality Improvemen 2008-2009 CPM. and Q-GATE ACTIVITY', 'subject_en' => 'Quality Improvemen 2008-2009 CPM. and Q-GATE ACTIVITY', 'content_th' => '01-2.png', 'content_en' => '01-2.png', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            [ 'about_us_id' => 3, 'datatype' => 'image', 'subject_th' => 'The Strongest Manufaturing Thailand TPS CO-OPERTION CLUB', 'subject_en' => 'The Strongest Manufaturing Thailand TPS CO-OPERTION CLUB', 'content_th' => '02.png', 'content_en' => '02.png', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ],
            
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_us_items');
    }
}
