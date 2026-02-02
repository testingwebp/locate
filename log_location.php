<?php
// Receive the location data
$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);

if ($data) {
    // This special line sends the output to Render's Dashboard Logs
    $logOutput = "NEW VISITOR: Lat: " . $data['lat'] . " | Lon: " . $data['lon'] . " | Time: " . $data['time'];
    
    // error_log with '4' sends it to the system log/stdout
    file_put_contents('php://stdout', $logOutput . PHP_EOL);
    
    // Also keep the file save just in case (though you can't see it via shell)
    file_put_contents('visitors.txt', $logOutput . PHP_EOL, FILE_APPEND);
}
?>