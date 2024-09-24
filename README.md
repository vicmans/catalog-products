# Product Catalog with Newsletter Subscription

This project is a Laravel application that serves as a product catalog. Users can browse products and categories, subscribe to a newsletter, and receive updates about featured products.

## Features

- Browse products and categories
- Filter products and categories by name
- View products and categories by slug
- Subscribe and unsubscribe to newsletters
- Receive a welcome email upon subscription
- Weekly newsletter with featured products

## Requirements

- PHP >= 8.2
- Composer
- Laravel >= 11.x
- MySQL or any supported database

## Installation

Follow these steps to set up and run the project locally.

### 1. Clone the Repository

### 2. Install Dependencies

Run the following command to install the required packages:

```bash
composer install
```

### 3. Set Up Environment File

Copy the example environment file:

```bash
cp .env.example .env
```

Then, update the `.env` file with your database credentials and mail configuration.

Generate an application key:

```bash
php artisan key:generate
```

### 4. Initialize the Application

To run migrations and optionally seed the database, you can use the custom Artisan command:

```bash
php artisan app:init
```

This command will:
- Run all migrations.
- Prompt you to run seeders.
- Ask for an email and password to create a new user.

### 5. Start the Development Server

Run the following command to start the development server:

```bash
php artisan serve
```

You can now access the application at `http://localhost:8000`.

## API Endpoints

### Categories

- **List Categories**: `GET /api/categories?name=example`
- **View Category by Slug**: `GET /api/categories/slug/{slug}`

### Products

- **List Products**: `GET /api/products?name=example`
- **View Product by Slug**: `GET /api/products/slug/{slug}`

### Subscribers

- **Subscribe**: `POST /api/subscribe` (requires an email)
- **Unsubscribe**: `DELETE /api/unsubscribe` (requires an email)

## Technologies Used

- Laravel
- PHP
- MySQL
- Blade (for views)
- Eloquent ORM
- Filament (Admin panel)

## License

This project is licensed under the MIT License.
