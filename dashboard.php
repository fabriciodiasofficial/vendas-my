<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

echo "Bem-vindo, " . $_SESSION['nome'] . "!<br>";
echo "<a href='logout.php'>Logout</a>";
?>
