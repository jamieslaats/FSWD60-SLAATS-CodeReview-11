<?php
session_start();
if (!isset($_SESSION['User'])) {
 header("Location: login.php");
} else if(!isset($_SESSION['User'])) {
 header("Location: home.php");
}

if (!isset($_SESSION['Admin'])) {
 header("Location: login.php");
} else if(!isset($_SESSION['Admin'])) {
 header("Location: adminpanel.php");
}

if (isset($_GET['logout'])) {
 unset($_SESSION['User']);
 unset($_SESSION['Admin']);

 session_unset();
 session_destroy();
 header("Location: login.php");
 exit;
}
?>