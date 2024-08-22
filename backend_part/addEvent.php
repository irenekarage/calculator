<?php
session_start();
include 'connection/include.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if POST variables are set
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
                $sql = "INSERT INTO events (category, location, event_date, description, title, video_file) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $connect->prepare($sql);
                $stmt->bind_param("ssssss", $category, $location, $date, $description, $title, $newFileName);

                if ($stmt->execute()) {
                    echo "Event added successfully.";
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
        echo "No file uploaded or there was an upload error.";
    }

    $connect->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Add Event - Bootstrap 5 Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="assets/img/kaiadmin/favicon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
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
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css" />
</head>
<body>

<div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
                <a href="events.php" class="logo" style="color: white;">
                    ARUCSM-INNOVATION
                </a>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="gg-menu-right"></i>
                    </button>
                    <button class="btn btn-toggle sidenav-toggler">
                        <i class="gg-menu-left"></i>
                    </button>
                </div>
                <button class="topbar-toggler more">
                    <i class="gg-more-vertical-alt"></i>
                </button>
            </div>
            <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <ul class="nav nav-secondary">
                    <li class="nav-item active">
                        <a data-bs-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                            <span class="caret"></span>
                        </a>
                    </li>
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">USER MENU</h4>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarLayouts">
                            <i class="fas fa-th-list"></i>
                            <p>Events</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="sidebarLayouts">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="events.php">
                                        <span class="sub-item">View</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Other menu items -->
                </ul>
            </div>
        </div>
    </div>
    <!-- End Sidebar -->

    <div class="main-panel">
        <div class="main-header">
            <div class="main-header-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="index.html" class="logo">
                        <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20" />
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>
            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                <div class="container-fluid">
                    <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="submit" class="btn btn-search pe-1">
                                    <i class="fa fa-search search-icon"></i>
                                </button>
                            </div>
                            <input type="text" placeholder="Search ..." class="form-control" />
                        </div>
                    </nav>

                    <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                        <li class="nav-item topbar-icon dropdown hidden-caret">
                            <a class="nav-link" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                                <i class="fas fa-user"></i>
                            </a>
                            <a href="logout.php">
                                <div class="dropdown-menu quick-actions animated fadeIn">
                                    <div class="quick-actions-header">
                                        <span class="title mb-1">Logout</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>

        <div class="container">
            <div class="page-inner">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                    <div>
                        <h3 class="fw-bold mb-3">Add Event</h3>
                    </div>
                </div>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="card card-stats">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <label for="category">Category</label>
                                        <input type="text" name="category" required class="form-control" placeholder="Enter category" style="margin-left:15px;width:93%">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="card card-stats">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <label for="location">Location</label>
                                        <input type="text" name="location" required class="form-control" placeholder="Enter location" style="margin-left:15px;width:93%">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="card card-stats">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <label for="date">Date</label>
                                        <input type="date" name="date" required class="form-control" placeholder="Enter date" style="margin-left:15px;width:93%">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="card card-stats">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <label for="description">Description</label>
                                        <textarea name="description" required class="form-control" placeholder="Enter description" style="margin-left:15px;width:93%"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="card card-stats">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" required class="form-control" placeholder="Enter title" style="margin-left:15px;width:93%">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="card card-stats">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <label for="video_file">Video File</label>
                                        <input type="file" name="video_file" required class="form-control" style="margin-left:15px;width:93%">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="card card-stats">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-"  style="background-color:#212f3d;color:white;width:120px">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Core JS Files -->
<script src="assets/js/core/jquery.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/atk.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/kaiadmin.min.js"></script>
</body>
</html>
