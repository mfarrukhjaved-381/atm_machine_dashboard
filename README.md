<p align="center">
  <img src="https://placehold.co/800x200/1a1a2e/00d4ff?text=ATM+Machine+Dashboard" alt="ATM Machine Dashboard Banner" width="800" style="border-radius: 10px;">
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-MariaDB-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/HTML5-CSS3-E34F26?style=for-the-badge&logo=html5&logoColor=white" alt="HTML/CSS">
  <img src="https://img.shields.io/badge/License-MIT-brightgreen?style=for-the-badge" alt="MIT License">
  <img src="https://img.shields.io/github/stars/mfarrukhjaved-381/ATM_Machine-Dashboard?style=for-the-badge&color=brightgreen" alt="GitHub Stars">
</p>

# ATM Machine Dashboard

> A browser-based ATM simulation system built with PHP and MySQL — register users, authenticate via PIN, withdraw cash, and manage accounts through a simple web interface.

<p align="center">
  <img src="https://github.com/mfarrukhjaved-381.png?size=80" alt="Muhammad Farrukh Javed" style="border-radius: 50%;"><br>
  <strong>Developed by <a href="https://github.com/mfarrukhjaved-381">Muhammad Farrukh Javed</a></strong>
</p>

---

## 🎯 Scope, Honestly

This project simulates the core transaction flows of an ATM: user registration with a 4-digit PIN, PIN-based authentication, cash withdrawal (custom amount or fast-cash presets), balance inquiry, and PIN change. It runs entirely on a local LAMP/XAMPP stack — no cloud, no API, no payment gateway. It is a server-rendered PHP application backed by a single MySQL table (`users`).

**What it does not do:** It does not encrypt or hash PINs (they are stored in plaintext). It does not implement role-based access control, admin panels, or multi-account support per user. It does not use prepared statements in all queries, which means raw SQL strings are present — this is a known limitation. It is not intended for production use or real financial data of any kind.

> **Status:** 🟡 Educational / Portfolio project — functional but not production-hardened. Suitable for learning PHP session management, form handling, and MySQL CRUD operations.

---

## ⚡ Quick Start

You need a local PHP + MySQL environment. [XAMPP](https://www.apachefriends.org/) or [WAMP](https://www.wampserver.com/) works perfectly.

<details>
<summary><strong>Option 1: XAMPP / WAMP (Recommended)</strong></summary>

```bash
# 1. Clone the repository
git clone https://github.com/mfarrukhjaved-381/ATM_Machine-Dashboard.git

# 2. Move the project into your web server's root
#    For XAMPP on Linux/macOS:
cp -r ATM_Machine-Dashboard /opt/lampp/htdocs/

#    For XAMPP on Windows:
#    Copy the folder to: C:\xampp\htdocs\

# 3. Start Apache and MySQL from the XAMPP Control Panel

# 4. Import the database
#    Open phpMyAdmin → http://localhost/phpmyadmin
#    Create a new database named: atm
#    Click "Import" → select atm.sql → click "Go"

# 5. Open the app in your browser
#    http://localhost/ATM_Machine-Dashboard/home.php
```

</details>

<details>
<summary><strong>Option 2: PHP Built-in Server (CLI)</strong></summary>

> ⚠️ This option requires a running MySQL instance separately. Adjust the `mysqli` connection credentials in each `.php` file if your MySQL user/password differs from `root` / *(empty)*.

```bash
# 1. Clone the repository
git clone https://github.com/mfarrukhjaved-381/ATM_Machine-Dashboard.git
cd ATM_Machine-Dashboard

# 2. Import the database schema
mysql -u root -p < atm.sql

# 3. Start the built-in PHP server
php -S localhost:8000

# 4. Open your browser to:
#    http://localhost:8000/home.php
```

</details>

### Database Configuration

The database connection is hardcoded in the PHP files. If your credentials differ, update the `mysqli` constructor in the following files:

| File | Default Connection |
|---|---|
| `processWithdrawal.php` | `new mysqli("localhost", "root", "", "atm")` |
| `processFastCash.php` | `new mysqli("localhost", "root", "", "atm")` |
| `processChangePin.php` | `new mysqli("localhost", "root", "", "atm")` |
| `SaveUserPin.php` | `new mysqli("localhost", "root", "", "atm")` |
| `ViewUsers.php` | `new mysqli("localhost", "root", "", "atm")` |
| `editUser.php` / `updateUser.php` | `new mysqli("localhost", "root", "", "atm")` |
| `checkUser.php` / `CheckPin.php` | `new mysqli("localhost", "root", "", "atm")` |

---

## 🤔 Why This Exists

**The Problem:** When learning PHP for the first time, most tutorials stop at simple CRUD apps (to-do lists, blogs). It is hard to find a self-contained project that demonstrates sessions, form validation, AJAX username/PIN availability checks, and multi-step user flows — all without a framework.

**The Fix:** This project stitches those concepts together in a domain everyone understands: an ATM. You can trace exactly how a user registers, authenticates, performs a transaction, and gets logged out — all in plain PHP with zero dependencies.

> [!TIP]
> Start by reading `home.php` → `FrmSetPin.php` → `SaveUserPin.php` → `FrmEnterPin.php` → `PinVerification.php` → `Dashboard.php` in that order. This traces the complete user lifecycle from registration through authentication to the transaction dashboard.

---

## 🗂 File Structure & Flow

```
ATM_Machine-Dashboard/
├── home.php               # Entry point — Set PIN or Enter PIN
├── FrmSetPin.php          # Registration form (username + 4-digit PIN)
├── SaveUserPin.php        # Saves new user to DB
├── checkUser.php          # AJAX: checks if username is already taken
├── CheckPin.php           # AJAX: validates PIN format
├── FrmEnterPin.php        # Login form (username + PIN)
├── PinVerification.php    # Authenticates credentials, starts session
├── Dashboard.php          # Authenticated user dashboard
├── CashWithdrawal.php     # Custom amount withdrawal form
├── processWithdrawal.php  # Processes withdrawal, updates balance
├── FastCash.php           # Preset withdrawal (Rs. 20 / 50 / 100)
├── processFastCash.php    # Processes fast cash withdrawal
├── ChangePin.php          # PIN change form
├── processChangePin.php   # Validates old PIN, updates to new PIN
├── ViewBalance.php        # Displays current account balance
├── ViewUsers.php          # Lists all users (admin-style view)
├── editUser.php           # Edit user form
├── updateUser.php         # Persists user edits to DB
├── DeleteUser.php         # Deletes a user record
├── logoutUser.php         # Destroys session, redirects to login
├── style.css              # Basic shared stylesheet
└── atm.sql                # Database schema + seed data
```

---

## ✨ Features

### Core ATM Operations
- **User Registration** — Create an account with a unique username and a 4-digit numeric PIN
- **PIN Authentication** — Session-based login; unauthenticated requests redirect to the login form
- **Cash Withdrawal** — Enter a custom amount; balance is validated before deducting
- **Fast Cash** — One-click withdrawal of preset amounts (Rs. 20, Rs. 50, Rs. 100)
- **View Balance** — Display current account balance for the authenticated user
- **Change PIN** — Verify old PIN, then update to a new 4-digit PIN

### Session & Security (Basic)
- **Session Timeout** — Automatic logout after 60 seconds of inactivity
- **Session Guard** — All transaction pages redirect unauthenticated users to the login form
- **Input Validation** — PIN validated as 4-digit numeric on both client and server side

### Admin / Data Management
- **View All Users** — Lists all registered accounts (username, PIN, balance)
- **Edit User** — Modify username or balance directly
- **Delete User** — Remove a user record from the database

### Developer Experience
- **Real-time AJAX checks** — Username availability and PIN format validated on blur without page reload
- **Zero dependencies** — No Composer, no npm, no framework — just PHP and a MySQL connection
- **Seed data included** — `atm.sql` ships with two sample users to get started immediately

---

## ⚠️ Known Limitations

These are documented to help contributors understand what needs improvement:

| Limitation | Detail |
|---|---|
| **No PIN hashing** | PINs are stored and compared as plaintext integers in the database |
| **SQL Injection risk** | Most queries use string interpolation instead of prepared statements |
| **No CSRF protection** | POST forms do not use CSRF tokens |
| **Hardcoded DB credentials** | Connection details are repeated in each file, not centralized |
| **No admin authentication** | `ViewUsers.php`, `editUser.php`, `DeleteUser.php` are accessible without any role check |
| **Currency hardcoded** | Currency symbol is `Rs.` with no configurable option |
| **Fast Cash presets hardcoded** | Values of Rs. 20, 50, 100 are in the HTML; not driven by config |

---

## 🛠 Customizing the Project

- **Centralize DB credentials** — Refactor the `mysqli` instantiation into a single `db.php` file and `require` it wherever a connection is needed. This eliminates repetition across 8+ files.
- **Add PIN hashing** — Replace raw PIN storage with `password_hash()` / `password_verify()` to bring the project closer to real-world security standards.
- **Change Fast Cash amounts** — Open `FastCash.php` and edit the `<option value="...">` elements to reflect your preferred preset amounts.
- **Extend the `users` table** — Add columns like `email`, `account_number`, or `created_at` to `atm.sql` and update the relevant forms to capture and display them.
- **Switch to prepared statements** — Replace raw `$conn->query("... '$var' ...")` calls with `$stmt = $conn->prepare(...)` / `$stmt->bind_param(...)` to eliminate SQL injection risk.

---

## 🤝 Contributing

Contributions are welcome, especially improvements to security, code organization, and documentation.

1. **Fork** the repository on GitHub
2. **Create a branch** for your feature or fix:
   ```bash
   git checkout -b feature/add-prepared-statements
   ```
3. **Commit** your changes with a clear message:
   ```bash
   git commit -m "refactor: replace raw queries with prepared statements"
   ```
4. **Push** your branch:
   ```bash
   git push origin feature/add-prepared-statements
   ```
5. **Open a Pull Request** against the `main` branch and describe your changes

> [!NOTE]
> If you're fixing a security issue (SQL injection, missing auth checks, PIN hashing), please open an issue first so it can be tracked and discussed before the PR.

---

## 📝 License

This project is licensed under the **MIT License** — you are free to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the software.

```
MIT License

Copyright (c) 2023 Muhammad Farrukh Javed

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
```

---

<p align="center">
  Made with ☕ by <a href="https://github.com/mfarrukhjaved-381">Muhammad Farrukh Javed</a>
</p>
