<?php

return [
    'back' => 'ย้อนกลับ',
    'slideShow' => 'สไลด์โชว์หน้าแรก',
    'pupup' => 'ป๊อปอัพ',
    'hotIssue' => 'ประเด็นร้อน',
    'facebookPlugin' => 'เฟสบุ๊คปลั๊กอิน',
    'company-facebook-page' => 'เพจเฟสบุ๊คของบริษัท',
    'vote' => 'โหวต',
    'view-vote' => 'ดูผลโหวต',
    'level_survey' => [
        'level_5' => 'พึงพอใจมากที่สุด',
        'lavel_4' => 'พึงพอใจมาก',
        'lavel_3' => 'พึงพอใจปานกลาง',
        'lavel_2' => 'พึงพอใจน้อย',
        'lavel_1' => 'พึงพอใจน้อยที่สุด / ให้ปรับปรุง'
    ],
    'web-site-satisfaction-survey' => 'แบบสำรวจความพึงพอใจในการเข้าใช้งานเว็บไซต์',
    'location_company' => 'ตำแหน่งที่ตั้งบริษัท',
    'detail' => 'รายละเอียด',
    'type-of-business' => DB::table('about_us_items')->where('id',2)->first()->content_th,
    'email' => 'อีเมล',
    'time' => 'ครั้ง',
    'month' => [
        'january' => 'มกราคม',
        'february' => 'กุมภาพันธ์',
        'march' => 'มีนาคม',
        'april' => 'เมษายน',
        'may' => 'พฤษภาคม',
        'june' => 'มิถุนายน',
        'july' => 'กรกฎาคม',
        'august' => 'สิงหาคม',
        'september' => 'กันยายน',
        'october' => 'ตุลาคม',
        'november' => 'พฤศจิกายน',
        'december' => 'ธันวาคม'
    ],
    'read' => 'อ่าน',
    'company_address' => DB::table('contact_us')->first()->address_th,
    'hot-issue' => 'ประเด็นร้อน',
    'fax' => 'แฟกซ์',
    'telephone' => 'โทรศัพท์',
    'address' => 'ที่อยู่',
    'business_ethics' => 'จริยธรรมทางธุรกิจ',
    'anti_corruption_policy' => 'นโยบายต่อต้านการทุจริต',
    'received_certification' => 'ได้รับการรับรอง',
    'products_and_operations' => 'ผลิตภัณฑ์และการดำเนินงาน',
    'managing_director' => 'กรรมการผู้จัดการ',
    'established' => 'วันที่จัดตั้ง',
    'type_of_business'  => 'ประเภทธุรกิจ',
    'company_name' => 'ชื่อบริษัท',
    'company_info' => 'ข้อมูลบริษัท',
    'history' => 'ประวัติ',
    'award_certificate' => 'รางวัลและใบรับรอง',
    'company_name_full' => config('app.name_full_th'),
    'general-links' => 'ลิงค์ทั่วไป',
    'social-media' => 'สื่อสังคม',
    'lastpost' => 'โพสต์ล่าสุด',
    'home' => 'หน้ากลัก',
    'about-us' => 'เกี่ยวกับเรา',
    'our-service' => 'บริการของเรา',
    'customer' => 'ลูกค้า',
    'news-activities' => 'ข่าวสารและกิจกรรม',
    'contact-us' => 'ติดต่อเรา',
    'administration' => 'ผู้ดูแลเว็บไซต์',
    'brand' => config('app.name_th'),
    'copyright' => '© ' . (date('Y')+543) . (date('Y')=='2023'?'':' - '.(date('Y')+543)) . ' สงวนลิขสิทธิ์ ' . config('app.name_th'),
    'login' => 'เข้าสู่ระบบ',
    'logout' => 'ออกจากระบบ',
    'register' => 'สมัครสมาชิก',
    'i-forgot-my-password' => 'ฉันลืมรหัสผ่าน',
    'remember-me' => 'บันทึกการเข้าสู่ระบบ',
    'related-link' => 'ลิงค์ที่เกี่ยวข้อง',
    'join-us' => 'ร่วมงานกับเรา',
    'system-configuration' => 'ตั้งค่าระบบ'
];