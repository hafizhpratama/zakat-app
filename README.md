# Zakat App

Zakat App is a web application built using Laravel and MySQL database to help users calculate and manage their zakat (Islamic alms-giving). This application provides a convenient platform for users to calculate their zakat based on various assets and income sources.

## Features

- **Zakat Calculator**: Calculate zakat based on income, savings, investments, and other assets.
- **User Authentication**: Secure user authentication system for user registration and login.
- **Profile Management**: Users can update their profile information and view their zakat history.
- **Admin Panel**: Admin dashboard to manage users, view zakat calculations, and generate reports.
- **Responsive Design**: Mobile-friendly interface for accessibility across devices.

## Installation

1. Clone the repository:

```bash
git clone https://github.com/hafizhpratama/zakat-app.git
```

2. Navigate to the project directory:

```bash
cd zakat-app
```

3. Install dependencies:

```bash
composer install
```

4. Copy `.env.example` to `.env` and configure your environment variables:

```bash
cp .env.example .env
```

5. Generate application key:

```bash
php artisan key:generate
```

6. Run migrations to create the necessary database tables:

```bash
php artisan migrate
```

7. Serve the application:

```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser to access the application.

## Contributing

Contributions are welcome! Please feel free to fork this repository and submit pull requests.

## License

This project is licensed under the [MIT License](LICENSE).
