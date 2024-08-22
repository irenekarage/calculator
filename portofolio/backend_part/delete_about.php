<?php
include "connection/include.php";
session_start();

if (!isset($_GET['id'])) {
    header('Location: about.php');
    exit();
}

$id = $_GET['id'];

// Prepare a statement to delete the record
$delete_query = "DELETE FROM about WHERE id = ?";
$stmt = $connect->prepare($delete_query);
$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    $_SESSION['success_message'] = 'Record successfully deleted.';
} else {
    $_SESSION['error_message'] = 'Failed to delete the record.';
}

header('Location: about.php');
exit();
