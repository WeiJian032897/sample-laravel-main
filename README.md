# Laravel Interview Task

Welcome! This project is pre‑configured with Docker. Please follow the steps below to get started.

---

## Requirements

Before you begin, make sure you have the following installed on your system:

- **Docker Desktop**  
  - Required to run containers (PHP, MySQL, etc.)  
  - Download: [https://www.docker.com/products/docker-desktop](https://www.docker.com/products/docker-desktop)  
  - Available for macOS, Windows

- **Docker Compose (v2)**  
  - Already included with Docker Desktop (use `docker compose` with a space).  
  - Verify installation:  
    ```bash
    docker --version
    docker compose version
    ```

---

## Setup

You can run this project in two ways:

### Option 1: Using Docker (Preferred)

1. **Copy environment file**
   ```bash
   cp .env.example .env
   ```

2. **Build images**
   ```bash
   docker compose build
   ```

3. **Install dependencies (first‑time only)**
   Run Composer in a one‑off container so `vendor/` is created:
   ```bash
   docker compose run --rm app composer install
   ```

4. **Start containers fresh**
   ```bash
   docker compose up -d
   ```
   Now that `vendor/autoload.php` exists, the `app` container will stay alive.

5. **Check status**
   ```bash
   docker compose ps
   ```
   You should see both `app` and `db` with `Up` status.

6. **Run artisan commands**
   ```bash
   docker compose exec app php artisan key:generate
   docker compose exec app php artisan migrate --seed
   ```

7. **Visit the app**
   Open [http://localhost:8000](http://localhost:8000).

---

### Option 2: Local Setup (Fallback if Docker is unavailable)

1. **Requirements**
   - PHP 8.1+ with required extensions (`mbstring`, `openssl`, `pdo`, `tokenizer`, `xml`, `ctype`, `json`, `bcmath`)
   - Composer
   - MySQL 8+ (or MariaDB)
   - Node.js + npm (if frontend assets are needed)

2. **Copy environment file**
   ```bash
   cp .env.example .env
   ```
   Update `.env` with your local DB credentials:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=interview_task
   DB_USERNAME=root
   DB_PASSWORD=secret
   ```

3. **Install dependencies**
   ```bash
   composer install
   npm install && npm run dev   # only if frontend assets are required
   ```

4. **Generate app key**
   ```bash
   php artisan key:generate
   ```

5. **Run migrations and seeders**
   ```bash
   php artisan migrate --seed
   ```

6. **Serve the app**
   ```bash
   php artisan serve
   ```
   Visit [http://localhost:8000](http://localhost:8000).

---

## Health check

`/ping → pong` route in `routes/web.php`

---

## Running Commands (*Only for Option 1)

When working inside the container, prefix commands with:

```bash
docker compose exec app <command>
```

Examples:
- `composer install` → `docker compose exec app composer install`
- `php artisan migrate` → `docker compose exec app php artisan migrate`
- `php artisan tinker` → `docker compose exec app php artisan tinker`

---

## Application Details & Tasks

Please refer to **`TASK.md`** for the full application background, data model overview, and the list of tasks to choose from.