<?php
include "connection/include.php";
session_start();

// Check if ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die('ID parameter is missing.');
}

// Get ID from query parameter and sanitize it
$id = intval($_GET['id']);

// Prepare and execute the query to fetch the item
$query = "SELECT * FROM my_gallery WHERE id = ?";
$stmt = $connect->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// Fetch data
if ($result->num_rows > 0) {
    $item = $result->fetch_assoc();
} else {
    die('No records found.');
}

// Close connection
$stmt->close();
$connect->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>View Gallery Item</title>
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
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <!-- Sidebar content -->
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <!-- Sidebar items -->
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
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
                    <div class="page-header">
                        <h3 class="fw-bold mb-3">View Gallery Item</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Info:  <?php echo htmlspecialchars($item['description']); ?></h5><br>
                                    <img src="uploads/<?php echo htmlspecialchars($item['upload_photo']); ?>" alt="Gallery Image" width="400">
                                    <p><strong>Created At:</strong> <?php echo htmlspecialchars($item['created_at']); ?></p>
                                    <a href="gallery.php" class="btn btn-secondary">Back to Gallery</a>
                                    <a href="deletephoto.phpid=<?php echo $item['id']; ?>" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="footer">
                <div class="container">
                    <div class="copyright text-center">
                        &copy; <script>document.write(new Date().getFullYear())</script>, Kai Admin by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- JS Files -->
    <script src="./assets/js/core/jquery.3.6.0.min.js"></script>
    <script src="./assets/js/core/bootstrap.min.js"></script>
    <script src="./assets/js/ready.min.js"></script>
</body>
</html>
