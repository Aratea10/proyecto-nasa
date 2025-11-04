<?php
session_start();
require_once '../lib/db.php';

if (isset($_SESSION['user_id'])) {
    header("Location: ../pages/dashboard.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];
    $token = $_POST['token'];

    if ($password !== $repeat_password) {
        $error = "Las contraseñas no coinciden";
    } else {
        try {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (username, password, token) VALUES (?, ?, ?)");
            $stmt->execute([$username, $hashed_password, $token]);
            $_SESSION['success_message'] = "Usuario registrado correctamente";
            header("Location: ../../public/index.php");
            exit();
        } catch (PDOException $e) {
            $error = "Error al registrar usuario";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>NASA - Registro</title>
    <link rel="stylesheet" href="../public/assets/css/login.css">
</head>

<body class="login-body">
    <img src="../public/assets/img/logonasa.png" alt="NASA Logo" class="nasa-logo">
    <div class="login-container">
        <form class="login-form" method="POST">
            <h2>Crear Cuenta</h2>
            <?php if (isset($error)): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
            <?php if (isset($_SESSION['success_message'])): ?>
                <div class="success"><?php echo $_SESSION['success_message']; ?></div>
                <?php unset($_SESSION['success_message']); ?>
            <?php endif; ?>
            <div class="form-group">
                <input type="text" name="username" placeholder="Usuario" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Contraseña" required>
            </div>
            <div class="form-group">
                <input type="password" name="repeat_password" placeholder="Repetir contraseña" required>
            </div>
            <div class="form-group">
                <input type="text" name="token" placeholder="Token NASA" required>
            </div>
            <button type="submit" class="stellar-button">Crear cuenta</button>
            <button type="button" class="back-button stellar-button" onclick="window.location.href='../../public/index.php'">Volver</button>
        </form>
    </div>
</body>

</html>