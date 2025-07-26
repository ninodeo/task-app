# ✅ Laravel Task Management System

A simple Task Management System built with **Laravel 12**, **Livewire**, **Tailwind CSS**, and **Docker**. It supports both Dockerized and traditional local environments.

---

## 📂 Features

- 🔐 Authentication (Laravel Breeze)
- 👥 Role-based Access Control (Admin/User)
- ✅ Task CRUD (Create, Read, Update, Delete)
- 🔄 Task Completion Toggle
- 🔎 Livewire-based Search + Pagination
- 💨 Tailwind CSS for UI
- 🐳 Docker-ready and Dev-friendly

---

## 🚀 Running with Docker (Recommended)

### 📦 Prerequisites

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)

### ⚙️ Instructions

1. **Clone the Repo**

```bash

git clone https://github.com/ninodeo/task-app.git
cd task-app
```

2. **Copy `.env` File**

```bash
cp src/.env.example src/.env
```

3. **Start Docker**

```bash
docker-compose up -d --build
```

4. **Run Migrations and Seeders**

```bash
docker exec -it task-app php artisan migrate --seed
```

5. **Compile Assets (Tailwind & Livewire)**

```bash
docker exec -it task-app bash
cd /var/www
npm install
npm run dev
exit
```

6. **Visit the App**

- http://localhost:8080

---

## 💻 Running Locally Without Docker

### 🔧 Requirements

- PHP >= 8.2
- Composer
- Node.js >= 18
- NPM
- MySQL or MariaDB
- Git

### 📌 Setup Steps

1. **Clone and Enter Project**

```bash
git clone https://github.com/ninodeo/task-app.git
cd task-app
```

2. **Install PHP & Node Dependencies**

```bash
composer install
npm install
```

3. **Copy `.env` File**

```bash
cp .env.example .env
```

Then update DB credentials in `.env`.

4. **Run Migrations & Seeders**

```bash
php artisan key:generate
php artisan migrate --seed
```

5. **Compile Assets (Tailwind & Livewire) - run command inside src folder**

```bash
npm run dev
```

6. **Serve App**

```bash
php artisan serve
```

Visit: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 🔑 Default Logins (Seeded)

| Role  | Email             | Password |
| ----- | ----------------- | -------- |
| Admin | admin@example.com | password |
| User  | user@example.com  | password |

---

## 📁 Notes

- Ensure these directories are writable:

```bash
chmod -R 775 storage bootstrap/cache
```

- You can use `npm run build` instead of `dev` for production.

---
