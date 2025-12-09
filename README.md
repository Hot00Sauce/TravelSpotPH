# TravelSpotPH

A beautiful travel website showcasing top tourist destinations in the Philippines.

## Features

- 🏝️ Beautiful responsive design with modern UI
- 🎨 Gradient color schemes and smooth animations
- 📱 Fully responsive layout for all devices
- 🔐 User authentication (Login/Signup)
- 🌟 Interactive image galleries and sliders
- 📍 Featured destinations: Palawan, Boracay, Bohol, Siargao, and Baguio

## Setup Instructions

### Prerequisites

- PHP 7.4 or higher
- MySQL/MariaDB
- Apache/Nginx web server (XAMPP, WAMP, or similar)

### Database Setup

1. Create a MySQL database named `regtest`
2. Create the users table:

```sql
CREATE DATABASE regtest;

USE regtest;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(20) NOT NULL UNIQUE,
    user_name VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Configuration

1. Update `connection.php` with your database credentials:
   - Default host: `localhost`
   - Default user: `root`
   - Default password: `` (empty)
   - Default database: `regtest`

### Images

The project requires the following images in the `img/` folder:

#### Main Destination Images:
- `palawan.jpg` - Hero image of Palawan
- `boracay.jpg` - Hero image of Boracay
- `bohol.jpg` - Hero image of Bohol
- `siargao.jpg` - Hero image of Siargao
- `baguio.jpg` - Hero image of Baguio

#### Palawan Attractions:
- `undergroundriverpal.jpg` - Underground River
- `islandhopingpal.jpg` - Island Hopping
- `safaripal.jpg` - Calauit Safari Park

#### Boracay Attractions:
- `whitebeachborac.jpg` - White Beach
- `willysrockborac.jpg` - Willy's Rock
- `ArielsPointborac.jpg` - Ariel's Point

#### Bohol Attractions:
- `chocolatehillsbohol.jpg` - Chocolate Hills
- `tarsiersbohol.jpg` - Philippine Tarsiers
- `loboccruisebohol.jpg` - Loboc River Cruise

#### Siargao Attractions:
- `cloud9siargao.jpg` - Cloud 9 Surfing Area
- `guyamislandsiargao.jpg` - Guyam Island
- `dakuislandsiargao.jpg` - Daku Island

#### Baguio Attractions:
- `burnhamparkbag.jpg` - Burnham Park
- `minesviewparkbag.jpg` - Mines View Park
- `tam-awanvillagebag.jpg` - Tam-awan Village

#### Team Members:
- `Cornelio.jpg` - Eric Cornelio
- `Cedillo.jpg` - John Rolly Cedillo
- `Clet.jpg` - Jason Clet

#### Background:
- `BGLS.jpg` - Login/Signup background image

**Note:** Add your own images to the `img/` folder or use placeholder images from free stock photo sites like Unsplash or Pexels.

## File Structure

```
TravelSpotPH/
├── css/
│   ├── home.css
│   ├── login.css
│   ├── signup.css
│   ├── travel.css
│   ├── aboutus.css
│   ├── palawan.css
│   ├── boracay.css
│   ├── bohol.css
│   ├── siargao.css
│   └── baguio.css
├── js/
│   ├── home.js
│   └── signuplogin.js
├── img/
│   └── (all images here)
├── home.php (Main landing page)
├── login.php (User login)
├── signup.php (User registration)
├── travel.php (Destinations gallery)
├── aboutus.php (About the team)
├── palawan.php (Palawan details)
├── boracay.php (Boracay details)
├── bohol.php (Bohol details)
├── siargao.php (Siargao details)
├── baguio.php (Baguio details)
├── index.php (Protected page)
├── logout.php (Logout handler)
├── connection.php (Database connection)
├── functions.php (Helper functions)
└── README.md
```

## Usage

1. Start your web server (Apache/Nginx)
2. Start MySQL server
3. Navigate to `http://localhost/TravelSpotPH/home.php`
4. Create an account via the signup page
5. Login and explore the destinations!

## Pages

- **Home** - Landing page with image slider of destinations
- **Travel** - Grid view of all featured destinations
- **About Us** - Meet the development team
- **Destination Pages** - Detailed information about each location
- **Login/Signup** - User authentication

## Technologies Used

- **Frontend:** HTML5, CSS3, JavaScript
- **Backend:** PHP
- **Database:** MySQL
- **Fonts:** Google Fonts (Montserrat)
- **Icons:** Font Awesome 6.4.0

## Security Note

⚠️ **Important:** This is a basic implementation for educational purposes. For production use:
- Hash passwords using `password_hash()` instead of storing plain text
- Use prepared statements to prevent SQL injection
- Implement CSRF protection
- Add input validation and sanitization
- Use HTTPS for secure connections

## License

This project is for educational purposes.

## Credits

Developed by:
- Eric Cornelio
- John Rolly N. Cedillo
- Jason Clet