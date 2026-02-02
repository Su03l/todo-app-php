# Enjaz - Task Management Application

Enjaz is a modern, responsive task management application built with Laravel. It features a clean user interface designed for both web and mobile environments, focusing on simplicity and productivity.

## Features

- **User Authentication**: Secure registration and login system.
- **Task Management**: Create, read, update, and delete tasks (CRUD).
- **Task Status**: Toggle tasks between completed and pending states.
- **Profile Management**: Update user information and profile picture.
- **Responsive Design**: Fully optimized for mobile devices with safe-area support.
- **Modern UI**: Built with Tailwind CSS v4 for a sleek, professional look.

## Technology Stack

- **Backend**: Laravel 11 (PHP 8.2+)
- **Frontend**: Blade Templates, Tailwind CSS v4
- **Database**: SQLite (Default) / MySQL
- **JavaScript**: Vanilla JS & Alpine.js (for interactivity)
- **Build Tool**: Vite

## Prerequisites

Ensure you have the following installed on your machine:

- PHP 8.2 or higher
- Composer
- Node.js & NPM

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/enjaz.git
   cd enjaz
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment Configuration**
   Copy the example environment file and generate the application key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database Setup**
   Create the SQLite database file (if using SQLite) and run migrations:
   ```bash
   touch database/database.sqlite
   php artisan migrate
   ```

6. **Link Storage**
   Create a symbolic link for public file storage (for avatars):
   ```bash
   php artisan storage:link
   ```

## Running the Application

### For Web Development (Localhost)

1. Start the Vite development server:
   ```bash
   npm run dev
   ```

2. Start the Laravel server:
   ```bash
   php artisan serve
   ```

3. Access the application at `http://localhost:8000`.

### For Mobile Emulator (Android Studio)

To run the application on an Android Emulator and ensure proper connectivity:

1. Start the Laravel server on all network interfaces:
   ```bash
   php artisan serve --host=0.0.0.0 --port=8000
   ```

2. Start the Vite server:
   ```bash
   npm run dev
   ```

3. Open the browser inside the Android Emulator and navigate to:
   `http://10.0.2.2:8000`

   *Note: `10.0.2.2` is the special alias to your host machine's localhost from within the Android emulator.*

## Project Structure

- **app/Http/Controllers**: Contains logic for Auth, Tasks, and User Profile.
- **resources/views**: Blade templates for the UI.
  - **auth/**: Login and Register pages (Blade Forms).
  - **tasks/**: Main dashboard and task management.
  - **layouts/**: Main application layout file.
- **routes/web.php**: Application routes definition.
- **vite.config.js**: Frontend build configuration.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
