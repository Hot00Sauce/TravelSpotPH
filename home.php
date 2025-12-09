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
  <title>Travel Spot</title>
  <link rel="stylesheet" href="css/home.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <script src="js/home.js" defer></script>
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
            <li><a href="signup.php">Log in / Sign up</a></li>
          <?php endif; ?>
        </ul>
      </nav>
    </header>
  </div>

  <div class="slideshow-container">

    <div class="mySlides fade">
    <a href="palawan.php"><img src="img/palawan.jpg" style="width:100%" href=""></a>
      <div class="text">Palawan</div>
    </div>

    <div class="mySlides fade">
    <a href="boracay.php"><img src="img/boracay.jpg" style="width:100%" href=""></a>
      <div class="text">Boracay</div>
    </div>

    <div class="mySlides fade">
    <a href="bohol.php"><img src="img/bohol.jpg" style="width:100%" href=""></a>
      <div class="text">Bohol</div>
    </div>

    <div class="mySlides fade">
    <a href="siargao.php"><img src="img/siargao.jpg" style="width:100%" href=""></a>
      <div class="text">Siargao</div>
    </div>

    <div class="mySlides fade">
    <a href="baguio.php"><img src="img/baguio.jpg" style="width:100%" href=""></a>
      <div class="text">Baguio</div>
    </div>

    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlide(1)">❯</a>

    <!-- Position the dot container at the bottom center -->
    <div class="dot-container" style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span>
      <span class="dot" onclick="currentSlide(2)"></span>
      <span class="dot" onclick="currentSlide(3)"></span>
      <span class="dot" onclick="currentSlide(4)"></span>
      <span class="dot" onclick="currentSlide(5)"></span>
    </div>

  </div>

  <?php
  // Define all attractions from each destination
  $attractions = array(
    // Palawan attractions
    array(
      'name' => 'Underground River',
      'destination' => 'Palawan',
      'image' => 'img/undergroundriverpal.jpg',
      'description' => 'The Puerto Princesa Subterranean River National Park is a stunning natural wonder and UNESCO World Heritage Site. This underground river features a spectacular limestone karst mountain landscape with an 8.2 km navigable river.',
      'link' => 'palawan.php'
    ),
    array(
      'name' => 'Island Hopping',
      'destination' => 'Palawan',
      'image' => 'img/islandhopingpal.jpg',
      'description' => 'Experience the best of Palawan through island hopping tours. Discover scenic green islands, crystal-clear waters, and pristine white beaches in El Nido, Coron, Puerto Princesa, and San Vicente.',
      'link' => 'palawan.php'
    ),
    array(
      'name' => 'Calauit Safari Park',
      'destination' => 'Palawan',
      'image' => 'img/safaripal.jpg',
      'description' => 'A unique wildlife sanctuary featuring African and endemic animals. Home to giraffes, zebras, and various Philippine wildlife species in their natural habitat.',
      'link' => 'palawan.php'
    ),
    
    // Boracay attractions
    array(
      'name' => 'White Beach',
      'destination' => 'Boracay',
      'image' => 'img/whitebeachbor.jpg',
      'description' => 'The world-famous White Beach is Boracay\'s main attraction, featuring powdery white sand and crystal-clear turquoise waters stretching over 4 kilometers. Perfect for swimming, sunbathing, and water sports.',
      'link' => 'boracay.php'
    ),
    array(
      'name' => 'Bulabog Beach',
      'destination' => 'Boracay',
      'image' => 'img/bulabogbeachbor.jpg',
      'description' => 'Known as the kiteboarding capital of Asia, Bulabog Beach offers strong winds perfect for windsurfing and kitesurfing. A paradise for water sports enthusiasts.',
      'link' => 'boracay.php'
    ),
    array(
      'name' => 'Ariel\'s Point',
      'destination' => 'Boracay',
      'image' => 'img/arielspointbor.jpg',
      'description' => 'One of the world\'s top cliff diving destinations with platforms ranging from 3 to 15 meters high. Enjoy unlimited drinks, kayaking, snorkeling, and a buffet lunch in this tropical paradise.',
      'link' => 'boracay.php'
    ),
    
    // Bohol attractions
    array(
      'name' => 'Chocolate Hills',
      'destination' => 'Bohol',
      'image' => 'img/chocolatehillsboh.jpg',
      'description' => 'Bohol\'s most iconic geological wonder featuring over 1,200 conical hills that turn chocolate brown during dry season. A breathtaking natural phenomenon that graces the PHP200 bill.',
      'link' => 'bohol.php'
    ),
    array(
      'name' => 'Philippine Tarsiers',
      'destination' => 'Bohol',
      'image' => 'img/tarsiersboh.jpg',
      'description' => 'Meet the world\'s smallest primates at the Tarsier Sanctuary. These adorable nocturnal creatures with huge eyes are one of the Philippines\' most treasured endemic species.',
      'link' => 'bohol.php'
    ),
    array(
      'name' => 'Loboc River Cruise',
      'destination' => 'Bohol',
      'image' => 'img/lobocriverboh.jpg',
      'description' => 'Experience a floating restaurant cruise along the scenic Loboc River. Enjoy a buffet of Filipino dishes while being serenaded by local musicians and dancers in traditional attire.',
      'link' => 'bohol.php'
    ),
    
    // Siargao attractions
    array(
      'name' => 'Cloud 9',
      'destination' => 'Siargao',
      'image' => 'img/cloudninesiar.jpg',
      'description' => 'The legendary surf break that put Siargao on the map. Cloud 9 offers world-class barreling waves perfect for experienced surfers, especially from September to March.',
      'link' => 'siargao.php'
    ),
    array(
      'name' => 'Naked Island',
      'destination' => 'Siargao',
      'image' => 'img/nakedislandsia.jpg',
      'description' => 'A stunning sandbar with no trees or structures, just pure white sand surrounded by crystal-clear turquoise waters. Perfect for swimming and sunbathing in paradise.',
      'link' => 'siargao.php'
    ),
    array(
      'name' => 'Sugba Lagoon',
      'destination' => 'Siargao',
      'image' => 'img/sugbalagoonsia.jpg',
      'description' => 'A hidden gem with pristine waters surrounded by lush mangroves and limestone cliffs. Enjoy kayaking, paddleboarding, and cliff jumping in this secluded paradise.',
      'link' => 'siargao.php'
    ),
    
    // Baguio attractions
    array(
      'name' => 'Burnham Park',
      'destination' => 'Baguio',
      'image' => 'img/burnampark.jpg',
      'description' => 'A 32-hectare urban park in the heart of Baguio featuring a man-made lake, rose garden, orchidarium, and picnic areas. Rent a swan boat for a relaxing afternoon amongst the trees.',
      'link' => 'baguio.php'
    ),
    array(
      'name' => 'Mines View Park',
      'destination' => 'Baguio',
      'image' => 'img/mineviewpark.jpg',
      'description' => 'Offers breathtaking panoramic views of mountains, forests, and the abandoned Balatoc Mines. Shop for local trinkets and take photos in traditional Igorot attire.',
      'link' => 'baguio.php'
    ),
    array(
      'name' => 'Strawberry Farm',
      'destination' => 'Baguio',
      'image' => 'img/strawberryfarm.jpg',
      'description' => 'Pick your own fresh strawberries at the famous La Trinidad Strawberry Farm. Enjoy the cool mountain air and taste the sweetest strawberries straight from the farm.',
      'link' => 'baguio.php'
    )
  );
  
  // Shuffle and get random 5 attractions
  shuffle($attractions);
  $random_attractions = array_slice($attractions, 0, 5);
  ?>

  <!-- Featured Attractions Section -->
  <div class="featured-attractions">
    <h2 class="section-title">Discover Amazing Attractions</h2>
    <p class="section-subtitle">Explore these handpicked destinations from across the Philippines</p>
    
    <div class="attractions-grid">
      <?php foreach($random_attractions as $attraction): ?>
        <div class="attraction-card">
          <a href="<?php echo $attraction['link']; ?>" class="attraction-link">
            <div class="attraction-image">
              <img src="<?php echo $attraction['image']; ?>" alt="<?php echo htmlspecialchars($attraction['name']); ?>">
              <div class="destination-badge"><?php echo htmlspecialchars($attraction['destination']); ?></div>
            </div>
            <div class="attraction-content">
              <h3><?php echo htmlspecialchars($attraction['name']); ?></h3>
              <p><?php echo htmlspecialchars($attraction['description']); ?></p>
              <span class="read-more">Learn More <i class="fas fa-arrow-right"></i></span>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
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