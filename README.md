# 📚 Library Management API — Laravel 12 + SQLite

## 🧾 Overview
This project is a **RESTful API** for a simple **Library Management System**, built using **Laravel 12** and **SQLite**.  
It provides endpoints to manage **Authors** and **Books**, along with optimized performance through **database caching**.

The project is designed to demonstrate clean code structure, database normalization, unit testing, and performance tuning.

---

## ⚙️ Setup Instructions
```bash
git clone https://github.com/<your-username>/library-api.git
cd library-api
composer install
cp .env.example .env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
php artisan migrate
php artisan serve

