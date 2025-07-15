<?php
// Function to convert bytes to human-readable format
function formatBytes($bytes, $precision = 2) {
    $units = array('B', 'KB', 'MB', 'GB', 'TB');
    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);
    $bytes /= pow(1024, $pow);
    return round($bytes, $precision) . ' ' . $units[$pow];
}

// Get memory information
$freeMem = @file_get_contents('/proc/meminfo');
$totalRam = 0;
$freeRam = 0;

if ($freeMem !== false) {
    preg_match('/MemTotal:\s+(\d+)/', $freeMem, $totalMatch);
    preg_match('/MemFree:\s+(\d+)/', $freeMem, $freeMatch);
    $totalRam = isset($totalMatch[1]) ? $totalMatch[1] * 1024 : 0;
    $freeRam = isset($freeMatch[1]) ? $freeMatch[1] * 1024 : 0;
}

// Get disk information
$totalDisk = disk_total_space("/");
$freeDisk = disk_free_space("/");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Resource Monitor</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .container { max-width: 600px; margin: auto; }
        .info-box { border: 1px solid #ccc; padding: 15px; margin: 10px 0; }
        .label { font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h1>System Resources</h1>
        
        <div class="info-box">
            <h2>RAM Information</h2>
            <p><span class="label">Total RAM:</span> <?php echo $totalRam ? formatBytes($totalRam) : 'Unable to retrieve'; ?></p>
            <p><span class="label">Free RAM:</span> <?php echo $freeRam ? formatBytes($freeRam) : 'Unable to retrieve'; ?></p>
            <p><span class="label">Used RAM:</span> <?php echo $totalRam ? formatBytes($totalRam - $freeRam) : 'Unable to retrieve'; ?></p>
        </div>

        <div class="info-box">
            <h2>Disk Information</h2>
            <p><span class="label">Total Disk Space:</span> <?php echo formatBytes($totalDisk); ?></p>
            <p><span class="label">Free Disk Space:</span> <?php echo formatBytes($freeDisk); ?></p>
            <p><span class="label">Used Disk Space:</span> <?php echo formatBytes($totalDisk - $freeDisk); ?></p>
        </div>
    </div>
</body>
</html>
