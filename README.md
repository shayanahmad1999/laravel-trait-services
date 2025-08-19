# Laravel Project for Traits and Services

This README will guide you through setting up and running the Laravel project locally.

## Prerequisites

Ensure the following tools are installed on your system:
🔧 Tech Stack:

-   PHP >= 8.4
-   Laravel = 12
-   MySQL or any supported database

## Installation & Setup

Follow the steps below to get started:

```bash
# Clone the repository
git clone https://github.com/shayanahmad1999/laravel-trait-services.git
cd laravel-trait-services

# Copy and set up the environment configuration
cp .env.example .env

# Generate application key
php artisan key:generate

# Run database migrations
php artisan migrate

# Run the development server
php artisan serve

# Create Trait
php artisan make:trait Trait/SampleTrait

# Create Services
php artisan make:class Services/SampleService

# Create Command
php artisan make:command SayHelloCommand

# Run Command open terminal
php artisan app:sayHello Name

```
