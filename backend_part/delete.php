<?php
// delete.php

// Include database connection
include 'connection/include.php';

if (isset($_GET['id'])) {
    $project_id = intval($_GET['id']);

    // Fetch the file name associated with the project ID
    $stmt = $connect->prepare("SELECT zipped_file FROM my_projects WHERE project_id = ?");
    $stmt->bind_param("i", $project_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $zipped_file = $row['zipped_file'];
        $filepath = 'uploads/' . $zipped_file;

        // Delete the record from the database
        $stmt = $connect->prepare("DELETE FROM my_projects WHERE project_id = ?");
        $stmt->bind_param("i", $project_id);
        if ($stmt->execute()) {
            // Delete the file from the server
            if (file_exists($filepath)) {
                unlink($filepath);
            }
            // Redirect with success message
            header('Location: your_table_page.php?message=Record+deleted+successfully');
            exit;
        } else {
            echo "Error deleting record.";
        }
    } else {
        echo "Record not found.";
    }
} else {
    echo "No ID specified.";
}
?>
