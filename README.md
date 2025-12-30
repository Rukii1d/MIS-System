# REDA MIS System

The **REDA MIS System** is a web-based **Management Information System** developed using **Laravel** as part of an **internship project**.  
The system is designed to manage organizational data efficiently, support administrative tasks, and improve progress tracking within REDA.

---

## 🚀 Features

- **Admin Panel**
  - Manage users
  - Manage system data
  - View overall progress reports

- **User Panel**
  - User login & access control
  - Submit and view assigned data
  - Track individual progress

- **Progress Tracking**
  - Monitor project/task progress
  - Organized data handling

- **Database Management**
  - Structured MySQL database
  - Secure data storage and retrieval

---

## 🛠️ Technologies Used

- Laravel
- PHP
- MySQL
- Blade Templates
- Tailwind CSS
- JavaScript

---

## 📥 How to Clone and Run the Project

### 1️⃣ Clone the repository
```bash
git clone https://github.com/Rukii1d/MIS-System.git

2️⃣ Move into the project directory
cd MIS-System

3️⃣ Install dependencies
composer install
npm install

4️⃣ Configure environment file
cp .env.example .env


Database file folder:
mis database mysqlfile



Update the database settings in .env:

DB_DATABASE=reda_mis_db
DB_USERNAME=root
DB_PASSWORD=

5️⃣ Generate application key
php artisan key:generate

6️⃣ Run migrations
php artisan migrate

7️⃣ Start the development server
php artisan serve


Visit the application at:

http://127.0.0.1:8000
