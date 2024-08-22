<?php
include "connection/include.php";
session_start();

// Fetch gallery items from the database
$query = "SELECT * FROM my_gallery ORDER BY id DESC";
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Gallery</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="./assets/img/kaiadmin/favicon.ico" type="image/x-icon" />
    
    <!-- Fonts and icons -->
    <script src="./assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: { families: ["Public Sans:300,400,500,600,700"] },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["./assets/css/fonts.min.css"],
            },
            active: function () {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./assets/css/plugins.min.css" />
    <link rel="stylesheet" href="./assets/css/kaiadmin.min.css" />
    <link rel="stylesheet" href="./assets/css/demo.css" />

    <style>
        .gallery-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
            overflow: hidden;
            transition: transform 0.2s;
            min-height: 300px; /* Minimum height for the card */
            width: 100%; /* Full width within its column */
            max-width: 100%; /* Ensure the card does not exceed column width */
        }

        .gallery-card:hover {
            transform: scale(1.05);
        }

        .gallery-card img {
            width: 100%;
            height: auto;
        }

        .gallery-card-body {
            padding: 15px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }

        .gallery-card-actions {
            display: flex;
            justify-content: space-between;
            padding: 15px;
        }

        .gallery-card-actions a {
            color: #fff;
            font-size: 14px;
            text-decoration: none;
        }

        .gallery-card-actions .btn-view {
            background-color: #212f3d;
        }

        .gallery-card-actions .btn-delete {
            background-color: #dc3545;
        }

        /* Ensure cards align properly */
        .card-deck {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card-deck .col-md-4 {
            flex: 1 1 calc(33.333% - 20px);
        }
    </style>
</head>
<body style="background-color: #212f3d;">
    <div class="wrapper">
        <!-- Sidebar and Main Panel Code Here... -->

        <div class="main-panel">
            <div class="main-header">
                <!-- Navbar Header Code Here... -->
            </div>

            <div class="container">
                <div class="page-inner">
                <a href="index.php" style="color:white;font-size:14px">Home</a>
                    <div class="page-header">
                        <h3 class="fw-bold mb-3" style="color:white;">My Gallery</h3>
                    </div>
                    <div class="row card-deck">
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="col-md-4">';
                            echo '<div class="gallery-card">';
                            echo '<img src="uploads/' . htmlspecialchars($row['upload_photo']) . '" alt="Gallery Image">';
                            echo '<div class="gallery-card-body">';
                            echo '<p style="color:white;">' . htmlspecialchars($row['description']) . '</p>';
                            echo '<p style="color:white;">' . htmlspecialchars($row['created_at']) . '</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>

          
        </div>
    </div>

    <!-- JS Files -->
    <script src="./assets/js/core/jquery.3.6.0.min.js"></script>
    <script src="./assets/js/core/bootstrap.min.js"></script>
    <script src="./assets/js/ready.min.js"></script>
</body>
</html>
