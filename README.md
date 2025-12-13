# 🥗 Dietitian Management System

A comprehensive web application for dietitians to manage their practice, clients, appointments, diet programs, and more. Built with **Laravel 12** and **Filament 3** admin panel.

---

## 📋 Table of Contents

- [Features](#-features)
- [Tech Stack](#-tech-stack)
- [Requirements](#-requirements)
- [Installation](#-installation)
- [Running the Application](#-running-the-application)
- [Project Structure](#-project-structure)
- [License](#-license)

---

## ✨ Features

### Client Management
- Complete client profiles with physical, medical, nutrition, and lifestyle information
- Client payment tracking and management
- Client history and progress monitoring

### Appointment System
- Dietitian schedule management with customizable time slots
- Appointment booking and status tracking
- Calendar integration with FullCalendar

### Diet Programs
- Custom diet program creation for each client
- Meal categories and meal planning
- Diet program items with detailed nutritional information

### Content Management
- Blog posts with categories and tags
- Service pages
- FAQ management
- Testimonials
- Image sliders
- Static pages

### Admin Features
- Role-based access control with Filament Shield
- User management
- Contact message handling
- Dashboard with statistics overview

### Additional Features
- PDF report generation with DomPDF
- Excel export functionality
- Queue management with Laravel Horizon
- Redis caching support
- Media library integration

---

## 🛠 Tech Stack

| Technology | Version | Purpose |
|------------|---------|---------|
| PHP | ^8.2 | Backend runtime |
| Laravel | ^12.0 | PHP Framework |
| Filament | ^3.3 | Admin Panel |
| PostgreSQL | - | Database |
| TailwindCSS | ^4.0 | Styling |
| Vite | ^7.0 | Build tool |
| Redis | - | Queue & Cache |

### Key Packages
- **Filament Shield** - Role & Permission management
- **Spatie Media Library** - Media handling
- **Spatie Laravel Tags** - Tagging system
- **FullCalendar** - Calendar & scheduling
- **DomPDF** - PDF generation
- **Maatwebsite Excel** - Excel exports
- **Laravel Horizon** - Queue monitoring

---

## 📌 Requirements

- **PHP** >= 8.2
- **Composer** >= 2.0
- **Node.js** >= 18.x
- **NPM** >= 9.x
- **PostgreSQL** >= 14 (or compatible database)
- **Redis** (optional, for queue and cache)

---

## 🚀 Installation

### 1. Clone the Repository

```bash
git clone https://github.com/schatsu/dietitianV2.git
cd dietitianV2
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Node.js Dependencies

```bash
npm install
```

### 4. Environment Configuration

Copy the example environment file and configure your settings:

```bash
cp .env.example .env
```

Edit the `.env` file with your database credentials:

```env
APP_NAME="Dietitian Management"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=dietitianv2
DB_USERNAME=your_username
DB_PASSWORD=your_password

# Optional: Redis configuration
REDIS_HOST=127.0.0.1
REDIS_PORT=6379
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Run Database Migrations

```bash
php artisan migrate
```

### 7. Seed the Database (Optional)

```bash
php artisan db:seed
```

### 8. Set Up Filament Shield (Roles & Permissions)

```bash
php artisan shield:install
php artisan shield:generate --all
```

### 9. Create Admin User

```bash
php artisan make:filament-user
```

### 10. Build Frontend Assets

For development:
```bash
npm run dev
```

For production:
```bash
npm run build
```

---

## ▶️ Running the Application

### Development Mode (Recommended)

The project includes a convenient development script that runs all necessary services concurrently:

```bash
composer dev
```

This command starts:
- 🌐 **Laravel Server** at `http://localhost:8000`
- 📨 **Queue Worker** for background jobs
- 📋 **Laravel Pail** for real-time log monitoring
- ⚡ **Vite** development server for hot-reloading

### Manual Start

If you prefer to run services individually:

**Start the Laravel development server:**
```bash
php artisan serve
```

**Start the queue worker (in a separate terminal):**
```bash
php artisan queue:listen --tries=1
```

**Start Vite for frontend assets (in a separate terminal):**
```bash
npm run dev
```

### Accessing the Application

- **Admin Panel:** `http://localhost:8000/admin`
- **Frontend:** `http://localhost:8000`

---

## 📁 Project Structure

```
dietitianV2/
├── app/
│   ├── Enums/           # Application enumerations
│   ├── Exports/         # Excel export classes
│   ├── Filament/        # Filament admin resources
│   │   ├── Pages/       # Custom admin pages
│   │   ├── Resources/   # CRUD resources
│   │   └── Widgets/     # Dashboard widgets
│   ├── Http/            # Controllers & Middleware
│   ├── Jobs/            # Queue jobs
│   ├── Models/          # Eloquent models
│   ├── Notifications/   # Notification classes
│   ├── Observers/       # Model observers
│   ├── Policies/        # Authorization policies
│   ├── Providers/       # Service providers
│   ├── Services/        # Business logic services
│   ├── Settings/        # Application settings
│   └── View/            # View components
├── config/              # Configuration files
├── database/
│   ├── factories/       # Model factories
│   ├── migrations/      # Database migrations
│   └── seeders/         # Database seeders
├── public/              # Public assets
├── resources/
│   └── views/           # Blade templates
├── routes/              # Application routes
├── storage/             # File storage
└── tests/               # Test files
```

### Key Models

| Model | Description |
|-------|-------------|
| `User` | System users (dietitians, admins) |
| `Client` | Client/patient records |
| `ClientPhysicalProfile` | Physical measurements |
| `ClientMedicalProfile` | Medical history |
| `ClientNutritionProfile` | Nutritional preferences |
| `ClientLifestyleProfile` | Lifestyle information |
| `ClientPayment` | Payment records |
| `DietProgram` | Diet plans for clients |
| `DietProgramItem` | Individual items in diet plans |
| `Meal` | Meal definitions |
| `MealCategory` | Meal categorization |
| `Service` | Services offered |
| `Blog` | Blog posts |
| `Category` | Blog categories |

---

## 🧪 Testing

Run the test suite:

```bash
composer test
```

Or directly with PHPUnit:

```bash
php artisan test
```

---

## 🔧 Useful Commands

```bash
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

# Optimize for production
php artisan optimize

# Run code style fixes
./vendor/bin/pint

# Start Laravel Horizon (queue monitoring)
php artisan horizon

# Start Laravel Telescope (debugging)
# Available at: http://localhost:8000/telescope
```

---

## 📝 License

This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).

---

## 👨‍💻 Development

### Code Style

This project uses [Laravel Pint](https://laravel.com/docs/pint) for code styling. Run the following command to fix code style issues:

```bash
./vendor/bin/pint
```

### Debugging

- **Laravel Telescope** is available for debugging at `/telescope`
- **Laravel Debugbar** is enabled in development mode
- Use `php artisan pail` for real-time log monitoring

---

<p align="center">Built with ❤️ using Laravel & Filament</p>
