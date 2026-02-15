🚀 Native PHP Framework Engine

> A lightweight MVC framework engine built from scratch using pure PHP to simulate how modern backend frameworks like Laravel work internally.

---

 📌 About The Project

This is not just a CRUD application.

It is a custom-built mini framework that implements the internal architecture of modern PHP frameworks without relying on external libraries.

The main goal of this project was to deeply understand:

- Routing systems
- Dependency Injection
- Middleware pipelines
- HTTP request lifecycle
- Authentication & Security handling
- Custom exception architecture

---

 🏗️ Core Architecture Components

# 🔹 Custom Router
- Route registration system
- HTTP method handling (GET, POST, etc.)
- Route-to-controller mapping

 # 🔹 Dispatcher
- Resolves incoming requests
- Executes controller actions dynamically
- Connects Router with Middleware & Controllers

# 🔹 Service Container (IoC)
- Custom Dependency Injection container
- Automatic dependency resolution
- Inversion of Control implementation
- Constructor injection support

### 🔹 Middleware Pipeline
- Pre-controller request handling
- Extensible middleware execution flow
- Route protection mechanism

### 🔹 Custom Exception System
- Dedicated Exception classes
- Centralized error handling
- Clean separation between business logic & error flow

### 🔹 CSRF Protection
- Secure token generation
- Token verification
- Secure form submission handling

### 🔹 MVC Pattern
- Controllers implemented as classes
- Interface-based abstraction
- Clean separation of concerns
- Organized project structure

---

## 🔐 Authentication Module

- User Registration
- Secure Login
- Password verification
- Session-based authentication
- Middleware-protected routes

---

## 📝 Notes Module (CRUD Implementation)

Demonstrates full integration of:

- Routing
- Controllers
- Dependency Injection
- Middleware
- Security layer

Features:
- Create note
- Read notes
- Update note
- Delete note

---

## 🔄 Request Lifecycle (Internal Flow)

Incoming Request  
→ Router  
→ Dispatcher  
→ Middleware Pipeline  
→ Controller  
→ Response  

---

## 📸 Code Architecture Screenshots
![Structure screenshot](./screenshot/00-structureProject.png)
![Router Screenshot](./screenshot/01-router.png)
![Dispatcher Screenshot](./screenshot/02-dispatcher.png)
![Container Screenshot](./screenshot/03-container.png)
![CSRF Screenshot](./screenshot/04-csrf.png)

---

## 🧠 Technical Concepts Applied

- Object-Oriented Programming (OOP)
- SOLID Principles
- Dependency Injection Pattern
- Inversion of Control (IoC)
- Middleware Architecture
- HTTP Request Lifecycle
- Secure Form Handling
- Custom Exception Design
- Clean Code Principles

---

## 🎯 Why This Project Is Important

This project demonstrates:

- Deep understanding of backend architecture
- Ability to design modular systems
- Strong PHP core knowledge
- Understanding of how frameworks work internally
- Clean separation of concerns
- Production-style code organization

---

## 🛠️ Future Improvements

- Request & Response abstraction layer
- Validation system
- Logging system
- API support (JSON responses)
- Unit & Feature Testing
- Composer-based autoloading improvements

---

## 💼 Backend Developer Focus

I build systems to understand how things work internally — not just how to use them.

This project reflects hands-on experience in backend architecture design and framework-level thinking.
