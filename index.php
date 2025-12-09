<?php
// Redirect to the actual home page
header("Location: home.php");
exit();
?>


    <br>
    Hello, <?php echo $user_data['user_name']; ?>
</body>
</html>