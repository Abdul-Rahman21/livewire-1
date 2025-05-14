# Parent-Child Category Management System (Laravel + Livewire)

This project is built using **Laravel** and **Livewire** to manage a nested category system with parent-child relationships using a **single `categories` table**.

## 🚀 Features Implemented

1. **Category Grid View**
    - Lists all categories with:
        - ID
        - Full hierarchical name (e.g., `Bedroom > Beds > Panel Bed`)
        - Status (Enabled / Disabled)
        - Parent Category ID
        - Created Date
        - Updated Date

2. **Add/Edit Category**
    - Form includes:
        - Name
        - Status (1 - Enabled, 2 - Disabled)
        - Parent category dropdown with full path view (e.g., `Bedroom > Beds`)
    - Edit functionality preloads values into the form.
    - Current category is excluded from the parent dropdown during edit to avoid circular references.

3. **Parent Dropdown Display**
    - Dropdown shows full category paths for better clarity when selecting parent (e.g.):
        - Bedroom  
        - Bedroom > Beds  
        - Bedroom > Beds > Panel Bed  
        - Living Room > Sofas  
        - Living Room > Tables > Side Table  

4. **Change Parent Category**
    - Admin can edit and change the parent of any existing category via the edit form.

5. **Smart Deletion Logic**
    - If a category with children is deleted:
        - All of its children are reassigned to the deleted category’s parent.
        - This preserves the category hierarchy.

---

## 📂 Database Schema

| Column      | Type         | Description                                   |
|-------------|--------------|-----------------------------------------------|
| id          | BIGINT       | Primary key                                   |
| name        | VARCHAR      | Name of the category                          |
| status      | TINYINT      | 1 - Enabled, 2 - Disabled                     |
| parent_id   | BIGINT       | Nullable, ID of parent category               |
| created_at  | TIMESTAMP    | Created datetime                              |
| updated_at  | TIMESTAMP    | Updated datetime (nullable)                   |

---

## 🛠️ Tech Stack

- **Backend**: Laravel 11+
- **Frontend**: Laravel Blade + Livewire
- **Database**: MySQL 

---

## 🔧 Setup Instructions

### Prerequisites

- PHP 8.2+
- Composer
- MySQL
- npm

### Installation Steps

```bash
git clone https://github.com/Abdul-Rahman21/livewire-1.git
cd parent-child-category

# Install PHP dependencies
composer install

# Setup environment
cp .env.example .env
php artisan key:generate

# Set your DB credentials in .env
# DB_DATABASE=your_database
# DB_USERNAME=your_username
# DB_PASSWORD=your_password

# Run migration
php artisan migrate

# Serve the application
php artisan serve
