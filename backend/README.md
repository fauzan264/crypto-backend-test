# Crypto Backend Test

Crypto Backend Test is a Laravel-based backend that provides services for managing transactions and users with a UUID-based system.

## 📌 Prerequisites
Make sure you have installed:
- PHP 8.x
- Composer
- MySQL
- Laravel

## 🚀 Installation

1. **Clone the Repository**
   ```bash
   git clone https://github.com/fauzan264/crypto-backend-test.git
   cd crypto-backend-test
   ```

2. **Install Dependencies**
   ```bash
   composer install
   ```

3. **Create `.env` File**
   ```bash
   cp .env.example .env
   ```
   **Configure `.env`**:
   - Set up the database connection:
     ```ini
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=crypto_system
     DB_USERNAME=root
     DB_PASSWORD=
     ```

4. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

## 🛠️ Running Migrations and Seeders

1. **Run Migrations with Seeder**
   ```bash
   php artisan migrate --seed
   ```
   **Or**, if you want to reset the database and seed it again:
   ```bash
   php artisan migrate:fresh --seed
   ```

## 🔥 Running the Server

Run the following command to start the application:
```bash
php artisan serve
```
Access the application at:
```
http://127.0.0.1:8000
```
---

Now the project is ready to use!