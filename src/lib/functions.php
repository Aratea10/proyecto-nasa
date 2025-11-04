<?php
function logout()
{
    session_start();
    session_destroy();
    setcookie('user_logged', '', time() - 3600, '/');
    header('Location: ../../public/index.php');
    exit();
}

function checkSession()
{
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header('Location: ../../public/index.php');
        exit();
    }
}