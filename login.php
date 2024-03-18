<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera dados do formulário
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Consulta preparada para verificar usuário e senha
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE username=:username AND senha=:senha");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':senha', $password);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Login bem-sucedido
            session_start();
            $_SESSION['username'] = $username;
            header("Location: dashboard.php"); // Redireciona para a página de dashboard
        } else {
            // Login falhou
            $error = "Usuário ou senha incorretos.";
        }
    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

$conn = null; // Fecha a conexão
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if(isset($error)) echo "<p>$error</p>"; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
