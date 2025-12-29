# 📘 BlogProject (Laravel Blog API)

یک پروژه مدیریت وبلاگ (Backend / API) توسعه داده‌شده با **Laravel 11**  

---

## ✨ ویژگی‌ها

- 🔐 ثبت‌نام و ورود کاربران
- 🛡️ احراز هویت با JWT
- 📝 مدیریت مقالات (CRUD)
- 🔍 جستجوی مقالات
- 👤 سطح دسترسی (فقط نویسنده می‌تواند پست خود را ویرایش یا حذف کند)
- 🧪 داده‌های تستی (Seeder)

---

## 🧰 تکنولوژی‌ها

- PHP 8+
- Laravel 11
- MySQL
- Composer
- JWT Auth

---

## 📦 نصب و راه‌اندازی

### 1️⃣ کلون کردن پروژه
```bash
git clone https://github.com/mehdidelghavi/BlogProject.git
cd BlogProject
```

### 2️⃣ نصب وابستگی‌ها
```bash
composer install
```

### 3️⃣ تنظیم فایل محیطی
```bash
cp .env.example .env
php artisan key:generate
```

اطلاعات دیتابیس را در فایل `.env` تنظیم کنید.

---

### 4️⃣ اجرای مایگریشن و Seeder
```bash
php artisan migrate --seed
```

---

### 5️⃣ تنظیم JWT
```bash
php artisan jwt:secret
```

---

### 6️⃣ اجرای پروژه
```bash
php artisan serve
```

---

## 📡 API Endpoints (نمونه)

### 🔐 ثبت‌نام
```
POST /api/register
[
    'name' => ['required']
    'email' => ['required'],
    'password' => ['password'],
]
```

### 🔑 ورود
```
POST /api/login
[
    'email' => ['required'],
    'password' => ['password'],
]
```

### 🔑 خروج
```
POST /api/logout
Authorization: Bearer YOUR_TOKEN
```

### 📄 دریافت لیست مقالات
```
GET /api/articles
Authorization: Bearer YOUR_TOKEN
```

### 📄 دریافت لیست مقالات
```
GET /api/articles/show/{article_id}
Authorization: Bearer YOUR_TOKEN
```

### ➕ ایجاد مقاله 
```
POST /api/articles/store
Authorization: Bearer YOUR_TOKEN
[
    'title' => ['required', 'string'],
    'content' => ['required'],
    'image' => ['nullable','mimes:jpg,png,webp']
]
```

### ✏️ ویرایش مقاله 
```
POST /api/articles/update/{article_id}
Authorization: Bearer YOUR_TOKEN
[
    'title' => ['required', 'string'],
    'content' => ['required'],
    'image' => ['nullable','mimes:jpg,png,webp']
]
```

### 🔍 جستجو مقاله 
```
GET /api/articles/search/
Authorization: Bearer YOUR_TOKEN
[
    'searchValue' => ['required'],
]
```

### 🗑️ حذف مقاله 
```
DELETE /api/articles/delete/{article_id}
Authorization: Bearer YOUR_TOKEN
```

---

## 🧪 کاربران تستی

email: user1@example.com  
password: password

---

## 📄 License

MIT License

---

## 👨‍💻 توسعه‌دهنده

Mehdi Dalghavi  
https://github.com/mehdidelghavi
