# Laravel User, Role, and Permission Management API

This project is a RESTful API for managing users, roles, and permissions with secure token-based authentication and a scalable architecture.

---

## Features
- User management (CRUD operations, role, and permission assignments)
- Role management (CRUD operations, assign permissions to roles)
- Permission management (list all permissions)
- Middleware for secure authorization and access control
- Scalable architecture using the repository pattern
- Token-based authentication with Laravel Passport
- PSR-12 compliant code standards

---

## Requirements
- PHP >= 8.1
- Laravel >= 10.x
- MySQL >= 5.7
- Composer
- Postman (optional)

---

## Setup Instructions

1. Clone the repository:
   ```bash
   git clone <repository-url>
   cd <repository-name>

2. Install dependencies:
composer install

3. Set up environment:
cp .env.example .env
Update the .env file with your database credentials.

4. Run database migrations and seeders:

php artisan migrate --seed

5. Install and configure Laravel Passport:

php artisan passport:install

6. Start the development server:

php artisan serve