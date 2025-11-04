<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    exit('No autorizado');
}

if (isset($_GET['url'])) {
    $url = $_GET['url'];

    if (strpos($url, 'https://apod.nasa.gov/') !== 0) {
        exit('URL no permitida');
    }

    $filename = basename($url);

    header('Content-Type: application/octet-stream');
    header('Content-Transfer-Encoding: Binary');
    header('Content-disposition: attachment; filename="' . $filename . '"');
    readfile($url);
    exit;
}