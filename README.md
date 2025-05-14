# Laravel Livewire User Form

A simple Laravel + Livewire component for creating and editing users, including image upload functionality.

---

## 📦 Requirements

Make sure the following are installed:

- PHP >= 8.1
- Composer
- MySQL or compatible database
- Node.js and NPM
- Laravel CLI (`composer global require laravel/installer`)
- Livewire (installed via Composer)

---

## 🚀 Setup Instructions

### 1. Clone the Project

```
git clone https://github.com/your-username/your-project.git
cd your-project
```

### 2. Create .env File
```
cp .env.example .env
```

### 3. Set Up Database
```
Then open .env in a text editor and set your database credentials:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. Install Dependencies
PHP Dependencies


```
composer install
```
JavaScript Dependencies


```
npm install && npm run dev
```
### 5. Generate App Key


```
php artisan key:generate
```
### 6. Run Migrations


```
php artisan migrate
```
### 7. Create Storage Symlink (for image uploads)


```
php artisan storage:link
```
Running the App

Start the Laravel server:

```
php artisan serve
```

Visit: http://127.0.0.1:8000
