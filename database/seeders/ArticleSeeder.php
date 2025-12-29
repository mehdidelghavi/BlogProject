<?php

namespace Database\Seeders;

use App\Models\Articles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'title' => '۱۰ راهکار برای یادگیری بهتر برنامه نویسی',
                'content' => 'برنامه نویسی یکی از مهارت‌های پرطرفدار است. برای یادگیری بهتر، تمرین روزانه و حل چالش‌های جدید الزامی است...',
                'user_id' => 1,
            ],
            [
                'title' => 'آینده هوش مصنوعی در سال ۲۰۲۴',
                'content' => 'هوش مصنوعی با سرعت عجیبی در حال پیشرفت است. از مدل‌های زبانی تا تولید تصاویر واقع‌گرایانه، همگی دنیای ما را تغییر می‌دهند...',
                'user_id' => 1,
            ],
            [
                'title' => 'بهترین فریم‌ورک‌های توسعه وب',
                'content' => 'لاراول، ری‌اکت و ویو (Vue) در حال حاضر محبوب‌ترین ابزارها برای توسعه‌دهندگان وب هستند. هر کدام ویژگی‌های خاص خود را دارند...',
                'user_id' => 1,
            ],
            [
                'title' => 'چرا باید از لاراول استفاده کنیم؟',
                'content' => 'لاراول با اکوسیستم قوی و سینتکس بسیار تمیز، توسعه وب را برای برنامه نویسان PHP لذت‌بخش و سریع کرده است...',
                'user_id' => 1,
            ],
        ];
        foreach ($articles as $article) {
            Articles::create($article);
        }
    }
}
