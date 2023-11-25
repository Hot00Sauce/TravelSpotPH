<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="css/siargao.css">
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
    <img src="img/siargao.jpg" alt="birds eye view picture of an island in Siargao, with many boats">
    <div class="content">
    <h2>Siargao</h2>
    <p>Siargao is a tear-drop shaped island in the Philippine Sea situated 196 kilometers southeast of Tacloban. It has a land area of approximately 437 square kilometres. The east coast is relatively straight with one deep inlet, Port Pilar. <br>It is the largest province in the country in terms of total area of 14,649.73 km². <br>The capital city is Puerto Princesa.</p>
    </div>
 </div>

 <div class="explore">
    <h2 class="titleq" >What to explore in Siargao?</h2>
    <img class="img1" src="img/cloud9siargao.jpg" alt="">
    <div class="textBox">
    <h2>Cloud 9 Surfing Area</h2>
    <p>Surfing in Cloud 9 is a remarkable and stunning experience. The best months to hit the waves occur between September and March. Cloud 9 offers a thick and hollow barreling left/right-hander ride and was discovered by the American photographer John S. Callahan in the late 1980s. The reef break delivers perfect waves with offshore SW winds, NE swell, and around high tide when the tide is rising. Make sure to protect your head with a surf helmet and prepare for more or less serious wipeouts if you're a beginner. Although it can get a bit crowded, the famous wave can be surfed without boat support.</p>
    </div>
    <img class="img2" src="img/guyamislandsiargao.jpg" alt="">
    <div class="textBox">
    <h2>Guyam Island</h2>
    <p>Guyam Island is an idyllic destination; its picture-perfect beachscape is characterized by emerald glass-like waters that are shallow enough to walk on during low tide and a small patch of cream-colored sand mixed with rocks/rock formations. Swim in its cool waters to douse the heat and relax and laze on the soft sand.</p>
    </div>
    <img class="img3" src="img/dakuislandsiargao.jpg" alt="">
    <div class="textBox">
    <h2>Daku Island</h2>
    <p>The charming Daku Island is a must-see during your trip to Siargao. With white sand, lush palm trees, and sparkling blue water, Daku Island is the definition of a tropical paradise. Its also one of the only remote islands inhabited by a few families, so its a great destination if you want a taste of authentic Filipino culture. Despite being home to a few residents, Daku remains relatively untouched. You can spend the afternoon splashing in the water or relaxing on the powdery-white shores of the beach. It’s also one of the few places around Siargao with giant waves – perfect for boogie boarding or surfing!</p>
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
