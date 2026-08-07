<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Gallery - JM International SPC</title>
    <link rel="shortcut icon" type="image/png" href="../images/logo.png?v=2">
    <link rel="icon" type="image/png" href="../images/logo.png?v=2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #1e293b;
            color: white;
            padding-top: 60px;
            transition: all 0.3s;
        }
        .sidebar a {
            color: #d1d5db;
            padding: 15px 20px;
            display: block;
            text-decoration: none;
            transition: all 0.3s;
        }
        .sidebar a:hover {
            background-color: #334155;
            color: white;
        }
        .sidebar .nav-item.active a {
            background-color: #3b82f6;
            color: white;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
            min-height: 100vh;
        }
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 10px 20px;
            position: fixed;
            width: calc(100% - 250px);
            top: 0;
            left: 250px;
            z-index: 1000;
        }
        .navbar-brand {
            font-weight: 600;
            color: #1e293b;
        }
        .card {
            transition: transform 0.2s;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .footer {
            background-color: #1e293b;
            color: white;
            padding: 20px 0;
            text-align: center;
            position: relative;
            margin-left: 250px;
        }
        .btn-primary {
            background-color: #3b82f6;
            border-color: #3b82f6;
        }
        .btn-primary:hover {
            background-color: #2563eb;
            border-color: #2563eb;
        }
        @media (max-width: 991px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .main-content, .navbar, .footer {
                margin-left: 0;
                width: 100%;
            }
            .navbar {
                left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar">
        <div class="sidebar-header p-3 text-center">
            <img src="../images/logo.png" alt="Admin Panel Logo" style="max-width: 150px; height: auto; margin-bottom: 10px;">
            <h4 class="text-white">Admin Panel</h4>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="dashboard.php"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="applications_list.php"><i class="fas fa-globe"></i> Received Applications</a>
            </li>
            <li class="nav-item">
                <a href="applications_list_rd.php"><i class="fas fa-globe"></i> Resume Drop Off </a>
            </li>
            <li class="nav-item active">
                <a href="gallery.php"><i class="fas fa-images me-2"></i> Gallery</a>
            </li>
            <li class="nav-item">
                <a href="jobs_admin.php"><i class="fas fa-briefcase me-2"></i> Job</a>
            </li>
            <li class="nav-item">
                <a href="admin-events.html"><i class="fas fa-calendar-alt me-2"></i> Event</a>
            </li>
            <li class="nav-item">
                <a href="messages.php"><i class="fas fa-envelope me-2"></i> Message</a>
            </li>
            <li class="nav-item">
                <a href="clients.php"><i class="fas fa-users me-2"></i> Client</a>
            </li>
            <li class="nav-item">
                <a href="logout.php"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
            </li>
        </ul>
    </nav>

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">JM International SPC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-user me-2"></i> admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container my-5">
            <h3 class="text-center mb-4">Manage Gallery</h3>
            
            <!-- Alerts -->
                        
            <!-- Upload Form -->
            <div class="card shadow mb-5">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Upload New Image</h3>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image (JPEG/PNG/GIF,Width : 1000 X  Height 660  max 1MB)</label>
                            <input type="file" name="image" class="form-control" accept="image/jpeg, image/png, image/gif" required>
                        </div>
                        <div id="imagePreview" class="mt-3" style="display:none;">
                            <img id="previewImg" src="" class="img-thumbnail" style="max-height: 200px;">
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>

            <!-- Search Form -->
            <h3 class="mb-3">Uploaded Images</h3>
            <form method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search by title or description" value="">
                    <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
            </form>

            <!-- Image List -->
            <div class="row">
                                    <div class="col-md-4 mb-4">
                        <div class="card shadow">
                            <img src="../uploads/gallery/6a5f528947b75-moh.png" class="card-img-top" alt="Featured in Entrepreneur Gulf - July 2026" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">Featured in Entrepreneur Gulf - July 2026</h5>
                                <p class="card-text">Honoured to be recognised by Entrepreneur Gulf as the Most Visionary Entrepreneur from Oman. The feature highlights our people-first philosophy, and commitment to workforce development across Oman and the GCC: https://entrepreneurgulf.com/magazine-digital/vol-8-issue-8-oman.html#features/19</p>
                                <p class="card-text text-muted small">Uploaded on: 2026-07-21 16:35</p>
                                <div class="d-flex justify-content-between">
                                    <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#imageModal" data-src="../uploads/gallery/6a5f528947b75-moh.png" data-title="Featured in Entrepreneur Gulf - July 2026">View</a>
                                    <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-id="31" data-title="Featured in Entrepreneur Gulf - July 2026" data-description="Honoured to be recognised by Entrepreneur Gulf as the Most Visionary Entrepreneur from Oman. The feature highlights our people-first philosophy, and commitment to workforce development across Oman and the GCC: https://entrepreneurgulf.com/magazine-digital/vol-8-issue-8-oman.html#features/19">Edit</a>
                                    <a href="?delete=31&page=1" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?');">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                                    <div class="col-md-4 mb-4">
                        <div class="card shadow">
                            <img src="../uploads/gallery/6a5f51d737a90-moh1.png" class="card-img-top" alt="Promotion Announcement" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">Promotion Announcement</h5>
                                <p class="card-text">We are pleased to announce the promotion of Mr. Mohammed Mal Allah Ramadhan Al Balushi to HR &amp; Administration Manager at JM International SPC, effective June 10, 2026. Please join us in congratulating him on this well-deserved achievement.</p>
                                <p class="card-text text-muted small">Uploaded on: 2026-07-21 16:32</p>
                                <div class="d-flex justify-content-between">
                                    <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#imageModal" data-src="../uploads/gallery/6a5f51d737a90-moh1.png" data-title="Promotion Announcement">View</a>
                                    <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-id="30" data-title="Promotion Announcement" data-description="We are pleased to announce the promotion of Mr. Mohammed Mal Allah Ramadhan Al Balushi to HR &amp; Administration Manager at JM International SPC, effective June 10, 2026. Please join us in congratulating him on this well-deserved achievement.">Edit</a>
                                    <a href="?delete=30&page=1" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?');">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                                    <div class="col-md-4 mb-4">
                        <div class="card shadow">
                            <img src="../uploads/gallery/69f749c030077-Untitled.png" class="card-img-top" alt="Recognized for HR Excellence &amp; Talent Development" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">Recognized for HR Excellence &amp; Talent Development</h5>
                                <p class="card-text">We are honored to be highlighted by Oman Malayali Directory for contributions in HR consultancy and supporting youth career pathways across Oman.
Read more: https://oman.malayali.directory/special-page/jessy-mathew/</p>
                                <p class="card-text text-muted small">Uploaded on: 2026-05-03 18:42</p>
                                <div class="d-flex justify-content-between">
                                    <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#imageModal" data-src="../uploads/gallery/69f749c030077-Untitled.png" data-title="Recognized for HR Excellence &amp; Talent Development">View</a>
                                    <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-id="27" data-title="Recognized for HR Excellence &amp; Talent Development" data-description="We are honored to be highlighted by Oman Malayali Directory for contributions in HR consultancy and supporting youth career pathways across Oman.
Read more: https://oman.malayali.directory/special-page/jessy-mathew/">Edit</a>
                                    <a href="?delete=27&page=1" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?');">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                                    <div class="col-md-4 mb-4">
                        <div class="card shadow">
                            <img src="../uploads/gallery/698c3aa975716-Untitled.png" class="card-img-top" alt="Driving Impact Through Public-Private Partnerships (PPPs)" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">Driving Impact Through Public-Private Partnerships (PPPs)</h5>
                                <p class="card-text">An insightful session about “Making PPPs Work: Regional Models, Local Opportunities” explored how PPP frameworks can deliver sustainable value, while being aligned with Oman Vision 2040. </p>
                                <p class="card-text text-muted small">Uploaded on: 2026-02-11 13:45</p>
                                <div class="d-flex justify-content-between">
                                    <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#imageModal" data-src="../uploads/gallery/698c3aa975716-Untitled.png" data-title="Driving Impact Through Public-Private Partnerships (PPPs)">View</a>
                                    <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-id="26" data-title="Driving Impact Through Public-Private Partnerships (PPPs)" data-description="An insightful session about “Making PPPs Work: Regional Models, Local Opportunities” explored how PPP frameworks can deliver sustainable value, while being aligned with Oman Vision 2040. ">Edit</a>
                                    <a href="?delete=26&page=1" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?');">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                                    <div class="col-md-4 mb-4">
                        <div class="card shadow">
                            <img src="../uploads/gallery/697097a8ef477-1766169360565.jpg" class="card-img-top" alt="Celebrating Contributions to Youth Leadership" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">Celebrating Contributions to Youth Leadership</h5>
                                <p class="card-text">Recognized for meaningful contributions to the Oman Catholic Youth Retreat 2025, celebrating efforts in faith-building and leadership.</p>
                                <p class="card-text text-muted small">Uploaded on: 2026-01-21 14:38</p>
                                <div class="d-flex justify-content-between">
                                    <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#imageModal" data-src="../uploads/gallery/697097a8ef477-1766169360565.jpg" data-title="Celebrating Contributions to Youth Leadership">View</a>
                                    <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-id="25" data-title="Celebrating Contributions to Youth Leadership" data-description="Recognized for meaningful contributions to the Oman Catholic Youth Retreat 2025, celebrating efforts in faith-building and leadership.">Edit</a>
                                    <a href="?delete=25&page=1" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?');">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                                    <div class="col-md-4 mb-4">
                        <div class="card shadow">
                            <img src="../uploads/gallery/690aeb07d31a2-Untitled.jpg" class="card-img-top" alt="Business, Bites &amp; Great Conversations | Oman American Business Council" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">Business, Bites &amp; Great Conversations | Oman American Business Council</h5>
                                <p class="card-text">Fostering meaningful business connections and cross-sector collaboration that drive growth and innovation in Oman’s dynamic economy.</p>
                                <p class="card-text text-muted small">Uploaded on: 2025-11-05 11:43</p>
                                <div class="d-flex justify-content-between">
                                    <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#imageModal" data-src="../uploads/gallery/690aeb07d31a2-Untitled.jpg" data-title="Business, Bites &amp; Great Conversations | Oman American Business Council">View</a>
                                    <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-id="22" data-title="Business, Bites &amp; Great Conversations | Oman American Business Council" data-description="Fostering meaningful business connections and cross-sector collaboration that drive growth and innovation in Oman’s dynamic economy.">Edit</a>
                                    <a href="?delete=22&page=1" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?');">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                                    <div class="col-md-4 mb-4">
                        <div class="card shadow">
                            <img src="../uploads/gallery/690ae9c1a50fc-sts1.jpg" class="card-img-top" alt="Be the Change - Your Work, Your Faith, Your Future" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">Be the Change - Your Work, Your Faith, Your Future</h5>
                                <p class="card-text">Inspiring over 250 young people to lead with faith, integrity, and purpose, thus creating ripple effects of positive change in their communities.</p>
                                <p class="card-text text-muted small">Uploaded on: 2025-11-05 11:38</p>
                                <div class="d-flex justify-content-between">
                                    <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#imageModal" data-src="../uploads/gallery/690ae9c1a50fc-sts1.jpg" data-title="Be the Change - Your Work, Your Faith, Your Future">View</a>
                                    <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-id="21" data-title="Be the Change - Your Work, Your Faith, Your Future" data-description="Inspiring over 250 young people to lead with faith, integrity, and purpose, thus creating ripple effects of positive change in their communities.">Edit</a>
                                    <a href="?delete=21&page=1" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?');">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                                    <div class="col-md-4 mb-4">
                        <div class="card shadow">
                            <img src="../uploads/gallery/690ae9a2ecaea-gu3.jpg" class="card-img-top" alt="The Power of Social Media in Career Building | GUtech" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">The Power of Social Media in Career Building | GUtech</h5>
                                <p class="card-text">Empowering students to leverage digital platforms strategically and enhance their employability in a competitive market.</p>
                                <p class="card-text text-muted small">Uploaded on: 2025-11-05 11:37</p>
                                <div class="d-flex justify-content-between">
                                    <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#imageModal" data-src="../uploads/gallery/690ae9a2ecaea-gu3.jpg" data-title="The Power of Social Media in Career Building | GUtech">View</a>
                                    <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-id="20" data-title="The Power of Social Media in Career Building | GUtech" data-description="Empowering students to leverage digital platforms strategically and enhance their employability in a competitive market.">Edit</a>
                                    <a href="?delete=20&page=1" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?');">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                                    <div class="col-md-4 mb-4">
                        <div class="card shadow">
                            <img src="../uploads/gallery/690ae97f42988-event1.jpg" class="card-img-top" alt="Empowering Through Learning | Building Skills for Tomorrow" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">Empowering Through Learning | Building Skills for Tomorrow</h5>
                                <p class="card-text">Driving real-world growth by equipping professionals with the skills, confidence, and curiosity to achieve lasting success.</p>
                                <p class="card-text text-muted small">Uploaded on: 2025-11-05 11:36</p>
                                <div class="d-flex justify-content-between">
                                    <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#imageModal" data-src="../uploads/gallery/690ae97f42988-event1.jpg" data-title="Empowering Through Learning | Building Skills for Tomorrow">View</a>
                                    <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-id="19" data-title="Empowering Through Learning | Building Skills for Tomorrow" data-description="Driving real-world growth by equipping professionals with the skills, confidence, and curiosity to achieve lasting success.">Edit</a>
                                    <a href="?delete=19&page=1" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?');">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                                            </div>

            <!-- Pagination -->
                            <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                                                    <li class="page-item active">
                                <a class="page-link" href="?page=1">1</a>
                            </li>
                                                    <li class="page-item ">
                                <a class="page-link" href="?page=2">2</a>
                            </li>
                                            </ul>
                </nav>
                    </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p class="mb-0">&copy; 2026 JM International SPC. All rights reserved.</p>
        </div>
    </footer>

    <!-- Image View Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="" id="modalImage" class="img-fluid" alt="Image Preview">
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Image Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="editForm">
                        <input type="hidden" name="id" id="editId">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" id="editTitle" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" id="editDescription" class="form-control" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Image Upload Preview
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.querySelector('input[name="image"]');
            const previewDiv = document.getElementById('imagePreview');
            const previewImg = document.getElementById('previewImg');

            imageInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.addEventListener('load', function() {
                        previewImg.src = reader.result;
                        previewDiv.style.display = 'block';
                    });
                    reader.readAsDataURL(file);
                } else {
                    previewDiv.style.display = 'none';
                }
            });

            // Image View Modal
            const imageModal = document.getElementById('imageModal');
            imageModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const src = button.getAttribute('data-src');
                const title = button.getAttribute('data-title');
                const modalImage = imageModal.querySelector('#modalImage');
                const modalTitle = imageModal.querySelector('#imageModalLabel');
                modalImage.src = src;
                modalTitle.textContent = title;
            });

            // Edit Modal
            const editModal = document.getElementById('editModal');
            editModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const id = button.getAttribute('data-id');
                const title = button.getAttribute('data-title');
                const description = button.getAttribute('data-description');
                const editId = editModal.querySelector('#editId');
                const editTitle = editModal.querySelector('#editTitle');
                const editDescription = editModal.querySelector('#editDescription');
                editId.value = id;
                editTitle.value = title;
                editDescription.value = description;
            });
        });
    </script>
</body>
</html>