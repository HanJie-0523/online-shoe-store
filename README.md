# 👟 Shoe Store Website

[![Laravel](https://img.shields.io/badge/Laravel-8.x-red.svg)](https://laravel.com/)
[![PHP](https://img.shields.io/badge/PHP-%3E=8.1-blue.svg)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/Database-MySQL-blue.svg)](https://www.mysql.com/)
[![Blade](https://img.shields.io/badge/View-Blade-orange.svg)](https://laravel.com/docs/blade)
[![PayPal](https://img.shields.io/badge/Payments-PayPal-green.svg)](https://paypal.com/)

A modern, full-featured online shoe store built with **Laravel**, **Blade**, and **MySQL**, featuring role-based access for Admins and Users. Includes modules for product management, orders, stock, wishlist, and secure payments via **PayPal**.

---

## ⚙️ Tech Stack

- **Backend**: Laravel 8+
- **Frontend**: Blade (Laravel's templating engine), Bootstrap
- **Database**: MySQL
- **Authentication**: Laravel Auth
- **Payment Gateway**: PayPal (sandbox/live)
- **Authorization**: Role-based (Admin & User)

---

## 👥 User Roles & Features

### 🧑‍💼 Admin

- ✅ Manage Products (Create, Edit, Delete)
- ✅ Manage Stock Levels
- ✅ Manage Orders
- ✅ Manage Users
- ✅ Admin Dashboard (sales stats, orders, etc.)

### 🛍️ User

- 🔐 Register & Login
- 👟 Browse Products
- 🛒 Add to Cart & Checkout
- ❤️ Add to Wishlist
- 💳 Pay with PayPal
- 📦 Track Orders
- 🙍 Update Profile

---

## 📦 Core Modules

| Module        | Description                                                               |
|---------------|---------------------------------------------------------------------------|
| **Auth**      | Login, Register, Password Reset                                           |
| **Product**   | Manage and display shoes with categories, prices, and images              |
| **Stock**     | Admin control of product inventory levels                                 |
| **Order**     | Place and manage customer orders                                          |
| **Cart**      | Add, remove, or update cart items                                         |
| **Wishlist**  | Save favorite products for later                                          |
| **Payment**   | Checkout and pay via PayPal                                               |
| **User**      | Admin user management, user profile management                            |

---

## 🚀 Installation & Setup

### Requirements

- PHP >= 8.1
- Composer
- MySQL
- Node.js & NPM (for assets)

### Steps

```bash
# Clone the repo
git clone git@github.com:HanJie-0523/online-shoe-store.git
cd shoe-store

# Install dependencies
composer install

# Environment setup
cp .env.example .env
php artisan key:generate

# Setup your database in .env then run:
php artisan migrate --seed

# (Optional) Install frontend dependencies
npm install && npm run dev

# Serve the application
php artisan serve
```

## 💳 PayPal Setup

To enable PayPal payments, you need to configure the following environment variables in your `.env` file:

```env
PAYPAL_CLIENT_ID=your-paypal-client-id
PAYPAL_CLIENT_SECRET=your-paypal-secret
PAYPAL_MODE=sandbox # Use 'live' for production
```

Make sure your PayPal developer account has sandbox credentials.  
You can get them from: [https://developer.paypal.com](https://developer.paypal.com)

---

## 🔐 Default Admin Credentials

After running the database seeder, you can log in as an admin using the following credentials:

```bash
Email: admin@example.com  
Password: admin
```

> ⚠️ **Tip:** Change the admin credentials immediately after deploying to production.

---

## 🚧 Future Improvements

Here are some planned enhancements to take the project further:

- [ ] Stripe payment gateway integration  
- [ ] Product reviews and star ratings  
- [ ] Promo codes and discount system  
- [ ] Responsive mobile-friendly design  
- [ ] RESTful API for mobile app integration  
- [ ] Multilingual support (EN / MY / CN)  

Feel free to contribute or suggest features!

---

## 📄 License

This project is open-sourced under the [MIT license](https://opensource.org/licenses/MIT).
