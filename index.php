<?php
include dirname(__FILE__) . '/.private/config.php';
<?php
// Log file path
$logFile = __DIR__ . "/attendance_log_raw.txt";

// Get raw POST data from the device
$data = file_get_contents("php://input");

// Save raw data for debugging
file_put_contents($logFile, date("Y-m-d H:i:s") . " - RAW DATA: " . $data . PHP_EOL, FILE_APPEND);

// Exit if no data received
if (empty($data)) {
    echo "❌ No data received from device.";
    exit;
}

// Try to decode JSON
$logs = json_decode($data, true);
if ($logs && is_array($logs)) {
    foreach ($logs as $log) {
        file_put_contents($logFile, date("Y-m-d H:i:s") . " - JSON Log: " . json_encode($log) . PHP_EOL, FILE_APPEND);
    }
    echo "✅ JSON logs saved";
    exit;
}

// Try XML
libxml_use_internal_errors(true);
$xml = simplexml_load_string($data);
if ($xml !== false) {
    foreach ($xml->Log as $log) {
        file_put_contents($logFile, date("Y-m-d H:i:s") . " - XML Log: " . json_encode($log) . PHP_EOL, FILE_APPEND);
    }
    echo "✅ XML logs saved";
    exit;
}

// Try key=value format (e.g., user_id=12&status=0&timestamp=...)
parse_str($data, $kvLogs);
if (!empty($kvLogs['user_id'])) {
    file_put_contents($logFile, date("Y-m-d H:i:s") . " - KV Log: " . json_encode($kvLogs) . PHP_EOL, FILE_APPEND);
    echo "✅ Key-Value logs saved";
    exit;
}

// If all parsing fails
echo "❌ Unsupported data format, saved raw log";
?>

