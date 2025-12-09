<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = null;
$is_logged_in = false;

if(isset($_SESSION['user_id']))
{
    $user_data = check_login($con);
    if($user_data !== false)
    {
        $is_logged_in = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="css/aboutus.css">
        <!--Google fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>
<!--Header-->
<div class="header">
    <header>
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn"> 
                <i class="fas fa-bars"></i>
            </label>
            <label class="logo">TravelSpot PH</label>
            <form class="searchbox" method="GET" action="search.php">
                <input type="text" placeholder="Search" name="search">
                <button type="submit"> <i class="fa fa-search" alt="Search"></i></button>
            </form>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="travel.php">Travel</a></li>
                <li><a href="aboutus.php">About us</a></li>
                <?php if($is_logged_in): ?>
                    <li class="profile-dropdown">
                        <a href="#" class="profile-link">
                            <i class="fas fa-user-circle"></i> <?php echo htmlspecialchars($user_data['user_name']); ?>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a href="profile.php"><i class="fas fa-user"></i> My Profile</a>
                            <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </div>
                    </li>
                <?php else: ?>
                    <li><a href="signup.php">Log in/Sign up</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
 </div>

 <!--content-->
 <div class="aboutus">
 <div class="about-section">
  <h1>About Us Page</h1>
  <p>Welcome to TravelSpot PH, your ultimate guide to discovering the breathtaking beauty and hidden gems of the Philippines. We are passionate travelers and locals dedicated to showcasing the most stunning destinations across our beloved archipelago.</p>
  <p>Our mission is to inspire and empower travelers to explore the diverse landscapes, rich culture, and warm hospitality that the Philippines has to offer. From pristine beaches and crystal-clear waters to majestic mountains and vibrant cities, we provide comprehensive guides, insider tips, and carefully curated information to help you create unforgettable memories in paradise.</p>
</div>

<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="img/Cornelio.jpg" alt="Eric" style="width:100%">
      <div class="container">
        <h2>Eric Cornelio</h2>
        <p class="title">Designer</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>ericcornelio@example.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="img/Cedillo.jpg" alt="John Rolly" style="width:100%">
      <div class="container">
        <h2>John Rolly N. Cedillo</h2>
        <p class="title">Developer</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>johnrollycedillo0@example.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="img/Clet.jpg" alt="Clet" style="width:100%">
      <div class="container">
        <h2>jason Clet</h2>
        <p class="title">Designer</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>jasonclet@example.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
</div> 
</div>

<!--Footer of the website-->
<footer>
    <!--The left spart of the footer (About us)-->
    <div class="primaryContent">
      <div class="left area">
        <div class="AboutUs">
          <h3>About Us</h3>
        </div>
        <div class="content">
          <p>TravelSpot PH is your trusted companion for exploring the Philippines' most beautiful destinations. We provide comprehensive travel guides and insider tips to help you discover the best of what our islands have to offer.</p>
          <div class="social">
            <a href="https://www.facebook.com/"><span class="fab fa-facebook"></span></a>
            <a href="https://www.instagram.com/?hl=en"><span class="fab fa-instagram"></span></a>
            <a href="https://twitter.com/"><span class="fab fa-twitter"></span></a>
            <a href="https://www.youtube.com/"><span class="fab fa-youtube"></span></a>
          </div>
        </div>
      </div>
      <!--This is the center part of the footer (Address)-->
      <div class="center area">
        <h3>Address</h3>
        <div class="content">
          <div class="place">
            <span class="fas fa-map-marker-alt"></span>
            <span class="Atext">Muntinlupa City, Metro Manila</span>
          </div>
          <div class="number">
            <span class="fas fa-phone-alt"></span>
            <span class="Atext">09572423121</span>
          </div>
          <div class="email">
            <span class="fas fa-envelope"></span>
            <span class="Atext">TravelSpotPH@gmail.com</span>
          </div>
        </div>
      </div>

      <!--The right part of the footer (Contact Us)-->
      <div class="right area">
        <h3>Contact Us</h3>
        <div class="content">
          <form action="#">
            <div class="email">
              <div class="Atext">Email*</div>
              <input type="email" required>
            </div>
            <div class="message">
              <div class="Atext">Message*</div>
              <textarea cols="25" rows="2" required></textarea>
            </div>
            <div class="btn">
              <button type="submit">Send</button>
            </div>
        </div>
        </form>
      </div>
    </div>
    <!--The credits-->
    <div class="bottom">
      <center>
        <span class="title"><a href="#">TravelSpotPH</a> | </span>
        <span class="far fa-copyright"></span><span> 2023 All rights reserved.</span>
      </center>
    </div>
  </footer>

</body>
</html>