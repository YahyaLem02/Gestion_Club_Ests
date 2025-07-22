# 🎓 Club Management Platform – EST Safi

A complete web platform built with **Laravel** for managing student clubs at the Higher School of Technology of Safi.

## 🚀 Project Description

This project provides a centralized system for managing student clubs. It supports three types of users: members (students), administrators (club managers), and a supervisor (institution-level administrator). The platform enables streamlined club operations and an efficient complaints management system.

## 🛠️ Core Features

### 👤 For Members:
- Submit complaints through an online form (subject, category, description)
- View personal complaint history and current status
- Receive notifications when a response is given by an administrator

### 🧑‍💼 For Club Administrators:
- Create, update, and delete clubs
- View and respond to all received complaints, with filtering by status
- Assign additional administrators to clubs

### 🧑‍🏫 For Supervisors:
- Manage administrator roles and permissions
- Full control over club creation and deletion
- Supervise all users and clubs at the school level

## ⚙️ Technologies Used

- **Laravel** 10+
- **MySQL** (Database)
- **Blade** (Frontend templating)
- **Tailwind CSS** or **Bootstrap** (Styling)
- Optional use of **AJAX/jQuery** for dynamic interactions

## 📦 Installation Guide

```bash
# Clone the repository
git clone https://github.com/<your-username>/club-management-laravel.git

cd club-management-laravel

# Install PHP dependencies
composer install

# Copy the environment file
cp .env.example .env

# Generate the app key
php artisan key:generate

# Configure your database in the .env file

# Run migrations
php artisan migrate

# Start the development server
php artisan serve
