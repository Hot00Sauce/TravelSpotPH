<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="css/baguio.css">
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
    <img src="img/baguio.jpg" alt="beautiful image of Palawan">
    <div class="content">
    <h2>Baguio</h2>
    <p>Baguio, on the Philippines’ Luzon island, is a mountain town of universities and resorts. Called the “City of Pines,” it’s particularly popular in summer due to unusually cooler weather. At its center is Burnham Park, with gardens and a lake. Nearby, Baguio Cathedral, completed in 1936, has a rose-hued exterior. The main thoroughfare is Session Road, lined with shops, restaurants and entertainment options.<br>It is the largest province in the country in terms of total area of 14,649.73 km². <br>The capital city is Puerto Princesa.</p>
    </div>
 </div>

 <div class="explore">
    <h2 class="titleq" >What to explore in Baguio?</h2>
    <img class="img1" src="img/burnhamparkbag.jpg" alt="">
    <div class="textBox">
    <h2>Burnham Park</h2>
    <p>Located along Jose Abad Santos Drive in the heart of Baguio City, Burnham Park offers a refreshing escape from city life. Inside this 32-hectare park, you'll find different clusters that consist of various attractions like a children's playground, a rose garden, an orchidarium, a picnic grove, and a traditional Igorot garden. Its main highlight, however, is a man-made lake in the center of the park. A visit here is not complete without riding a boat across the lake for a relaxing morning or afternoon amongst the trees. If you can, it is recommended to rent one of the swan boats here as well for a more memorable experience. </p>
    </div>
    <img class="img2" src="img/minesviewparkbag.jpg" alt="">
    <div class="textBox">
    <h2>Mines View Park</h2>
    <p>Mines View Park is one of the famous tourist spots across Baguio pack with shops selling snacks, trinkets, botanical items, and others. Picture taking services with traditional Igorot clothes, horses, dogs and more are also available towards the lower half of the park. While in the edge of the Mines View Park lies a scenic view of mountains and forest, it also overlooked Itogon’s abandoned mines which are also known as Balatoc Mines. Due to its view, the observation deck of Mines View Park became a popular destination to take photos of Baguio’s scenery. This spot in the park also provides an open hut inclusive of chairs, to give shade and a resting area for visitors.</p>
    </div>
    <img class="img3" src="img/tam-awanvillagebag.jpg" alt="">
    <div class="textBox">
    <h2>Tam-awan Village</h2>
    <p>Tam-awan village offers a space for the local culture and arts to thrive by showcasing Ifugao and Kalinga huts and exhibits hosted by the artists of Baguio City. This tourist attraction in Baguio City is arguably the opposite of the city proper where the Western influences from the American occupation are still visible to this day. The village was founded in 1998 by the Chanum Foundation Inc., whose vision of the village is to be a venue for art and cultural activities that will raise appreciation for the Cordilleran heritage and boost the local economy. What started with three huts from Bangaan, Ifugao eventually became seven Ifugao huts and two Kalinga houses, which were reconstructed using original materials and new cogon roofs. Exhibits are constantly displayed inside the houses, with art pieces made by local artists. Cordilleran craftsmanship is highlighted by the artistry present in the village, making it accessible to the public.</p>
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
