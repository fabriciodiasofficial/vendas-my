<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

echo "Bem-vindo, " . $_SESSION['username'] . "!<br>";
echo "<a href='logout.php'>Logout</a>";
?>
