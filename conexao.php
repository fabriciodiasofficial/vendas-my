<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vendas";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Define PDO para lançar exceções em caso de erros
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Conexão falhou: " . $e->getMessage());
}
?>
