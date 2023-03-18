<?php

return [
    'back' => 'Back',
    'slideShow' => 'Slide Show',
    'pupup' => 'Pop up',
    'hotIssue' => 'Hot Issue',
    'facebookPlugin' => 'Facebook Plugin',
    'company-facebook-page' => 'Company facebook page',
    'vote' => 'Vote',
    'view-vote' => 'View the vote',
    'level_survey' => [
        'level_5' => 'Most satisfied',
        'lavel_4' => 'Very satisfied',
        'lavel_3' => 'Moderately satisfied',
        'lavel_2' => 'Less satisfied',
        'lavel_1' => 'Least Satisfied / Improved'
    ],
    'web-site-satisfaction-survey' => 'Web site satisfaction survey',
    'location_company' => 'Company Location',
    'detail' => 'Detail',
    'type-of-business' => DB::table('about_us_items')->where('id',2)->first()->content_en,
    'email' => 'E-mail',
    'time' => 'Time',
    'month' => [
        'january' => 'January',
        'february' => 'February',
        'march' => 'March',
        'april' => 'April',
        'may' => 'May',
        'june' => 'June',
        'july' => 'July',
        'august' => 'August',
        'september' => 'September',
        'october' => 'October',
        'november' => 'November',
        'december' => 'December'
    ],
    'read' => 'Read',
    'company_address' => DB::table('contact_us')->first()->address_en,
    'hot-issue' => 'HOT ISSUE',
    'fax' => 'FAX',
    'telephone' => 'Telephone',
    'address' => 'Address',
    'business_ethics' => 'Business Ethics',
    'anti_corruption_policy' => 'Anti-Corruption Policy',
    'received_certification' => 'Received Certification',
    'products_and_operations' => 'Products and Operations',
    'managing_director' => 'Managing director',
    'established' => 'Established',
    'type_of_business'  => 'Type of business',
    'company_name' => 'Company Name',
    'company_info' => 'Company Info',
    'history' => 'History',
    'award_certificate' => 'Award & Certificate',
    'company_name_full' => config('app.name_full_en'),
    'general-links' => 'General Links',
    'social-media' => 'Social Media',
    'lastpost' => 'Latest Post',
    'home' => 'Home',
    'about-us' => 'About Us',
    'our-service' => 'Our Service',
    'customer' => 'Customer',
    'news-activities' => 'News & Activities',
    'contact-us' => 'Contact Us',
    'administration' => 'Administration',
    'brand' => config('app.name_en'),
    'copyright' => '© ' . (date('Y')) . (date('Y')=='2023'?'':' - '.(date('Y'))) . ' All rights reserved. ' . config('app.name_en'),
    'login' => 'Login',
    'logout' => 'Logout',
    'register' => 'Register',
    'i-forgot-my-password' => 'I forgot my password',
    'remember-me' => 'Remember Me',
    'related-link' => 'Related Link',
    'join-us' => 'Join Us',
    'system-configuration' => 'System Configuration'
];