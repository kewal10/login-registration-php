<?php
    ob_start();
    session_start();
    include 'partial/head.php';
    include 'partial/nav.php';
    include 'includes/db.php';
    include 'includes/conn.php';
?>

<?php


unset($_SESSION['user_id']);
session_destroy();
header('Location: signin.php');
?>

