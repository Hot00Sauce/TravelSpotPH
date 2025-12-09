# TravelSpotPH - Installation & Setup Guide

## Quick Start Guide

### Step 1: Prerequisites
Make sure you have installed:
- **XAMPP** (or WAMP/MAMP) - Includes Apache, MySQL, and PHP
- Download from: https://www.apachefriends.org/

### Step 2: Setup the Project

1. **Copy the project folder**
   - Place the `TravelSpotPH` folder in your web server directory:
     - XAMPP: `C:\xampp\htdocs\TravelSpotPH`
     - WAMP: `C:\wamp64\www\TravelSpotPH`

2. **Start XAMPP Services**
   - Open XAMPP Control Panel
   - Start **Apache** module
   - Start **MySQL** module

### Step 3: Create the Database

**Option 1: Using phpMyAdmin (Recommended)**
1. Open browser and go to: `http://localhost/phpmyadmin`
2. Click on "Import" tab
3. Choose the file: `database_setup.sql`
4. Click "Go" to execute

**Option 2: Manual Setup**
1. Open browser and go to: `http://localhost/phpmyadmin`
2. Click "SQL" tab
3. Copy and paste the contents of `database_setup.sql`
4. Click "Go"

**Option 3: Using MySQL Command Line**
```bash
cd "d:\Web Project\TravelSpotPH"
mysql -u root -p < database_setup.sql
```

### Step 4: Configure Database Connection

Edit `connection.php` if your MySQL credentials are different:

```php
$dbhost = "localhost";   // Usually localhost
$dbuser = "root";        // Your MySQL username
$dbpass = "";            // Your MySQL password (empty by default in XAMPP)
$dbname = "regtest";     // Database name
```

### Step 5: Add Images

You have two options:

**Option A: Download Real Images**
1. Open `image-guide.html` in your browser
2. Click the search links to find images on Unsplash/Pexels
3. Download and save with exact filenames shown
4. Place all images in the `img/` folder

**Option B: Use Placeholder Images**
1. Visit https://placeholder.com or https://via.placeholder.com
2. Create images with dimensions:
   - Main images: 1920x1080
   - Attraction images: 1200x800
   - Team photos: 400x400
   - Background: 1920x1200
3. Save with the required filenames in `img/` folder

### Step 6: Access the Website

1. Open your browser
2. Navigate to: `http://localhost/TravelSpotPH/home.php`
3. Explore the website!

## Testing the Application

### Create a Test Account
1. Go to: `http://localhost/TravelSpotPH/signup.php`
2. Enter a username (not numbers only)
3. Enter a password
4. Click "Signup"

### Login
1. Go to: `http://localhost/TravelSpotPH/login.php`
2. Enter your credentials
3. Click "Login"
4. You'll be redirected to `index.php` (protected page)

### Default Test Account
- Username: `testuser`
- Password: `test123`

## Project Structure

```
TravelSpotPH/
│
├── 📁 css/                    # All stylesheets
│   ├── home.css              # Homepage styles
│   ├── login.css             # Login page styles
│   ├── signup.css            # Signup page styles
│   ├── travel.css            # Travel gallery styles
│   ├── aboutus.css           # About us page styles
│   ├── palawan.css           # Palawan destination styles
│   ├── boracay.css           # Boracay destination styles
│   ├── bohol.css             # Bohol destination styles
│   ├── siargao.css           # Siargao destination styles
│   └── baguio.css            # Baguio destination styles
│
├── 📁 js/                     # JavaScript files
│   ├── home.js               # Homepage slider functionality
│   └── signuplogin.js        # Form validation
│
├── 📁 img/                    # All images (YOU NEED TO ADD THESE)
│   ├── palawan.jpg
│   ├── boracay.jpg
│   ├── bohol.jpg
│   ├── siargao.jpg
│   ├── baguio.jpg
│   ├── (and all other required images...)
│   └── See image-guide.html for complete list
│
├── 📄 home.php               # Main landing page
├── 📄 login.php              # User login
├── 📄 signup.php             # User registration
├── 📄 index.php              # Protected page (requires login)
├── 📄 logout.php             # Logout handler
├── 📄 travel.php             # Destinations gallery
├── 📄 aboutus.php            # About the team
├── 📄 palawan.php            # Palawan details
├── 📄 boracay.php            # Boracay details
├── 📄 bohol.php              # Bohol details
├── 📄 siargao.php            # Siargao details
├── 📄 baguio.php             # Baguio details
│
├── 📄 connection.php         # Database connection
├── 📄 functions.php          # Helper functions
├── 📄 database_setup.sql     # Database creation script
├── 📄 image-guide.html       # Image requirements guide
├── 📄 INSTALLATION.md        # This file
└── 📄 README.md              # Project documentation
```

## Troubleshooting

### Problem: "Failed to connect!" error
**Solution:** 
- Check if MySQL is running in XAMPP
- Verify database credentials in `connection.php`
- Make sure database `regtest` exists

### Problem: Pages show without styles
**Solution:**
- Check if CSS files exist in `css/` folder
- Clear browser cache (Ctrl + F5)
- Check browser console for errors (F12)

### Problem: Images don't show
**Solution:**
- Make sure images are in the `img/` folder
- Check exact filenames (case-sensitive)
- Verify image file extensions (.jpg not .jpeg)

### Problem: Login redirects to login.php
**Solution:**
- Make sure you're logged in
- Check if sessions are enabled in PHP
- Clear browser cookies

### Problem: "Please enter valid information"
**Solution:**
- Don't use numbers-only for username
- Make sure all fields are filled
- Username must not already exist (for signup)

## Security Notes

⚠️ **Important Security Issues to Fix for Production:**

1. **Password Hashing**
   ```php
   // Current (INSECURE):
   $password = $_POST['password'];
   
   // Should be:
   $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
   
   // For login verification:
   password_verify($_POST['password'], $user_data['password'])
   ```

2. **SQL Injection Prevention**
   ```php
   // Current (VULNERABLE):
   $query = "select * from users where user_name = '$user_name'";
   
   // Should use prepared statements:
   $stmt = $con->prepare("SELECT * FROM users WHERE user_name = ?");
   $stmt->bind_param("s", $user_name);
   $stmt->execute();
   ```

3. **Input Sanitization**
   ```php
   $user_name = mysqli_real_escape_string($con, $_POST['user_name']);
   $user_name = htmlspecialchars($user_name, ENT_QUOTES, 'UTF-8');
   ```

## Features

✅ Responsive design for all devices  
✅ Modern gradient UI with smooth animations  
✅ Image slider on homepage  
✅ User authentication system  
✅ Interactive destination galleries  
✅ Hover effects and transitions  
✅ Mobile-friendly navigation  
✅ Contact form in footer  
✅ Social media links  

## Browser Compatibility

- ✅ Chrome (Recommended)
- ✅ Firefox
- ✅ Edge
- ✅ Safari
- ✅ Opera

## Next Steps

1. Add real images to make the site come alive
2. Customize the "About Us" section with real team information
3. Update the placeholder text in footer
4. Add more destinations
5. Implement the search functionality
6. Add booking system (future enhancement)

## Support

For issues or questions:
1. Check the troubleshooting section
2. Review the README.md
3. Check PHP error logs in XAMPP

## Credits

**Design & Development:**
- Eric Cornelio
- John Rolly N. Cedillo
- Jason Clet

**Technologies:**
- HTML5, CSS3, JavaScript
- PHP 7.4+
- MySQL
- Font Awesome 6.4.0
- Google Fonts (Montserrat)

---

🎉 **Enjoy your TravelSpotPH website!**
