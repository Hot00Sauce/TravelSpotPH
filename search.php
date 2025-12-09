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

$search_query = "";
$search_results = array();

if(isset($_GET['search']) && !empty($_GET['search']))
{
    $search_query = $_GET['search'];
    
    // Define all destinations with their keywords
    $destinations = array(
        array(
            'name' => 'Palawan',
            'url' => 'palawan.php',
            'image' => 'img/palawan.jpg',
            'description' => 'Known for its stunning beaches, underground river, and island hopping adventures.',
            'keywords' => array('palawan', 'underground river', 'el nido', 'coron', 'beach', 'island', 'island hopping', 'diving', 'snorkeling', 'lagoon', 'limestone')
        ),
        array(
            'name' => 'Boracay',
            'url' => 'boracay.php',
            'image' => 'img/boracay.jpg',
            'description' => 'Famous for its white sand beaches, crystal clear waters, and vibrant nightlife.',
            'keywords' => array('boracay', 'white beach', 'white sand', 'beach', 'paradise', 'swimming', 'sunset', 'party', 'nightlife', 'water sports', 'willys rock', 'ariels point')
        ),
        array(
            'name' => 'Bohol',
            'url' => 'bohol.php',
            'image' => 'img/bohol.jpg',
            'description' => 'Home to the famous Chocolate Hills, tarsiers, and beautiful river cruises.',
            'keywords' => array('bohol', 'chocolate hills', 'tarsier', 'loboc river', 'river cruise', 'hills', 'nature', 'wildlife', 'panglao', 'beach')
        ),
        array(
            'name' => 'Siargao',
            'url' => 'siargao.php',
            'image' => 'img/siargao.jpg',
            'description' => 'Surfing capital of the Philippines with pristine beaches and island adventures.',
            'keywords' => array('siargao', 'surfing', 'cloud 9', 'surf', 'waves', 'beach', 'island', 'naked island', 'sugba lagoon', 'magpupungko', 'rock pools')
        ),
        array(
            'name' => 'Baguio',
            'url' => 'baguio.php',
            'image' => 'img/baguio.jpg',
            'description' => 'Summer capital of the Philippines, known for cool weather, pine trees, and strawberries.',
            'keywords' => array('baguio', 'summer capital', 'cool weather', 'pine trees', 'strawberry', 'mines view', 'burnham park', 'session road', 'mountains', 'highlands')
        )
    );
    
    // Search through destinations
    $search_lower = strtolower($search_query);
    foreach($destinations as $destination)
    {
        // Check if search query matches name or keywords
        $name_match = stripos($destination['name'], $search_query) !== false;
        $keyword_match = false;
        
        foreach($destination['keywords'] as $keyword)
        {
            if(stripos($keyword, $search_query) !== false)
            {
                $keyword_match = true;
                break;
            }
        }
        
        if($name_match || $keyword_match)
        {
            $search_results[] = $destination;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - TravelSpot PH</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="css/search.css">
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
                <input type="text" placeholder="Search" name="search" value="<?php echo htmlspecialchars($search_query); ?>">
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

<!--Search Results-->
<div class="search-container">
    <div class="search-header">
        <h1><i class="fas fa-search"></i> Search Results</h1>
        <?php if(!empty($search_query)): ?>
            <p>Showing results for: <strong>"<?php echo htmlspecialchars($search_query); ?>"</strong></p>
        <?php endif; ?>
    </div>

    <div class="results-content">
        <?php if(empty($search_query)): ?>
            <div class="no-results">
                <i class="fas fa-search"></i>
                <h2>Start Your Search</h2>
                <p>Enter a destination or keyword to search for travel destinations in the Philippines.</p>
            </div>
        <?php elseif(empty($search_results)): ?>
            <div class="no-results">
                <i class="fas fa-times-circle"></i>
                <h2>No Results Found</h2>
                <p>We couldn't find any destinations matching "<strong><?php echo htmlspecialchars($search_query); ?></strong>"</p>
                <p class="suggestions">Try searching for: Palawan, Boracay, Bohol, Siargao, or Baguio</p>
            </div>
        <?php else: ?>
            <div class="results-grid">
                <?php foreach($search_results as $result): ?>
                    <div class="result-card">
                        <a href="<?php echo $result['url']; ?>" class="result-link">
                            <div class="result-image">
                                <img src="<?php echo $result['image']; ?>" alt="<?php echo $result['name']; ?>">
                                <div class="result-overlay">
                                    <span>Explore!</span>
                                </div>
                            </div>
                            <div class="result-info">
                                <h3><?php echo $result['name']; ?></h3>
                                <p><?php echo $result['description']; ?></p>
                                <span class="view-more">View Details <i class="fas fa-arrow-right"></i></span>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="results-count">
                <p>Found <strong><?php echo count($search_results); ?></strong> destination<?php echo count($search_results) > 1 ? 's' : ''; ?></p>
            </div>
        <?php endif; ?>
    </div>
</div>

<!--Footer-->
<footer>
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
                </form>
            </div>
        </div>
    </div>

    <div class="bottom">
        <center>
            <span class="title"><a href="#">TravelSpotPH</a> | </span>
            <span class="far fa-copyright"></span><span> 2023 All rights reserved.</span>
        </center>
    </div>
</footer>

</body>
</html>
