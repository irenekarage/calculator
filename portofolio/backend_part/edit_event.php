<?php
session_start();
include 'connection/include.php';

if (isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];

    // Fetch the event data
    $sql = "SELECT * FROM events WHERE event_id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $event_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $event = $result->fetch_assoc();
    $stmt->close();
} else {
    echo "No event ID provided.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Edit Event - Bootstrap 5 Admin Dashboard</title>
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
    <div class="sidebar" style="background-color:#212f3d;color:white;">
       <br>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="events.php">
                    <i class="fas fa-calendar-alt"></i>
                    <span style="color:white">Events</span>
                </a>
            </li>
            <!-- Add more sidebar items as needed -->
        </ul>
    </div>
    <!-- End Sidebar -->

    <div class="main-panel">
        <!-- Header -->
        <div class="main-header">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Admin Dashboard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php"><?php echo htmlspecialchars($_SESSION['user_email']); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End Header -->

        <div class="container">
            <div class="page-inner">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                    <div>
                        <h3 class="fw-bold mb-3">Edit Event</h3>
                    </div>
                </div>

                <form action="update_event.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="event_id" value="<?php echo htmlspecialchars($event['event_id']); ?>">

                    <div class="row">
                        <!-- Category -->
                        <div class="col-sm-6 col-md-6">
                            <div class="card card-stats">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <label for="category">Category</label>
                                        <input type="text" name="category" value="<?php echo htmlspecialchars($event['category']); ?>" required class="form-control" placeholder="Enter category" style="margin-left:15px;width:93%">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Location -->
                        <div class="col-sm-6 col-md-6">
                            <div class="card card-stats">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <label for="location">Location</label>
                                        <input type="text" name="location" value="<?php echo htmlspecialchars($event['location']); ?>" required class="form-control" placeholder="Enter location" style="margin-left:15px;width:93%">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Date -->
                        <div class="col-sm-6 col-md-6">
                            <div class="card card-stats">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <label for="date">Date</label>
                                        <input type="date" name="date" value="<?php echo htmlspecialchars($event['event_date']); ?>" required class="form-control" style="margin-left:15px;width:93%">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="col-sm-6 col-md-6">
                            <div class="card card-stats">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" rows="3" placeholder="Enter description" style="margin-left:15px;width:93%"><?php echo htmlspecialchars($event['description']); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Title -->
                        <div class="col-sm-6 col-md-6">
                            <div class="card card-stats">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" value="<?php echo htmlspecialchars($event['title']); ?>" required class="form-control" placeholder="Enter title" style="margin-left:15px;width:93%">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Video File -->
                        <div class="col-sm-6 col-md-6">
                            <div class="card card-stats">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <label for="video_file">Video File</label>
                                        <input type="file" name="video_file" class="form-control" style="margin-left:15px;width:93%">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-sm-6 col-md-6">
                            <div class="card card-stats">
                                <div class="card-body">
                                    <button type="submit" class="btn " style="background-color:#212f3d;color:white;width:120px">Update</button>
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
