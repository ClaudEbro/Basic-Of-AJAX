<?php
    session_start();
    $name = $_SESSION['name'];
?>

<center><h2>Welcome, <?php echo $name; ?> to the dashboard !</h2></center>
<center><a href="logout.php">Logout</a></center>