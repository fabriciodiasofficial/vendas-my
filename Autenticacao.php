<?php
require_once 'Conexao.php';

class Autenticacao extends Conexao {
    public function login($email, $senha) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE email=:email AND senha=:senha");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                session_start();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['email'] = $email;
                $_SESSION['nome'] = $row['nome'];
                header("Location: dashboard.php");
            } else {
                $error = "Email ou senha incorretos.";
                return $error;
            }
        } catch(PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
}
?>
