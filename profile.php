<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

if(!$user_data) {
    header("Location: login.php");
    die;
}

$success_message = "";
$error_message = "";

// Handle profile update
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update_profile']))
{
    $new_username = $_POST['user_name'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if(!empty($new_username) && !is_numeric($new_username))
    {
        // Update username
        if($new_username != $user_data['user_name'])
        {
            $user_id = $user_data['user_id'];
            $query = "UPDATE users SET user_name = '$new_username' WHERE user_id = '$user_id'";
            if(mysqli_query($con, $query))
            {
                $success_message = "Username updated successfully!";
                $user_data['user_name'] = $new_username;
            }
            else
            {
                $error_message = "Error updating username.";
            }
        }

        // Update password if provided
        if(!empty($current_password) && !empty($new_password))
        {
            if($user_data['password'] === $current_password)
            {
                if($new_password === $confirm_password)
                {
                    $user_id = $user_data['user_id'];
                    $query = "UPDATE users SET password = '$new_password' WHERE user_id = '$user_id'";
                    if(mysqli_query($con, $query))
                    {
                        $success_message = "Password updated successfully!";
                    }
                    else
                    {
                        $error_message = "Error updating password.";
                    }
                }
                else
                {
                    $error_message = "New passwords do not match!";
                }
            }
            else
            {
                $error_message = "Current password is incorrect!";
            }
        }
    }
    else
    {
        $error_message = "Please enter a valid username!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - TravelSpot PH</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="css/profile.css">
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
            </ul>
        </nav>
    </header>
</div>

<!--Profile Content-->
<div class="profile-container">
    <div class="profile-header">
        <div class="profile-avatar">
            <i class="fas fa-user-circle"></i>
        </div>
        <h1>Welcome, <?php echo htmlspecialchars($user_data['user_name']); ?>!</h1>
        <p>Manage your account settings</p>
    </div>

    <div class="profile-content">
        <div class="profile-card">
            <h2><i class="fas fa-info-circle"></i> Account Information</h2>
            <div class="info-group">
                <label>User ID:</label>
                <span><?php echo htmlspecialchars($user_data['user_id']); ?></span>
            </div>
            <div class="info-group">
                <label>Username:</label>
                <span><?php echo htmlspecialchars($user_data['user_name']); ?></span>
            </div>
            <div class="info-group">
                <label>Account Created:</label>
                <span><?php echo isset($user_data['date']) ? date('F j, Y', strtotime($user_data['date'])) : 'N/A'; ?></span>
            </div>
        </div>

        <div class="profile-card">
            <h2><i class="fas fa-edit"></i> Update Profile</h2>
            <form method="post">
                <div class="form-group">
                    <label for="user_name">New Username</label>
                    <input type="text" id="user_name" name="user_name" value="<?php echo htmlspecialchars($user_data['user_name']); ?>" required>
                </div>

                <div class="form-divider">
                    <h3>Change Password (Optional)</h3>
                </div>

                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" id="current_password" name="current_password" placeholder="Enter current password">
                </div>

                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" id="new_password" name="new_password" placeholder="Enter new password">
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm New Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm new password">
                </div>

                <button type="submit" name="update_profile" class="btn-update">
                    <i class="fas fa-save"></i> Update Profile
                </button>
            </form>
        </div>

        <div class="profile-card danger-zone">
            <h2><i class="fas fa-sign-out-alt"></i> Quick Actions</h2>
            <a href="logout.php" class="btn-logout">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div>
</div>

<!-- Success Modal -->
<?php if(!empty($success_message)): ?>
<div id="successModal" class="modal">
    <div class="modal-content success">
        <span class="close" onclick="closeModal('successModal')">&times;</span>
        <div class="modal-icon">✓</div>
        <h2>Success!</h2>
        <p><?php echo $success_message; ?></p>
    </div>
</div>
<?php endif; ?>

<!-- Error Modal -->
<?php if(!empty($error_message)): ?>
<div id="errorModal" class="modal">
    <div class="modal-content error">
        <span class="close" onclick="closeModal('errorModal')">&times;</span>
        <div class="modal-icon">✕</div>
        <h2>Error!</h2>
        <p><?php echo $error_message; ?></p>
    </div>
</div>
<?php endif; ?>

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

<script>
    // Show modals when page loads
    window.onload = function() {
        <?php if(!empty($success_message)): ?>
        document.getElementById('successModal').style.display = 'block';
        <?php endif; ?>
        <?php if(!empty($error_message)): ?>
        document.getElementById('errorModal').style.display = 'block';
        <?php endif; ?>
    }

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        if (event.target.classList.contains('modal')) {
            event.target.style.display = 'none';
        }
    }
</script>
</body>
</html>
