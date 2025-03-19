# User Authentication System & CRUD Note Application

## Overview
This project is a **User Authentication System** built with Laravel, including **API endpoints** for user registration, login, logout, profile management, and a **CRUD note application**. The system is designed with security, usability, and RESTful API principles in mind.

## Features
### 1. **User Authentication**
- User **registration** with email verification.
- Secure **login** and **logout**.
- Profile management (update name, email, and password).
- Password hashing for security.

### 2. **CRUD Note Application**
- Users can **create, read, update, and delete** their own notes.
- Notes are private; each user can only access their notes.

### 3. **Security Measures**
- CSRF protection for web forms.
- Input validation to prevent SQL injection & XSS attacks.
- Secure password storage using Laravel's hashing mechanism.

## Installation



### 2. **Install dependencies**
```sh
composer install
npm install
```

### 3. **Environment Setup**
- Copy `.env.example` to `.env`
```sh
cp .env.example .env
```
- Generate application key:
```sh
php artisan key:generate
```
- Set up your **database credentials** in the `.env` file.

### 4. **Run Database Migrations**
```sh
php artisan migrate --seed
```

### 5. **Run the Development Server**
```sh
php artisan serve
npm run dev
```

## API Documentation
### **1. Authentication Endpoints**
| Method | Endpoint           | Description        |
|--------|------------------|------------------|
| POST   | `/api/register`   | Register a new user |
| POST   | `/api/login`      | Authenticate user |
| POST   | `/api/logout`     | Logout user (requires token) |
| POST   | `/api/profile`    | Update profile (requires token) |
| GET    | `/api/profile`    | GET profile (requires token) |

### **2. Notes API**
| Method | Endpoint           | Description        |
|--------|------------------|------------------|
| GET    | `/api/notes`      | Get all user notes |
| POST   | `/api/notes`      | Create a new note |
| GET    | `/api/notes/{id}` | Get a specific note |
| POST   | `/api/notes/{id}` | Update a note |
| DELETE | `/api/notes/{id}` | Delete a note |

## Testing
- Use **Postman** to test API endpoints. A Postman collection is provided in `vodoTask.postman_collection.json` with the code .




Happy Coding! 🚀

