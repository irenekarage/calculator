<?php
// download.php

// Ensure a file parameter is passed
if (isset($_GET['file'])) {
    $file = $_GET['file'];
    $filepath = 'uploads/' . $file;

    // Check if file exists
    if (file_exists($filepath)) {
        // Set headers to force download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        flush(); // Flush system output buffer
        readfile($filepath);
        exit;
    } else {
        // File not found
        http_response_code(404);
        die('File not found.');
    }
} else {
    // No file parameter
    http_response_code(400);
    die('No file specified.');
}
?>
