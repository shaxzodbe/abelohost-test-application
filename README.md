# Pure PHP Blog Application

A full-featured blog application built with pure PHP 8.4, Smarty template engine, and MySQL.

## Features
- **MVC Architecture**: Custom implementation without frameworks.
- **Smarty Templates**: Clean separation of logic and views.
- **SCSS Styling**: Modern, responsive design using compiled SCSS.
- **Automated Setup**: Docker environment handles database migrations and seeding automatically.
- **Functionality**:
    - Categorized articles
    - Pagination
    - Sorting (Newest, Oldest, Popular)
    - Article views counting
    - Related articles

## Prerequisites
- Docker & Docker Compose

## Quick Start

1. **Clone the repository** (if you haven't already):
   ```bash
   git clone <repository-url>
   cd abelohost-test-application
   ```

2. **Run the application**:
   ```bash
   docker compose up -d --build
   ```
   *This command will:*
   - Build the PHP and Node.js containers.
   - Start MySQL and PhpMyAdmin.
   - Install Composer dependencies automatically.
   - Create database tables and seed them with test data (50+ articles).
   - Compile SCSS to CSS.

3. **Access the site**:
   - Blog: [http://localhost:8080](http://localhost:8080)
   - PhpMyAdmin: [http://localhost:8081](http://localhost:8081) (Server: `db`, User: `user`, Password: `password`)

## Project Structure
- `public/`: Web entry point (`index.php`) and assets (CSS, images).
- `src/`: PHP source code (Controllers, Router, Database).
- `templates/`: Smarty templates (`.tpl` files).
- `resources/scss/`: Source SCSS files.
- `config/`: Configuration files (e.g., Apache vhost).
- `docker-compose.yml`: Docker services definition.

## Development

- **Re-seeding the Database**:
  To reset the database and generate new random data:
  ```bash
  docker compose exec app php seed.php
  ```

- **Watching SCSS Changes**:
  The `sass` service automatically watches for changes in `resources/scss`. To see logs:
  ```bash
  docker compose logs -f sass
  ```

## Tech Stack
- **Backend**: PHP 8.4
- **Frontend**: HTML5, Smarty, SCSS (CSS)
- **Database**: MySQL 8.0
- **Environment**: Docker
