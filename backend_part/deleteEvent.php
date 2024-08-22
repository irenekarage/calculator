<?php
session_start();
include 'connection/include.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if ID is set
    $event_id = isset($_POST['event_id']) ? $_POST['event_id'] : '';

    if (!empty($event_id)) {
        // Prepare the SQL statement
        $sql = "DELETE FROM events WHERE event_id = ?";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("i", $event_id);

        if ($stmt->execute()) {
            echo "Event deleted successfully.";
            header("Location: events.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Invalid event ID.";
    }

    $connect->close();
}
?>
