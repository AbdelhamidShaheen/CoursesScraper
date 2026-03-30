<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $courses = [
        [
            'title'          => 'أساسيات التسويق عبر وسائل التواصل الاجتماعي',
            'channel'        => 'تعلم السوشيال ميديا',
            'lessons'        => 20,
            'duration'       => '4 ساعات 10 دقيقة',
            'views'          => '67K',
            'category'       => 'marketing',
            'category_label' => 'التسويق',
        ],
        [
            'title'          => 'تعلم التصميم الجرافيكي باستخدام فوتوشوب',
            'channel'        => 'المصمم المحترف',
            'lessons'        => 12,
            'duration'       => '2 ساعات 45 دقيقة',
            'views'          => '89K',
            'category'       => 'graphics',
            'category_label' => 'الجرافيكس',
        ],
        [
            'title'          => 'تعلم البرمجة بلغة بايثون – دورة كاملة للمبتدئين',
            'channel'        => 'قناة البرمجة العربية',
            'lessons'        => 24,
            'duration'       => '5 ساعات 12 دقيقة',
            'views'          => '340K',
            'category'       => 'programming',
            'category_label' => 'البرمجة',
        ],
        [
            'title'          => 'دورة التسويق الرقمي الشاملة – من الصفر إلى الاحتراف',
            'channel'        => 'أكاديمية التسويق العربي',
            'lessons'        => 18,
            'duration'       => '3 ساعات 25 دقيقة',
            'views'          => '125K',
            'category'       => 'marketing',
            'category_label' => 'التسويق',
        ],
        [
            'title'          => 'دورة JavaScript الشاملة – من المبتدئ إلى المتقدم',
            'channel'        => 'كود عربي',
            'lessons'        => 28,
            'duration'       => '7 ساعات 20 دقيقة',
            'views'          => '480K',
            'category'       => 'programming',
            'category_label' => 'البرمجة',
        ],
        [
            'title'          => 'التسويق بالبريد الإلكتروني – بناء قائمة بريدية ناجحة',
            'channel'        => 'ماركتينج بالعربي',
            'lessons'        => 15,
            'duration'       => '3 ساعات 50 دقيقة',
            'views'          => '53K',
            'category'       => 'marketing',
            'category_label' => 'التسويق',
        ],
        [
            'title'          => 'تصميم الشعارات الاحترافية – Adobe Illustrator',
            'channel'        => 'ابدع في التصميم',
            'lessons'        => 8,
            'duration'       => '1 ساعة 55 دقيقة',
            'views'          => '45K',
            'category'       => 'graphics',
            'category_label' => 'الجرافيكس',
        ],
        [
            'title'          => 'دورة تطوير تطبيقات الويب بلارافيل PHP',
            'channel'        => 'عالم البرمجة',
            'lessons'        => 32,
            'duration'       => '6 ساعات 30 دقيقة',
            'views'          => '210K',
            'category'       => 'programming',
            'category_label' => 'البرمجة',
        ],
    ];

    return view('home', compact('courses'));
});
