# Developing a Modern MVC Architecture with PHP and Eloquent

## 📅 **Project Context**  
In modern web application development, a well-structured **MVC (Model-View-Controller)** architecture is essential for ensuring clear separation of responsibilities, better maintainability, and extensibility of the code.  

This project aims to build a **lightweight PHP framework**, inspired by best practices, while remaining fast, simple, and easy to use. It will cater to modern application needs with minimal dependencies but will offer powerful features such as:  
- Routing management,  
- Integration with **Eloquent ORM**,  
- A secure data validation system.  

---

## 💡 **Project Objectives**  
1. 🔹 Develop a clear and modular **MVC** architecture.  
2. 🔹 Implement a **custom router** to handle application URLs.  
3. 🔹 Secure integration with **Eloquent ORM** for database management.  
4. 🔹 Ensure **data security** against **XSS**, **CSRF**, and **SQL Injection** attacks.  
5. 🔹 Provide useful tools: data validation, session management, error handling.  
6. 🔹 Functionally separate the **Front Office** and **Back Office**.  
7. 🔹 Use **Composer** for class autoloading.  

---

## ✅ **Key Features**  
- Advanced routing management.  
- Database connection via **Eloquent ORM**.  
- Separation between **Front Office** and **Back Office**.  
- Secure authentication system with user permissions.  
- **Role-based access control (ACL)** management.  
- Protection against **SQL Injection**, **XSS**, **CSRF**.  
- Utility classes: Validator, Security, Session.  
- Dynamic autoloading with Composer.  

---

## 🔍 **Proposed MVC Structure**  
```plaintext
/projet-mvc-php
├── public/
│   ├─ index.php
│   ├─ .htaccess
│   └─ assets/
├── app/
│   ├─ controllers/
│   │   ├─ front/
│   │   └─ back/
│   ├─ models/
│   ├─ views/
│   └─ core/
│       ├─ Router.php
│       ├─ Controller.php
│       ├─ Model.php
│       ├─ View.php
│       ├─ Database.php
│       ├─ Auth.php
│       ├─ Validator.php
│       ├─ Security.php
│       └─ Session.php
├── config/
│   ├─ config.php
│   └─ routes.php
├── logs/
├── vendor/
├── .env
├── composer.json
└── .gitignore
```  

---