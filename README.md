# 🏠 Airnbn - Laravel Property Rental Platform

<div align="center">

[![Laravel](https://img.shields.io/badge/Laravel-12.0-FF2D20?style=for-the-badge&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-Railway-4479A1?style=for-the-badge&logo=mysql)](https://railway.app)

**A full-stack property rental platform inspired by Airbnb, built with Laravel, featuring real-time bookings, interactive maps, and cloud storage.**

<br/>

<a href="https://youtube.com/your-video-link" target="_blank">
  <img src="https://img.shields.io/badge/▶️_Watch_Demo-FF0000?style=for-the-badge&logo=youtube&logoColor=white" alt="YouTube Demo" height="50"/>
</a>
&nbsp;&nbsp;&nbsp;
<a href="https://airnbn-a-property-rental-site.onrender.com/" target="_blank">
  <img src="https://img.shields.io/badge/🌐_Live_Demo-00C853?style=for-the-badge&logo=google-chrome&logoColor=white" alt="Live Demo" height="50"/>
</a>

<br/><br/>

[Features](#-features) • [Installation](#-installation) • [Tech Stack](#-tech-stack) • [Documentation](#-documentation) • [Deployment](#-deployment)

</div>

---

## 📸 Screenshots

<div align="center">

### 🏠 Homepage

![Homepage](screenshots/homepage.png)

### 🏡 Listing Details

![Listing](screenshots/listing-detail.png)

### 📊 Host Dashboard

![Dashboard](screenshots/host-dashboard.png)

</div>

---

## ✨ Features

### For Guests

-   🔍 **Advanced Search & Filtering** - Search by location, property type, and trending listings
-   🗺️ **Interactive Maps** - Mapbox integration for location visualization
-   📅 **Easy Booking System** - Book properties with date selection and special requests
-   ⭐ **Reviews & Ratings** - Leave reviews and ratings for properties
-   📱 **Responsive Design** - Works seamlessly on mobile, tablet, and desktop
-   🌙 **Dark Mode** - Toggle between light and dark themes

### For Hosts

-   🏡 **Property Management** - Create, edit, and delete listings
-   📊 **Host Dashboard** - Manage bookings and view statistics
-   ✅ **Booking Controls** - Accept or reject booking requests
-   ☁️ **Cloud Image Storage** - Images stored on Cloudinary for fast loading
-   🌍 **Automatic Geocoding** - Location coordinates auto-generated via Mapbox

### Technical Features

-   🔐 **Authentication System** - Secure login/signup with role-based access (Guest/Host)
-   💾 **Cloud Database** - Railway MySQL for production-ready data storage
-   🎨 **Modern UI/UX** - Clean, intuitive interface with custom CSS
-   🔔 **Flash Messages** - Real-time feedback for user actions
-   🛡️ **Middleware Protection** - Authorization checks for secure operations

---

## 🚀 Tech Stack

| Category           | Technologies                               |
| ------------------ | ------------------------------------------ |
| **Backend**        | Laravel 12.0, PHP 8.2                      |
| **Database**       | MySQL (Railway Cloud)                      |
| **Frontend**       | Blade Templates, JavaScript, CSS3          |
| **APIs**           | Mapbox Geocoding API, Cloudinary Media API |
| **Storage**        | Cloudinary (Images)                        |
| **Authentication** | Laravel Authentication                     |
| **Build Tools**    | Vite, Composer, NPM                        |

---

## 📋 Table of Contents

1. [Features](#-features)
2. [Demo Links](#-demo-links)
3. [Tech Stack](#-tech-stack)
4. [Installation](#-installation)
5. [Configuration](#-configuration)
6. [Database Setup](#-database-setup)
7. [Project Structure](#-project-structure)
    - [Database Migrations & Seeders](#1-database-migrations-factories-and-seeders)
    - [Controllers](#2-controllers-and-their-functions)
    - [Middlewares](#3-middlewares)
    - [Models](#4-models)
    - [Services](#5-mapbox-services)
    - [Routes & Views](#6-routes-views-js-and-css)
8. [Artisan Commands](#7-necessary-artisan-commands)
9. [Deployment](#-deployment)
10. [Contributing](#-contributing)
11. [License](#-license)

---

## 🛠️ Installation

### Prerequisites

-   PHP >= 8.2
-   Composer
-   Node.js & NPM
-   MySQL (or Railway MySQL)
-   Cloudinary Account
-   Mapbox Account

### Quick Start

1. **Clone the repository**

    ```bash
    git clone https://github.com/yourusername/airnbn.git
    cd airnbn
    ```

2. **Install Dependencies**

    ```bash
    composer install
    npm install
    ```

3. **Environment Setup**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Configure Environment Variables**

    Edit `.env` file with your credentials:

    ```env
    # App Settings
    APP_NAME=Airnbn
    APP_ENV=local
    APP_DEBUG=true
    APP_URL=http://localhost:8000

    # Database (Railway MySQL)
    DB_CONNECTION=mysql
    DB_HOST=your-railway-host.proxy.rlwy.net
    DB_PORT=29678
    DB_DATABASE=railway
    DB_USERNAME=root
    DB_PASSWORD=your-password

    # Cloudinary
    CLOUDINARY_CLOUD_NAME=your-cloud-name
    CLOUDINARY_API_KEY=your-api-key
    CLOUDINARY_API_SECRET=your-api-secret

    # Mapbox
    MAPBOX_ACCESS_TOKEN=your-mapbox-token
    ```

5. **Run Migrations & Seed Database**

    ```bash
    php artisan migrate
    php artisan db:seed
    ```

6. **Build Assets**

    ```bash
    npm run build
    ```

7. **Start Development Server**

    ```bash
    php artisan serve
    ```

    Visit: `http://localhost:8000`

### Default Login Credentials (After Seeding)

**Host Account:**

-   Email: `karim@example.com`
-   Password: `12345678`

**Guest Account:**

-   Email: `fatema@example.com`
-   Password: `12345678`

---

## ⚙️ Configuration

### Cloudinary Setup

1. Sign up at [Cloudinary](https://cloudinary.com)
2. Get your Cloud Name, API Key, and API Secret from Dashboard
3. Add to `.env` file

### Mapbox Setup

1. Sign up at [Mapbox](https://mapbox.com)
2. Create an access token
3. Add to `.env` as `MAPBOX_ACCESS_TOKEN`

### Railway MySQL Setup

1. Create a MySQL database on [Railway](https://railway.app)
2. Copy connection details from Variables tab
3. Use `MYSQL_PUBLIC_URL` to extract host, port, and credentials
4. Update `.env` file

---

## 🗄️ Database Setup

### Using Railway (Production)

```bash
# Already configured in .env with Railway credentials
php artisan migrate --force
php artisan db:seed
```

### Using Local MySQL (Development)

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=airnbn
DB_USERNAME=root
DB_PASSWORD=
```

---

## 📁 Project Structure

### Overview

```
Airnbn/
├── app/
│   ├── Http/
│   │   ├── Controllers/      # Business logic
│   │   ├── Middleware/       # Request filtering
│   │   └── Requests/         # Form validation
│   ├── Models/               # Eloquent models
│   └── Services/             # External API services
├── database/
│   ├── migrations/           # Database schema
│   ├── seeders/              # Sample data
│   └── factories/            # Model factories
├── public/
│   ├── css/                  # Stylesheets
│   └── js/                   # JavaScript files
├── resources/
│   └── views/                # Blade templates
├── routes/
│   └── web.php               # Application routes
└── config/                   # Configuration files
```

---

## 1. Database Migrations, Factories, and Seeders

### Migrations

The project uses several migrations to set up the database schema:

-   **0001_01_01_000000_create_users_table.php**: Creates the `users` table with fields like `username`, `email`, `password`, `role` (guest/host).
-   **0001_01_01_000001_create_cache_table.php**: Creates cache table for Laravel caching.
-   **0001_01_01_000002_create_jobs_table.php**: Creates jobs table for background processing.
-   **2025_10_10_074319_create_listings_table.php**: Creates the `listings` table with fields like `title`, `description`, `image_url`, `price`, `location`, `country`, `geometry_type`, `geometry_coordinates`, `trending_points`, `listing_type_1/2/3`, `owner_id`.
-   **2025_10_10_074325_create_reviews_table.php**: Creates the `reviews` table with `comment`, `rating`, `author_id`, `listing_id`.
-   **2025_10_10_112754_add_multiple_listing_types_to_listings_table.php**: Adds multiple listing type columns.
-   **2025_10_10_120000_add_trending_and_type_to_listings_table.php**: Adds trending points and type fields.
-   **2025_10_17_105436_add_role_to_users_table.php**: Adds role column to users.
-   **2025_10_17_105453_create_bookings_table.php**: Creates `bookings` table with `listing_id`, `user_id`, `persons`, `check_in_date`, `check_out_date`, `status`, `special_requests`.
-   **2025_10_17_110439_update_existing_users_roles.php**: Updates existing users with roles.
-   **2025_10_17_111245_drop_unused_listing_type_column.php**: Cleans up unused columns.
-   **2025_10_17_112540_redistribute_listings_among_hosts.php**: Redistributes listings to hosts.

### Factories

-   **UserFactory.php**: Generates fake users with `name`, `email`, `password`, etc. Used for testing and seeding.

### Seeders

-   **DatabaseSeeder.php**: Calls `UserSeeder` and `ListingSeeder`.
-   **UserSeeder.php**: Creates 6 host users and 3 guest users with Bangladeshi names and default passwords.
-   **ListingSeeder.php**: Seeds 28 sample listings with geocoding using Mapbox. Distributes listings among hosts round-robin. Each listing includes title, description, image, price, location, country, types, and trending points.

## 2. Controllers and Their Functions

### AuthController

Handles user authentication:

-   `showSignupForm()`: Displays signup form.
-   `signup(Request $request)`: Validates and creates new user, auto-logs in.
-   `showLoginForm()`: Displays login form.
-   `login(Request $request)`: Authenticates user, redirects to intended URL.
-   `logout()`: Logs out user.

### ListingController

Manages listings:

-   `index(Request $request)`: Shows all listings, handles search and filtering by type/trending.
-   `create()`: Shows create listing form.
-   `store(StoreListingRequest $request)`: Validates, geocodes location, uploads image to Cloudinary, saves listing.
-   `show($id)`: Displays single listing with reviews.
-   `edit($id)`: Shows edit form.
-   `update(Request $request, $id)`: Updates listing with new data/image.
-   `destroy($id)`: Deletes listing and associated image.

### BookingController

Handles bookings:

-   `create(Listing $listing)`: Shows booking form for guests.
-   `store(Request $request, Listing $listing)`: Creates new booking.
-   `myBookings()`: Shows guest's bookings.
-   `cancel(Booking $booking)`: Cancels booking (guest).
-   `hostDashboard()`: Shows host's dashboard with listings and bookings.
-   `confirm(Booking $booking)`: Confirms booking (host).
-   `reject(Booking $booking)`: Rejects booking (host).

### ReviewController

Manages reviews:

-   `store(StoreReviewRequest $request, $listingId)`: Creates new review for listing.
-   `destroy($listingId, $reviewId)`: Deletes review.

## 3. Middlewares

### EnsureListingOwner

Checks if authenticated user owns the listing. Used on edit/update/delete routes.

### EnsureReviewAuthor

Checks if authenticated user is the author of the review. Used on delete review route.

### SaveIntendedUrl

Saves the intended URL in session for redirect after login.

## 4. Models

### User

-   Relationships: `listings()` (hasMany), `bookings()` (hasMany), `reviews()` (hasMany).
-   Methods: `isHost()`, `isGuest()`, `hasActiveBooking()`, `canCreateListing()`, `pendingBookings()`.

### Listing

-   Relationships: `owner()` (belongsTo User), `reviews()` (hasMany), `bookings()` (hasMany).
-   Booted method: Deletes Cloudinary image on delete.

### Booking

-   Relationships: `listing()` (belongsTo), `user()` (belongsTo).
-   Methods: `isPending()`.

### Review

-   Relationships: `author()` (belongsTo User), `listing()` (belongsTo).

## 5. Mapbox Services

### MapboxGeocodingService

-   `__construct()`: Initializes Guzzle client and access token from config.
-   `forwardGeocode(string $query, int $limit = 1)`: Converts location query to coordinates using Mapbox API. Returns geometry array with type and coordinates. Handles errors with fallback [0,0].

Used in ListingController for geocoding locations during creation/update, and in ListingSeeder for seeding.

## 6. Routes, Views, JS, and CSS

### Routes (web.php)

-   **Root**: `GET /` -> `listings.index`
-   **Listings**: CRUD routes for listings, with auth middleware on create/store/edit/update/delete.
-   **Reviews**: POST `/listings/{id}/reviews` (store), DELETE `/listings/{id}/reviews/{reviewId}` (destroy), with auth.
-   **Auth**: GET/POST `/signup`, GET/POST `/login`, GET `/logout`.
-   **Bookings**: Guest routes (create, store, show, my-bookings, cancel), Host routes (host-dashboard, confirm, reject), all with auth.

### Views

-   **layouts/app.blade.php**: Main layout with navbar, content yield, footer.
-   **includes/navbar.blade.php**: Navigation bar with search, dark mode toggle, auth links.
-   **includes/footer.blade.php**: Footer with links, socials, developer credit.
-   **includes/floatingFlash.blade.php**: Flash messages.
-   **welcome.blade.php**: Welcome page (unused?).
-   **listings/index.blade.php**: Listings grid with search/filter.
-   **listings/show.blade.php**: Single listing with reviews/booking.
-   **listings/create.blade.php**: Create listing form.
-   **listings/edit.blade.php**: Edit listing form.
-   **bookings/create.blade.php**: Booking form.
-   **bookings/show.blade.php**: Booking details.
-   **bookings/my-bookings.blade.php**: Guest's bookings.
-   **bookings/host-dashboard.blade.php**: Host dashboard.
-   **auth/login.blade.php**: Login form.
-   **auth/signup.blade.php**: Signup form.

### JS

-   **public/js/script.js**: General scripts, possibly form handling.
-   **public/js/map.js**: Map integration (likely for listings).
-   **resources/js/app.js**: Main app JS.
-   **resources/js/bootstrap.js**: Bootstrap JS setup.

### CSS

-   **public/css/common.css**: Core styles for all pages (navbar, buttons, etc.).
-   **public/css/index.css**: Styles for listings index.
-   **public/css/show.css**: Styles for listing show page.
-   **public/css/forms.css**: Styles for forms.
-   **public/css/bookings.css**: Styles for booking pages.
-   **public/css/footer.css**: Footer styles.
-   **public/css/reviewStar.css**: Review star ratings.
-   **public/css/style.css**: Additional styles.
-   **resources/css/app.css**: Main app CSS.

Dark mode is implemented via body class toggle, with styles in common.css and others.

---

## 7. Necessary Artisan Commands

### Development Commands

```bash
# Database
php artisan migrate              # Run migrations
php artisan db:seed             # Seed database
php artisan migrate:fresh --seed # Reset and seed database

# Server
php artisan serve               # Start development server
php artisan tinker              # Interactive shell

# Code Generation
php artisan make:model ModelName
php artisan make:controller ControllerName
php artisan make:migration migration_name
php artisan make:seeder SeederName
php artisan make:middleware MiddlewareName
php artisan make:request RequestName

# Utilities
php artisan route:list          # List all routes
php artisan config:clear        # Clear config cache
php artisan cache:clear         # Clear application cache
```

### Production Commands

```bash
php artisan config:cache        # Cache configuration
php artisan route:cache         # Cache routes
php artisan view:cache          # Cache views
php artisan optimize            # Optimize application
php artisan migrate --force     # Run migrations in production
```

---

## 🚀 Deployment

### Deploying to Railway

1. **Push to GitHub**

    ```bash
    git init
    git add .
    git commit -m "Initial commit"
    git remote add origin https://github.com/yourusername/airnbn.git
    git push -u origin main
    ```

2. **Create Railway Project**

    - Go to [Railway](https://railway.app)
    - Click "New Project" → "Deploy from GitHub"
    - Select your repository

3. **Add MySQL Database**

    - In Railway dashboard, click "New" → "Database" → "MySQL"
    - Copy `MYSQL_PUBLIC_URL` from Variables tab

4. **Configure Environment Variables**

    In Railway project settings, add these variables:

    ```env
    APP_NAME=Airnbn
    APP_ENV=production
    APP_KEY=base64:your-key-here
    APP_DEBUG=false
    APP_URL=https://your-app.railway.app

    # Database (auto-configured by Railway)
    DB_CONNECTION=mysql

    # Cloudinary
    CLOUDINARY_CLOUD_NAME=your-cloud-name
    CLOUDINARY_API_KEY=your-api-key
    CLOUDINARY_API_SECRET=your-api-secret

    # Mapbox
    MAPBOX_ACCESS_TOKEN=your-mapbox-token

    # Session & Cache
    SESSION_DRIVER=database
    CACHE_DRIVER=database
    ```

5. **Configure Build & Start Commands**

    **Build Command:**

    ```bash
    composer install --optimize-autoloader --no-dev && php artisan config:cache && php artisan route:cache && php artisan view:cache && npm install && npm run build
    ```

    **Start Command:**

    ```bash
    php artisan migrate --force && php artisan db:seed && php artisan serve --host=0.0.0.0 --port=$PORT
    ```

6. **Deploy**
    - Railway will automatically deploy
    - Visit your deployed URL
    - Done! 🎉

### Alternative: Deploying to Render

Similar process to Railway:

1. Create Web Service from GitHub
2. Set build command and start command
3. Add environment variables
4. Connect to external MySQL database

---

## 🤝 Contributing

Contributions are welcome! Here's how you can help:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

---

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

## 👨‍💻 Author

**Your Name**

-   GitHub: [@niloy2107028](https://github.com/niloy2107028)
-   Email: shoaibhasan600@gmail.com

---

`

## 🙏 Acknowledgments

-   [Laravel](https://laravel.com) - The PHP Framework
-   [Cloudinary](https://cloudinary.com) - Cloud Image Storage
-   [Mapbox](https://mapbox.com) - Mapping & Geocoding
-   [Railway](https://railway.app) - Cloud Database & Hosting
-   Inspired by [Airbnb](https://airbnb.com)

---

<div align="center">

**⭐ Star this repo if you find it helpful!**

Made with ❤️ by Sohaib Hasan Niloy

</div>
