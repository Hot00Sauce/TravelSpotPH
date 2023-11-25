<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="css/palawan.css">
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
                <li><a href="signup.php">Log in/Sign up</a></li>
            </ul>
        </nav>
    </header>
 </div>

 <!--content-->
 <div class="palawanImg">
    <img src="img/palawan.jpg" alt="beautiful image of Palawan">
    <div class="content">
    <h2>Palawan</h2>
    <p>Palawan, officially the Province of Palawan, <br>is an archipelagic province of the Philippines that is located in the region of Mimaropa. <br>It is the largest province in the country in terms of total area of 14,649.73 km². <br>The capital city is Puerto Princesa.</p>
    </div>
 </div>

 <div class="explore">
    <h2 class="titleq" >What to explore in Palawan?</h2>
    <img class="img1" src="img/undergroundriverpal.jpg" alt="">
    <div class="textBox">
    <h2>Underground River</h2>
    <p>Calauit Island is an island of the Calamian Archipelago, just off the north-western coast of Busuanga Island. It is part of the municipality of Busuanga in the province of Palawan, Philippines. The entire island was declared as a wildlife sanctuary and game preserve in 1977, now is a tourist attraction known as Calauit Safari Park.</p>
    </div>
    <img class="img2" src="img/islandhopingpal.jpg" alt="">
    <div class="textBox">
    <h2>Island Hoping</h2>
    <p>The best way to experience Palawan is by joining island hopping tours. Palawan is home to a seemingly endless amount of scenic green islands, clear waters and beautiful white beaches. Hop on these tours and see the stunning islands of El Nido, Coron, Puerto Princesa, and San Vicente/Port Barton.</p>
    </div>
    <img class="img3" src="img/safaripal.jpg" alt="">
    <div class="textBox">
    <h2>Calauit Safari Park</h2>
    <p>Calauit Safari Park is a wildlife sanctuary in the Philippines which was originally created in 1976 as a game reserve featuring large African mammals, translocated there under the orders of the President Ferdinand Marcos during his 21-year rule of the country.</p>
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

</body>
</html>
