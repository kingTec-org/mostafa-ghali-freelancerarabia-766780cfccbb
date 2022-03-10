<?php

namespace Database\Seeders;

use App\Models\Category\SubCategory;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        SubCategory::truncate();

        $items = [
            1 => [

                    "Logo Design" => "تصميم شعار",
                    "Brand Style Guides" => "أدلة نمط العلامة التجارية",


                    "Game Art" => "لعبة الفن",
                    "Graphics for Streamers" => "رسومات لللافتات",
                    " Business Cards & Stationery" => "بطاقات العمل والقرطاسية",

                    "Illustration" => "توضيح",
                    "NFT Art" => "NFT الفن",
                    "Pattern Design" => "تصميم نمط",
                    "Packaging & Label Design" => "التعبئة والتغليف وتصميم الملصقات",
                    "Brochure Design" => "تصميم الكتيب",
                    "Poster Design" => "تصميم ملصق",
                    "Signage Design" => "تصميم اللافتات",
                    "Flyer Design" => "تصميم فلاير",
                    "Book Design" => "تصميم كتاب",
                    "Album Cover Design" => "تصميم غلاف الألبوم",
                    "Podcast Cover Art" => "فن غلاف البودكاست",
                    "Website Design" => "تصميم الموقع",
                    "App Design" => "تصميم التطبيق",
                    "UX Design" => "تصميم UX",
                    "Landing Page Design" => "تصميم الصفحة المقصودة",
                    "Social Media Design" => "تصميم مواقع التواصل الاجتماعي",
                    "Email Design" => "تصميم البريد الإلكتروني",
                    "Icon Design" => "تصميم الأيقونات",
                    "AR Filters & Lenses" => "فلاتر وعدسات AR",
                    "Catalog Design" => "تصميم الكتالوج",
                    "Invitation Design" => "تصميم دعوة",
                    "Portraits & Caricatures" => "صور كاريكاتورية",
                    "Cartoons & Comics" => "كاريكاتير و كاريكاتير",
                    "Tattoo Design" => "تصميم الوشم",
                    "Web Banners" => "لافتات الويب",
                    "Photoshop Editing" => "تحرير Photoshop",
                    "Architecture & Interior Design" => "العمارة والتصميم الداخلي",
                    "Landscape Design" => "تصميم المناظر الطبيعية",
                    "Building Engineering" => "هندسة البناء",
                    "Building Information Modeling" => "نمذجة معلومات البناء",
                    "Character Modeling" => "نمذجة الشخصية",
                    "Industrial & Product Design" => "التصميم الصناعي والمنتج",
                    "Trade Booth Design" => "تصميم كشك التجارة",
                    "Fashion Design" => "تصميم الأزياء",
                    "T-Shirts & Merchandise" => "القمصان والبضائع",
                    "Jewelry Design" => "تصميم المجوهرات",
                    "Presentation Design" => "تصميم العروض التقديمية",
                    "Infographic Design" => "تصميم انفوجرافيك",
                    "Resume Design" => "استئناف التصميم",
                    "Storyboards" => "القصص المصورة",
                    "Car Wraps" => "أغطية السيارة",
                    "Menu Design" => "تصميم القائمة",
                    "Postcard Design" => "تصميم بطاقة بريدية",
                    "Vector Tracing" => "تعقب المتجهات",
                    "Twitch Store" => "متجر تويتش",
                    "Other" => "أخري",

             ]
        ];


        foreach ($items as $main_category_id=>$sub){
            foreach ($sub as $name_en=>$name_ar)
                SubCategory::firstOrCreate([
                    'category_id'=>$main_category_id,
                    'name_en'=>$name_en,
                    'name_ar'=>$name_ar,
                ]);
        }
    }
}
