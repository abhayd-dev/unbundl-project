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
1. **Clone the repository:**
   ```bash
   git clone [https://github.com/abhayd-dev/unbundl-project.git](https://github.com/abhayd-dev/unbundl-project.git)
   cd unbundl-project

2. **Install Backend Dependencies:**
   ```bash
    composer install
3. **Install Frontend Dependencies:**
   ```bash
    npm install
Environment Setup:

Copy the .env.example file to .env:

Bash

cp .env.example .env
Open the .env file and update your database credentials:

Code snippet

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=unbundl_db  # Create this database in your MySQL
DB_USERNAME=root
DB_PASSWORD=
Generate App Key & Migrate Database:

Bash

php artisan key:generate
php artisan migrate --seed
(Note: The --seed flag will create the default admin user).

Link Storage (Crucial for Images):

Bash

php artisan storage:link
Run the Server:

Bash

php artisan serve
🔑 Admin Credentials
You can access the admin panel at: http://127.0.0.1:8000/login

Email: admin@unbundl.com

Password: password

Developed by Abhay Dwivedi    

