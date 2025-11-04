<?php
session_start();
require_once '../src/lib/db.php';

if (isset($_SESSION['user_id'])) {
    header("Location: ../src/pages/dashboard.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        setcookie('user_logged', 'true', time() + (86400 * 30), "/");
        header("Location: ../src/pages/dashboard.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>NASA - Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>

    <body class="login-body">
        <img src="assets/img/logonasa.png" alt="NASA Logo" class="nasa-logo">
        <div class="login-container">
            <form class="login-form" method="POST">
                <h2>Iniciar Sesión</h2>
                <div class="form-group">
                    <input type="text" name="username" placeholder="Usuario" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Contraseña" required>
                </div>
                <button type="submit">Entrar</button>
                <p>¿No tienes cuenta? <a href="../src/auth/register.php">Regístrate</a></p>
                <?php if (isset($error)): ?>
                    <div class="error"><?php echo $error; ?></div>
                <?php endif; ?>
                <?php if (isset($_SESSION['success_message'])): ?>
                    <div class="success"><?php echo $_SESSION['success_message']; ?></div>
                    <?php unset($_SESSION['success_message']); ?>
                <?php endif; ?>
            </form>
        </div>
    </body>

</html>