<?php
session_start();
include 'connection/include.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if POST variables are set
    $event_id = isset($_POST['event_id']) ? $_POST['event_id'] : '';
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $location = isset($_POST['location']) ? $_POST['location'] : '';
    $date = isset($_POST['date']) ? $_POST['date'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $title = isset($_POST['title']) ? $_POST['title'] : '';

    // File upload handling
    if (isset($_FILES['video_file']) && $_FILES['video_file']['error'] == 0) {
        $fileTmpPath = $_FILES['video_file']['tmp_name'];
        $fileName = $_FILES['video_file']['name'];
        $fileSize = $_FILES['video_file']['size'];
        $fileType = $_FILES['video_file']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Check file extension
        $allowedExts = array('mp4', 'avi', 'mov', 'mkv');
        if (in_array($fileExtension, $allowedExts)) {
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $uploadFileDir = 'uploads/';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                // Prepare the SQL statement
                $sql = "UPDATE events SET category = ?, location = ?, event_date = ?, description = ?, title = ?, video_file = ? WHERE event_id = ?";
                $stmt = $connect->prepare($sql);
                $stmt->bind_param("ssssssi", $category, $location, $date, $description, $title, $newFileName, $event_id);

                if ($stmt->execute()) {
                    echo "Event updated successfully.";
                    header("Location: events.php");
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Invalid file type. Allowed types: mp4, avi, mov, mkv.";
        }
    } else {
        // Update without changing the file
        $sql = "UPDATE events SET category = ?, location = ?, event_date = ?, description = ?, title = ? WHERE event_id = ?";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("sssssi", $category, $location, $date, $description, $title, $event_id);

        if ($stmt->execute()) {
            echo "Event updated successfully.";
            header("Location: events.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $connect->close();
}
?>
