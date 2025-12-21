# Unbundl Assessment - CarsDekho Reference

This is a dynamic car listing website developed as an assessment using Laravel 12 and Bootstrap 5.

## 🚀 Features
- **Frontend:** Dynamic Homepage (Banners, Featured Cars, Latest Cars).
- **Search & Filter:** Search by Name, Category, and Condition (New/Used).
- **Lead Generation:** User inquiry form with validation and database storage.
- **Admin Panel:** Full CRUD for Cars, Banners, Leads, Pages, and Settings.
- **PDF Brochure:** Download car details as PDF.

## 🛠 Tech Stack
- **Backend:** Laravel 12 
- **Frontend:** Blade Templates, Bootstrap 5
- **Database:** MySQL
- **Tools:** DomPDF (for brochures)

## ⚙️ Installation Guide
**1. Clone the Repository**
bash
    git clone https://github.com/abhayd-dev/unbundl-project.git
    cd unbundl-project

2️⃣ Install Backend Dependencies
bash

composer install
3️⃣ Install Frontend Dependencies
bash

npm install
4️⃣ Environment Setup
Copy the .env.example file to .env:

bash

cp .env.example .env
Open the .env file and update your database credentials:

env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=unbundl_db
DB_USERNAME=root
DB_PASSWORD=

5️⃣ Generate App Key & Migrate Database
bash

php artisan key:generate
php artisan migrate --seed
The --seed flag will automatically create the default admin user.

6️⃣ Link Storage (Important for Images)
bash

php artisan storage:link

7️⃣ Run the Application

php artisan serve


http://127.0.0.1:8000
🔑 Admin Credentials
Access the admin panel:

http://127.0.0.1:8000
Email: admin@unbundl.com
Password: 12345678

👨‍💻 Developed By
Abhay Dwivedi