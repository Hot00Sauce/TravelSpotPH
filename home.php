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
        <form class="searchbox">
          <input type="text" placeholder="Search" name="search">
          <button type="submit"> <i class="fa fa-search" alt="Search"></i></button>
        </form>
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="travel.php">Travel</a></li>
          <li><a href="aboutus.php">About us</a></li>
          <li><a href="signup.php">Log in / Sign up</a></li>
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
    <a class="next" onclick="plusSlides(1)">❯</a>

    <!-- Position the dot container at the bottom center -->
    <div class="dot-container" style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span>
      <span class="dot" onclick="currentSlide(2)"></span>
      <span class="dot" onclick="currentSlide(3)"></span>
      <span class="dot" onclick="currentSlide(4)"></span>
      <span class="dot" onclick="currentSlide(5)"></span>
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
          <p>exanv bjshvvflvbnhvbwehvkn DJKS dmv,lm sklnvkjvkwlkdvkbkn VKSJdn vkh K chjsdb hksvjnks kh k.</p>
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