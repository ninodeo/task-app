# 📝 Task Application

A simple task management system built with **Laravel 12**, **Laravel Breeze**, **Livewire**, and **Tailwind CSS**, containerized with **Docker**.

---

## 📌 Project Overview

This project is a full-featured task management system with the following:

- User authentication (via Laravel Breeze & Livewire)
- Role-based access (Admin & Standard User)
- Task CRUD with completion toggle
- Search & pagination
- Fully Dockerized for easy setup

---

## ⚙️ Tech Stack

- **PHP 8.3**
- **Laravel 12**
- **Laravel Breeze** (with Livewire)
- **Tailwind CSS**
- **MySQL 8**
- **Docker / Docker Compose**
- **Nginx**

---

## ✅ Requirements

- Docker & Docker Compose (for containerized setup)  
  OR  
- PHP >= 8.2, Composer, Node.js, and MySQL (for traditional setup)

---

## 🐳 Docker Setup (Recommended)

```bash
# 1. Clone the repository
git clone https://github.com/ninodeo/task-app.git
cd task-app

# 2. Build the containers
docker compose build

# 3. Start the app
docker compose up

# 4. Wait until dependencies are installed (first time only)

# 5. Run migrations and seed data
docker compose exec app php artisan migrate:fresh --seed

# 6. Open the app in your browser
http://localhost:8080
```

> 📝 **Note:** The command `php artisan migrate:fresh --seed` will:
> - Run the database migrations
> - Seed the database with initial users and dummy tasks
> - Applies to **both Docker and traditional setup**

### 👥 Seeded Users

- **Admin User**  
  📧 `admin@example.com`  
  🔒 `password`

- **Standard User**  
  📧 `user@example.com`  
  🔒 `password`

---

## 🧰 Traditional Setup (Without Docker)

```bash
# 1. Clone the repository
git clone https://github.com/ninodeo/task-app.git

# 2. Navigate to Laravel app folder
cd task-app/src

# 3. Install PHP dependencies
composer install

# 4. Install frontend assets
npm install

# 5. Create environment file
cp .env.example .env

# 6. Configure your database credentials in `.env`

# 7. Run migrations & seed the database
php artisan migrate:fresh --seed

# 8. Start Laravel backend
php artisan serve

# 9. Start Vite dev server (for Tailwind CSS)
npm run dev
```

> ✅ Same seeding behavior applies: the `php artisan migrate:fresh --seed` command will populate users and dummy tasks.

---

## 📂 Project Structure

```
task-app/
├── docker/               # Docker-related configs
│   ├── nginx/
│   │   └── default.conf
│   └── php/
│       ├── Dockerfile
│       └── entrypoint.sh
├── src/                  # Laravel application
│   ├── app/
│   ├── routes/
│   ├── resources/
│   └── ...
├── docker-compose.yml
└── README.md
```

---

## 🙋‍♂️ Author

**Niño Dimaangay**  
GitHub: [@ninodeo](https://github.com/ninodeo)
