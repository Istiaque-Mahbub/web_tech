# 🌫️ Air Quality Index (AQI) Web Application

## 📋 Project Overview

This web application provides users with real-time Air Quality Index (AQI) information for selected cities. It includes user registration, login/logout functionality, session and cookie management, city preferences, and personalized interface colors based on user preferences.

---

## 🚀 Features

- ✅ **User Registration & Login**
  - Secure user authentication using PHP sessions and cookies.
  - Form validation using JavaScript (client-side).
  
- 🎨 **User Preferences**
  - Stores and loads the user's preferred UI color using session and cookie.
  - Dynamic color scheme applied after login.

- 🏙️ **City Selection**
  - User selects **10 out of 20 available cities** during registration.
  - These cities' AQI data is retrieved and displayed after login.

- 📊 **AQI Display**
  - AQI values for the selected cities shown in a clean, responsive UI.
  - Data stored and retrieved from MySQL database.

- 👤 **User Dashboard**
  - Click on username to view profile information and selected cities.

---

## 🛠️ Technologies Used

- **Frontend**:  
  - HTML, CSS (Tailwind or custom), JavaScript

- **Backend**:  
  - PHP (for session, cookie, login/logout, and database operations)

- **Database**:  
  - MySQL

- **Environment**:  
  - XAMPP (Apache + MySQL)

---



---



## 🧪 How to Run the Project (Localhost)

1. 🔥 Start XAMPP:
   - Open **XAMPP Control Panel**
   - Start **Apache** and **MySQL**

2. 📁 Copy Project:
   - Place the project folder (`aqi_project/`) in `C:\xampp\htdocs\`

3. 🛠️ Create Database:
   - Open `http://localhost/phpmyadmin`
   - Create a database (e.g., `aqi`)
   - Import the provided SQL file or run schema manually.

4. ⚙️ Configure Database Connection:
   - Open `config/db.php`
   - Update with your database credentials:
     ```php
     $conn = new mysqli("localhost", "root", "", "aqi");
     ```

5. 🌐 Access the Project:
   - Open browser and go to:  
     `http://localhost/aqi_project/index.html`

---

## 🔐 Login & Sessions

- User login sets session and cookie.
- Preferred background color is stored in both and applied on login.
- Session checks are applied on each restricted page.

---

## ✅ Validation

- JavaScript validates:
  - Email format
  - Password strength
  - Form completeness


---

## 📃 License

This project is for educational purposes only. Not licensed for production use.

