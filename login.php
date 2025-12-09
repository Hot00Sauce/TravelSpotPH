<?php
session_start();

include("connection.php");
include("functions.php");

$error_message = "";
$success_message = "";

// Check for success message from signup
if(isset($_SESSION['success_message']))
{
    $success_message = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {
        $query = "select * from users where user_name = '$user_name' limit 1";

        $result = mysqli_query($con, $query);

        if($result)
        {
               if($result && mysqli_num_rows($result) > 0)
		   {

			   $user_data = mysqli_fetch_assoc($result);
			   
               if($user_data['password'] === $password)
               {
                // Regenerate session ID to prevent session fixation
                session_regenerate_id(true);
                
                $_SESSION['user_id'] = $user_data['user_id'];
                $_SESSION['user_name'] = $user_data['user_name'];
                $_SESSION['logged_in'] = true;
                $_SESSION['last_activity'] = time();
                $_SESSION['success_message'] = "Login successful! Welcome back.";
                
                header("Location: home.php");
                die;
               }
               else
               {
                   $error_message = "Wrong username or password!";
               }
		   }
		   else
		   {
		       $error_message = "User not found!";
		   }
        }
        else
        {
            $error_message = "Database error. Please try again.";
        }

    }else
    {
        $error_message = "Please enter valid information!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

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
                <li><a href="login.php">Log in / Sign up</a></li>
            </ul>
        </nav>
    </header>
 </div>

 <div class="backgroundimg">
    <img src="img/BGLS.jpg" alt="Background image of a filipino guy drinking coffee">
 </div>

    <div class="box">
        <form method="post">
            <div style="font-size: 20px; margin: 10px; color: white;">Login</div>
            <input id="text" type="text" placeholder="Username..." name="user_name" required><br><br>
            <input id="text" type="password"  placeholder="Password..." name="password" required><br><br>

            <input id="button" type="submit" value="Login"><br><br>

            <a href="signup.php">Click to Signup</a><br><br>
        </form>
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
</div>
<script src="js/signuplogin.js"></script>
</body>
</html>