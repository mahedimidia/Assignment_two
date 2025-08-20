
# ✨ Laravel Blog Management System ✨

A **clean and simple Blog Management System** built with Laravel. This project demonstrates CRUD operations, validation, relationships, pagination, and frontend display of blog categories & posts.

---

## 🚀 Features

### 🔧 Admin Panel
✅ **Master Layout** – Manage all components from a single master file  
✅ **Category Management**  
- Add new categories with validation (required name, unique slug)  
- Display validation errors clearly  
- Paginated category listing  
✅ **Post Management**  
- Add posts with fields: `title`, `content`, and `category` selection  
- Posts belong to categories (One-to-Many relationship)  
- Validation applied to all fields  
- Paginated post listing  

### 🌍 Frontend
- Display blog categories with their respective posts  
- Show posts under related category  
- Each post displays:
  - 📝 Title
  - 📖 Short content/description
  - 🏷 Category name

---

## 🛠️ Technologies Used
- **Laravel 10+** ⚡
- **Blade Templates** 🎨
- **Eloquent ORM** (Relationships) 🔗
- **Bootstrap/Tailwind CSS** (Styling)
- **Pagination** 📄

---

## ⚙️ Installation & Setup

```bash
# 1. Clone the repository
 git clone https://github.com/your-username/laravel-blog.git
 cd laravel-blog

# 2. Install dependencies
 composer install

# 3. Create .env file
 cp .env.example .env

# 4. Generate app key
 php artisan key:generate

# 5. Setup database & run migrations
 php artisan migrate

# 6. Run development server
 php artisan serve
```
Visit 👉 **http://127.0.0.1:8000**

---

## 🎯 Usage
- 🔑 `/admin/categories` → Manage Categories
- 🔑 `/admin/posts` → Manage Posts
- 🌐 `/` → View Categories & Posts on the frontend

---

## ✅ Validation Rules

**Category:**
- `name`: required
- `slug`: unique

**Post:**
- `title`: required
- `content`: required
- `category_id`: required

---

✨ Made with ❤️ using Laravel





