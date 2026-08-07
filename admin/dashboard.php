<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - JM International SPC</title>
    <link rel="shortcut icon" type="image/png" href="../images/logo.png?v=2">
    <link rel="icon" type="image/png" href="../images/logo.png?v=2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.min.js"></script>
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
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        transition: transform 0.3s;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .icon-box {
        text-align: center;
        padding: 20px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    .icon-box:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.15);
    }
    .icon-box i {
        font-size: 2.5rem;
        color: #1e293b;
        margin-bottom: 10px;
    }
    .icon-box h5 {
        margin: 0;
        font-size: 1.1rem;
        font-weight: 500;
        color: #1e293b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .icon-box a {
        text-decoration: none;
        color: inherit;
        display: block;
        padding: 10px 0;
        transition: color 0.3s ease;
    }
    .icon-box a:hover {
        color: #3b82f6;
    }
    .chart-container {
        background: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        margin-bottom: 20px;
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
            <li class="nav-item active">
                <a href="dashboard.php"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="applications_list.php"><i class="fas fa-globe"></i> Received Applications</a>
            </li>
            <li class="nav-item">
                <a href="applications_list_rd.php"><i class="fas fa-globe"></i> Resume Drop Off </a>
            </li>
            <li class="nav-item">
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
            
                                    <h3 class="text-center mb-4">Admin Dashboard</h3>
                                    

            <!-- Menu Icons -->
            <!-- Menu Icons -->
<div class="row mb-4">
    <div class="col-md-3">
        <div class="icon-box">
            <i class="fas fa-globe"></i>
            <h5><a href="applications_list.php">Received Applications</a></h5>
        </div>
    </div>
    <div class="col-md-3">
        <div class="icon-box">
            <i class="fas fa-globe"></i>
            <h5><a href="applications_list_rd.php"> Resume Drop Off </a></h5>
        </div>
    </div>
    <div class="col-md-3">
        <div class="icon-box">
            <i class="fas fa-images"></i>
            <h5><a href="gallery.php">Gallery</a></h5>
        </div>
    </div>
    <div class="col-md-3">
        <div class="icon-box">
            <i class="fas fa-briefcase"></i>
            <h5><a href="jobs_admin.php">Job</a></h5>
        </div>
    </div>
    
</div>
<div class="row mb-4">
    <div class="col-md-3">
        <div class="icon-box">
            <i class="fas fa-calendar-alt"></i>
            <h5><a href="admin-events.html">Event</a></h5>
        </div>
    </div>
    <div class="col-md-3">
        <div class="icon-box">
            <i class="fas fa-envelope"></i>
            <h5><a href="messages.php">Message</a></h5>
        </div>
    </div>
    <div class="col-md-3">
        <div class="icon-box">
            <i class="fas fa-users"></i>
            <h5><a href="clients.php">Client</a></h5>
        </div>
    </div>
    <div class="col-md-3">
        <div class="icon-box">
            <i class="fas fa-chart-line"></i>
            <h5><a href="https://analytics.google.com/analytics/web/" target="_blank">Business Analytics</a></h5>
        </div>
    </div>
</div>

<div class="row mb-4">
    </div>

<div class="row mb-4">
    </div>

            <!-- Analytics Cards -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card p-3">
                        <h5>Total Jobs</h5>
                        <h3>24</h3>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-3">
                        <h5>Active Jobs</h5>
                        <h3>16</h3>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-3">
                        <h5>Inactive Jobs</h5>
                        <h3>8</h3>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-3">
                        <h5>Total Applications</h5>
                        <h3>261</h3>
                    </div>
                </div>
            </div>
            
            
            

            <!-- Active Jobs Table -->
            <div class="chart-container">
                <h5>Active Job Postings</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Job ID</th>
                            <th>Position</th>
                            <th>Company</th>
                            <th>Location</th>
                            <th>Applications</th>
                        </tr>
                    </thead>
                    <tbody>
                                                    <tr>
                                <td>21</td>
                                <td>Omani Graduate Trainees</td>
                                <td>---</td>
                                <td>---</td>
                                <td><a href="applications_list.php?job_id=21">29</a></td>
                            </tr>
                                                    <tr>
                                <td>22</td>
                                <td>Project Manager for GP Project</td>
                                <td>Leading Organization in Oman</td>
                                <td>Oman</td>
                                <td><a href="applications_list.php?job_id=22">9</a></td>
                            </tr>
                                                    <tr>
                                <td>23</td>
                                <td>Multiple - Omani Nationals only</td>
                                <td>Leading Oil &amp; Gas Construction Company</td>
                                <td>Oman</td>
                                <td><a href="applications_list.php?job_id=23">10</a></td>
                            </tr>
                                                    <tr>
                                <td>26</td>
                                <td>AI Expert &amp; Consultant</td>
                                <td>Leading Technology Company</td>
                                <td>Rusayl, Oman</td>
                                <td><a href="applications_list.php?job_id=26">2</a></td>
                            </tr>
                                                    <tr>
                                <td>27</td>
                                <td>Investment Director</td>
                                <td>Global Intelligence &amp; Investment Office</td>
                                <td>Oman</td>
                                <td><a href="applications_list.php?job_id=27">1</a></td>
                            </tr>
                                                    <tr>
                                <td>29</td>
                                <td>AI Quality Engineer</td>
                                <td>Leading Technology Company</td>
                                <td>Rusayl, Oman</td>
                                <td><a href="applications_list.php?job_id=29">5</a></td>
                            </tr>
                                                    <tr>
                                <td>31</td>
                                <td>Testing &amp; Commissioning Engineer</td>
                                <td>Leading engineering organization in Oman</td>
                                <td>Oman</td>
                                <td><a href="applications_list.php?job_id=31">6</a></td>
                            </tr>
                                                    <tr>
                                <td>32</td>
                                <td>Power &amp; Substation Professionals</td>
                                <td>Leading engineering organization in Oman</td>
                                <td>Oman</td>
                                <td><a href="applications_list.php?job_id=32">5</a></td>
                            </tr>
                                                    <tr>
                                <td>35</td>
                                <td>Head of Events &amp; Communications</td>
                                <td>A leading business organization in Oman</td>
                                <td>Muscat</td>
                                <td><a href="applications_list.php?job_id=35">8</a></td>
                            </tr>
                                                    <tr>
                                <td>36</td>
                                <td>Various</td>
                                <td>Leading poultry company in Oman</td>
                                <td>Oman</td>
                                <td><a href="applications_list.php?job_id=36">61</a></td>
                            </tr>
                                                    <tr>
                                <td>40</td>
                                <td>Various Technical</td>
                                <td>Leading automobile company</td>
                                <td>Oman</td>
                                <td><a href="applications_list.php?job_id=40">7</a></td>
                            </tr>
                                                    <tr>
                                <td>41</td>
                                <td>Event &amp; Sponsorship Manager</td>
                                <td>Leading non-profit organization</td>
                                <td>Muscat</td>
                                <td><a href="applications_list.php?job_id=41">8</a></td>
                            </tr>
                                                    <tr>
                                <td>42</td>
                                <td>FMCG Roles - Multiple Positions</td>
                                <td>Leading FMCG company in Muscat</td>
                                <td>Muscat</td>
                                <td><a href="applications_list.php?job_id=42">15</a></td>
                            </tr>
                                                    <tr>
                                <td>43</td>
                                <td>Assistant Finance Manager</td>
                                <td>Leading organization in Oman</td>
                                <td>Oman</td>
                                <td><a href="applications_list.php?job_id=43">15</a></td>
                            </tr>
                                                    <tr>
                                <td>44</td>
                                <td>HR &amp; Learning and Development Executive</td>
                                <td>Leading luxury resort in Jebel Akhdar</td>
                                <td>Jebel Akhdar, Oman</td>
                                <td><a href="applications_list.php?job_id=44">10</a></td>
                            </tr>
                                                    <tr>
                                <td>45</td>
                                <td>Sales &amp; Marketing Executives - Steel Industry</td>
                                <td>Leading steel manufacturing company in the UAE</td>
                                <td>UAE</td>
                                <td><a href="applications_list.php?job_id=45">1</a></td>
                            </tr>
                                            </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p class="mb-0">&copy; 2026 JM International SPC. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Month-wise Job Postings Chart
        const monthWiseCtx = document.getElementById('monthWiseChart').getContext('2d');
        new Chart(monthWiseCtx, {
            type: 'bar',
            data: {
                labels: ["2025-12","2026-01","2026-03","2026-05","2026-06"],
                datasets: [{
                    label: 'Jobs Posted',
                    data: ["12","1","6","3","2"],
                    backgroundColor: 'rgba(26, 42, 68, 0.8)',
                    borderColor: 'rgba(26, 42, 68, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true },
                    x: { title: { display: true, text: 'Month' } }
                },
                plugins: {
                    legend: { display: false }
                }
            }
        });

        // Top 10 Jobs by Applications Chart
        const topJobsCtx = document.getElementById('topJobsChart').getContext('2d');
        new Chart(topJobsCtx, {
            type: 'bar',
            data: {
                labels: ["Various","Omani Graduate Trainees","FMCG Roles - Multiple Positions","Assistant Finance Manager","Multiple - Omani Nationals only","HR & Learning and Development Executive","Project Manager for GP Project","Event & Sponsorship Manager","Head of Events & Communications","Various Technical"],
                datasets: [{
                    label: 'Applications',
                    data: ["61","29","15","15","10","10","9","8","8","7"],
                    backgroundColor: 'rgba(52, 152, 219, 0.8)',
                    borderColor: 'rgba(52, 152, 219, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true },
                    x: { title: { display: true, text: 'Job Position' } }
                },
                plugins: {
                    legend: { display: false }
                }
            }
        });
    </script>
</body>
</html>