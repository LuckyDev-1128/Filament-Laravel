# Filament | Task Management Web App

The project is a task management application designed to help users organize and track their tasks efficiently. It allows users to create, update, and delete tasks, assign them to specific users, set task statuses, and add relevant tags for easy categorization. The application provides a user-friendly interface for managing tasks, making it simple for users to keep track of their to-do lists and prioritize their work effectively. With its intuitive design and comprehensive functionality, the app aims to streamline task management and enhance productivity for individuals and teams alike.


## Features

- User authentication and authorization
- Task creation, editing, and deletion
- Task assignment to specific users
- Setting and updating task statuses
- Tagging tasks for easy categorization
- User-friendly interface for efficient task management
- Streamlined task tracking and prioritization

## Getting Started

### Prerequisites

- [Node.js](https://nodejs.org/) and npm (Node Package Manager)
- [MySQL](https://www.mysql.com/) database
- [Composer](https://getcomposer.org/) for PHP dependencies

### Installation

1. Install Node.js dependencies:
   ```sh
   npm install
   ```

2. Install PHP dependencies:
   ```sh
   composer install
   ```

3. Set up environment variables:
   - Duplicate the `.env.example` file and rename it to `.env`.
   - Update the database credentials and other necessary configurations.

4. Generate an application key:
   ```sh
   php artisan key:generate
   ```

5. Run database migrations:
   ```sh
   php artisan migrate
   ```

6. Seed the database:
   ```sh
   php artisan db:seed
   ```




