# Laravel Enquiry & Product Management System

A clean, responsive, and fully-functional **Enquiry Form System** and **Product Management Dashboard** built with Laravel 12.x, PHP 8.2, and MySQL.

---

## 🛠️ Features

### Product Management (CRUD)
- **Products Dashboard**: A clean and simple list view (`/products`) of all available products with status badges and dynamic price calculations.
- **Product Creation & Editing**: Comprehensive forms to add or modify products with multiple fields (code, category, price, discount, stock, etc.).
- **Robust Backend**: Handles optional fields smoothly (converting empty strings to valid defaults) and correctly processes boolean checkboxes (like `featured` and `is_available`).
- **Dynamic Pricing**: Automatically calculates final prices using base prices and percentage discounts directly on the backend.

### Enquiry System
- **Clean Responsive Form**: A light-themed, modern form utilizing standard inputs (`Full Name`, `Email Address`, `Phone Number`, `Subject`, and `Message`).
- **Form Validation**: Server-side error validation with dynamic helper feedback using Laravel `@error` directives.
- **Persistent Data**: Preserves user input across validation errors using `old()` helper.
- **Notification Banner**: Displays clear success and warning feedback alerts on action completion.

---

## 💾 Database Schema

### `products` Table
| Field | Type | Description |
|---|---|---|
| **id** | `BIGINT` | Primary Key |
| **product_code** | `VARCHAR(255)` | Unique code for the product |
| **name** | `VARCHAR(255)` | Product name |
| **category, brand** | `VARCHAR(255)` | Categorization details |
| **short_description, description** | `TEXT` | Product details and specifications |
| **price, discount, final_price** | `DECIMAL(10,2)` | Pricing information (default 0.00) |
| **stock_quantity, min_stock_level** | `INT` | Inventory tracking (default 0) |
| **unit, color, size, material** | `VARCHAR(255)` | Product attributes |
| **weight** | `DECIMAL(10,2)` | Product weight in kg |
| **status** | `VARCHAR(255)` | active, inactive, draft (default 'active') |
| **featured, is_available** | `BOOLEAN` | Toggles for product visibility |

### `enquiries` Table
| Field | Type | Description |
|---|---|---|
| **id** | `BIGINT` | Primary Key |
| **name** | `VARCHAR(255)` | Full name of the sender |
| **email** | `VARCHAR(255)` | Email address of the sender |
| **phone** | `VARCHAR(15)` | Contact number |
| **subject** | `VARCHAR(255)` | Message subject line |
| **message** | `TEXT` | Detailed body text |

---

## 🧭 Routes

The application exposes the following endpoints:

| Method | URI | Action | Description |
|---|---|---|---|
| **GET** | `/` | `EnquiryController@create` | Displays enquiry form at home |
| **GET** | `/enquiry` | `EnquiryController@create` | Displays enquiry form |
| **POST** | `/enquiry` | `EnquiryController@store` | Submits enquiry to database |
| **RESOURCE**| `/products` | `ProductController` | Standard resource routes (index, create, store, show, edit, update, destroy) |

---

## 🔧 Bug Fixes & Refactoring

1. **Unchecked Checkbox Bug**: 
   - Fixed a classic form submission bug in `ProductController` where unchecked boolean fields (`featured`, `is_available`) weren't passed in the request, causing them to fall back incorrectly. They now explicitly save as `false` when unchecked.
2. **Empty Numeric Fields Crash**: 
   - Fixed a bug where leaving optional numeric fields (like discount) blank passed `null` to the database, violating strict constraints. They now correctly fall back to `0`.
3. **Math Calculation Errors (PHP 8)**: 
   - Fixed a frontend blade issue where `final_price` calculations crashed if `discount` was null. Calculations are now cleanly handled in the backend during `store` and `update`.
4. **UI Standardization**:
   - Simplified the aesthetic of the Products Dashboard and forms, moving away from complex glassmorphism to a cleaner, simple, and professional light-themed UI matching standard Bootstrap 5.

---

## 🚀 How to Run

1. **Configure Environment (`.env`)**:
   Ensure your database connection details are correctly set up in your `.env` file:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=emr_software
   DB_USERNAME=root
   DB_PASSWORD=
   ```
2. **Execute Database Migrations**:
   ```bash
   php artisan migrate
   ```
3. **Start Local PHP Server**:
   ```bash
   php artisan serve
   ```
4. **Access in Browser**:
   * Enquiry Form: [http://127.0.0.1:8000](http://127.0.0.1:8000)
   * Products Dashboard: [http://127.0.0.1:8000/products](http://127.0.0.1:8000/products)

---

## 🐙 Git Setup & Deployment

To push this repository to your GitHub account:

```bash
git add .
git commit -m "Added Product Management CRUD and fixed UI/Backend bugs"
git push origin main
```
