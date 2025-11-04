<?php
use Stichoza\GoogleTranslate\GoogleTranslate;

session_start();
require_once "../lib/db.php";
require_once '../../vendor/autoload.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../public/index.php");
    exit();
}

$stmt = $pdo->prepare("SELECT token, username FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();
$api_key = $user['token'];
$username = $user['username'];

$selected_date = $_GET['date'] ?? date('Y-m-d');

$apod_data = [];
$explicacion_traducida = '';
try {
    $apod_url = "https://api.nasa.gov/planetary/apod?api_key=$api_key&date=$selected_date";
    $apod_json = file_get_contents($apod_url);
    $apod_data = json_decode($apod_json, true);

    $tr = new GoogleTranslate('es');
    $tr->setSource('en');
    $explicacion_traducida = $tr->translate($apod_data['explanation']);
} catch (Exception $e) {
    $apod_data['title'] = 'Error';
    $apod_data['explanation'] = 'No se pudo obtener la imagen del día.';
    $apod_data['url'] = '';
    $explicacion_traducida = 'No se pudo obtener la imagen del día.';
}

$asteroids_data = [];
$total_asteroids = 0;
$hazardous_asteroids = [];
try {
    $asteroids_url = "https://api.nasa.gov/neo/rest/v1/feed?start_date=$selected_date&end_date=$selected_date&api_key=$api_key";
    $asteroids_json = file_get_contents($asteroids_url);
    $asteroids_data = json_decode($asteroids_json, true);

    $total_asteroids = $asteroids_data['element_count'];
    foreach ($asteroids_data['near_earth_objects'][$selected_date] as $asteroid) {
        if ($asteroid['is_potentially_hazardous_asteroid']) {
            $hazardous_asteroids[] = [
                'name' => $asteroid['name'],
                'diameter' => ($asteroid['estimated_diameter']['kilometers']['estimated_diameter_min'] +
                    $asteroid['estimated_diameter']['kilometers']['estimated_diameter_max']) / 2,
                'velocity' => $asteroid['close_approach_data'][0]['relative_velocity']['kilometers_per_second'],
                'distance' => $asteroid['close_approach_data'][0]['miss_distance']['lunar']
            ];
        }
    }
} catch (Exception $e) {
}

$api_headers = get_headers($apod_url, 1);
$remaining_calls = $api_headers['X-RateLimit-Remaining'] ?? 'N/A';

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>NASA Dashboard</title>
    <link rel="stylesheet" href="../../public/assets/css/dashboard.css">
</head>

<body class="dashboard-body">
    <nav class="navbar">
        <img src="../../public/assets/img/nasa-3.svg" alt="NASA Logo" class="nasa-header-logo">
        <div class="user-info">
            <span>¡Hola, <?php echo htmlspecialchars($username); ?>!</span>
            <div class="api-info">Consultas disponibles: <?php echo htmlspecialchars($remaining_calls); ?></div>
            <a href="../auth/logout.php" class="logout-btn">Cerrar Sesión</a>
        </div>
    </nav>

    <div class="hud-container">
        <section class="hud-panel">
            <h2>Asteroides Cercanos</h2>
            <div class="asteroids-content">
                <p>Total de asteroides detectados: <?php echo htmlspecialchars($total_asteroids); ?></p>
                <p>Asteroides potencialmente peligrosos: <?php echo htmlspecialchars(count($hazardous_asteroids)); ?></p>
            </div>

            <?php if (!empty($hazardous_asteroids)): ?>
                <div class="hazardous-asteroids">
                    <h3>Asteroides Peligrosos</h3>
                    <?php foreach ($hazardous_asteroids as $asteroid): ?>
                        <div class="hazardous-asteroid">
                            <div><span><?php echo htmlspecialchars(trim($asteroid['name'], '()')); ?></span></div>
                            <p><span>Diámetro (km): </span><?php echo htmlspecialchars(number_format($asteroid['diameter'], 2)); ?></p>
                            <p><span>Velocidad (km/s): </span><?php echo htmlspecialchars(number_format($asteroid['velocity'], 2)); ?></p>
                            <p><span>Distancia (Lunar): </span><?php echo htmlspecialchars(number_format($asteroid['distance'], 2)); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>
        <div class="hud-panel photo-panel">
            <div class="date-container">
                <h2>Foto Astronómica del Día</h2>
                <div class="date-wrapper">
                    <input type="date"
                        id="dateSelector"
                        value="<?php echo htmlspecialchars($selected_date); ?>"
                        onchange="window.location.href='?date='+this.value">
                </div>
            </div>
            <div class="apod-content">
                <div class="photo-title">
                    <h3><?php echo htmlspecialchars($apod_data['title']); ?></h3>
                </div>
                <img src="<?php echo htmlspecialchars($apod_data['url']); ?>" alt="APOD">
                <p><?php echo htmlspecialchars($explicacion_traducida); ?></p>
                <a href="../actions/download.php?url=<?php echo htmlspecialchars(urlencode($apod_data['url'])); ?>" class="download-btn">
                    Descargar Imagen
                </a>
            </div>
        </div>
    </div>
    <script src="../../public/assets/js/dashboard.js"></script>
</body>

</html>