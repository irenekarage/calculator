<?php
include "connection/include.php";
session_start();

// Check if ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die('ID parameter is missing.');
}

// Get ID from query parameter and sanitize it
$id = intval($_GET['id']);

// Prepare and execute the query to delete the item
$query = "DELETE FROM my_gallery WHERE id = ?";
$stmt = $connect->prepare($query);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    // If delete is successful, redirect to gallery page with success message
    $_SESSION['message'] = 'Gallery item deleted successfully!';
    header('Location: gallery.php');
} else {
    // If delete fails, redirect to gallery page with error message
    $_SESSION['message'] = 'Failed to delete gallery item.';
    header('Location: gallery.php');
}

// Close connection
$stmt->close();
$connect->close();
?>
