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

### 4. **Bonus Features**
- Email verification during registration.
- "Forgot Password" feature to reset passwords via email.

## Installation

### 1. **Clone the repository**
```sh
 git clone https://github.com/YOUR_USERNAME/your-repo.git
 cd your-repo
```

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
```

## API Documentation
### **1. Authentication Endpoints**
| Method | Endpoint           | Description        |
|--------|------------------|------------------|
| POST   | `/api/register`   | Register a new user |
| POST   | `/api/login`      | Authenticate user |
| POST   | `/api/logout`     | Logout user (requires token) |
| PUT    | `/api/profile`    | Update profile (requires token) |

### **2. Notes API**
| Method | Endpoint           | Description        |
|--------|------------------|------------------|
| GET    | `/api/notes`      | Get all user notes |
| POST   | `/api/notes`      | Create a new note |
| GET    | `/api/notes/{id}` | Get a specific note |
| PUT    | `/api/notes/{id}` | Update a note |
| DELETE | `/api/notes/{id}` | Delete a note |

## Testing
- Use **Postman** to test API endpoints. A Postman collection is provided in `postman_collection.json`.

## Deployment
- Run the following commands to prepare for production:
```sh
php artisan config:cache
php artisan route:cache
php artisan migrate --force
```

## Submission
- Upload your project to GitHub.
- Send the link via email to:
  - **hamdy.emad@vodoglobal.com**
  - **alaa.hamdy@vodoglobal.com**
  - CC: **mohamed.hashem@vodoglobal.com**

## Evaluation Criteria
- **Functionality**: All authentication and CRUD features working.
- **Code Quality**: Clean, well-structured, and maintainable code.
- **Security**: Proper implementation of security measures.
- **User Experience**: Simple, intuitive interface.
- **Bonus Features**: Email verification and password reset.

---
**Deadline:** Thursday, 20/05/2025.

Happy Coding! 🚀

