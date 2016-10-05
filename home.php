<?php
    session_start();
    ob_start();
    if(isset($_SESSION["user_id"])) {
    }else {
        header('Location: signin.php');
    }
    include('partial/head.php');
    include('partial/nav.php');
    include 'includes/db.php';
    include 'includes/conn.php';
?>

<div class="container">
    <h1><?php echo "Welcome  " . $_SESSION['fullName']; ?></h1>
</div>

