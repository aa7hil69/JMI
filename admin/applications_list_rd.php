<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Applications - JM International SPC</title>
    <link rel="shortcut icon" type="image/png" href="../images/logo.png?v=2">
    <link rel="icon" type="image/png" href="../images/logo.png?v=2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
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
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }
        .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .modal-content {
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .modal-header {
            background: #3b82f6;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .modal-body {
            padding: 0;
        }
        .resume-iframe {
            width: 100%;
            height: 70vh;
            border: none;
        }
        .modal-footer {
            padding: 10px 20px;
        }
        .modal-footer .btn {
            margin: 0 5px;
        }
        .table thead th {
            background: #1e293b;
            color: white;
        }
        .filter-form {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
            <li class="nav-item active">
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
            <h3 class="text-center mb-4">Received Resumes by Resume Drop off</h3>

            <!-- Filter Form (only requested fields) -->
            <div class="card shadow mb-5">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Filter Resumes</h3>
                </div>
                <div class="card-body">
                    <form method="GET" class="filter-form">
                        <div class="row">
                            <div class="col-md-3 form-group mb-3">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="">
                            </div>
                            <div class="col-md-3 form-group mb-3">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="">
                            </div>
                            <div class="col-md-3 form-group mb-3">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="">
                            </div>
                            <div class="col-md-3 form-group mb-3">
                                <label for="from_date">From Date</label>
                                <input type="date" class="form-control" id="from_date" name="from_date" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 form-group mb-3">
                                <label for="to_date">To Date</label>
                                <input type="date" class="form-control" id="to_date" name="to_date" value="">
                            </div>
                            <div class="col-md-3 form-group align-self-end mb-3">
                                <button type="submit" class="btn btn-primary">Apply Filters</button>
                                <a href="/admin/applications_list_rd.php" class="btn btn-secondary ms-2">Reset</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Applications Table (only requested columns) -->
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Received Resumes by Resume Drop off </h3>
                </div>
                <div class="card-body">
                    <table id="applicationsTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Applicant Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Resume Submitted Date</th>
                                <th>Resume</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>Thejusmg </td><td>99858539</td><td>thejusmg@gmail.com</td><td>2025-12-03 12:50:18</td><td>No Resume</td></tr><tr><td>Chellamani</td><td>99420057</td><td>chella99@gmail.com</td><td>2025-12-03 13:20:30</td><td>No Resume</td></tr><tr><td>Ramiz Arangad Kunhumohammed </td><td>00919447775779</td><td>ramiz_fca@akramiz.com</td><td>2025-12-03 14:05:19</td><td>No Resume</td></tr><tr><td>Parvathy V A</td><td>96879863171</td><td>parvathyvajayan@gmail.om</td><td>2025-12-03 14:45:39</td><td>No Resume</td></tr><tr><td>Meha vs</td><td>96879715102</td><td>mehavsstist95@gmail.com</td><td>2025-12-03 15:00:02</td><td>No Resume</td></tr><tr><td>Mohammed Ata Alshaer</td><td>201002633625</td><td>mohammedata871997@gmail.com</td><td>2025-12-03 15:46:56</td><td>No Resume</td></tr><tr><td>Mohammad Gouse Mohiyoddin </td><td>0096877305294</td><td>ghousey6k@gmail.com</td><td>2025-12-03 16:38:46</td><td>No Resume</td></tr><tr><td>Ajay Vijayagopalan</td><td>93927955</td><td>ajay.muscat@gmail.com</td><td>2025-12-03 18:20:10</td><td>No Resume</td></tr><tr><td>SHAIJU</td><td>919048533891</td><td>nandhanashaiju@gmail.com</td><td>2025-12-04 08:53:21</td><td>No Resume</td></tr><tr><td>Marwan</td><td>96240401</td><td>maroop3330@gmail.com</td><td>2025-12-04 13:52:57</td><td>No Resume</td></tr><tr><td>Zainab Mohammed Al Ajmi</td><td>96890110010</td><td>zainab3jmi@gmail.com</td><td>2025-12-04 14:21:33</td><td>No Resume</td></tr><tr><td>Idrees Albalushi </td><td>91161718</td><td>edrees.eh@gmail.com</td><td>2025-12-04 14:26:47</td><td>No Resume</td></tr><tr><td>Satheesh Chandran</td><td>0096895385593</td><td>satheeshc78@gmail.com</td><td>2025-12-04 17:44:44</td><td>No Resume</td></tr><tr><td>Ephrem Nigussie Wondie</td><td>251941125683</td><td>ephremnigussieepho@gmail.com</td><td>2025-12-05 14:19:00</td><td>No Resume</td></tr><tr><td>Zakaria Yahya Al Rumhi </td><td>96899385853</td><td>zak.rumhi@gmail.com</td><td>2025-12-05 23:41:49</td><td>No Resume</td></tr><tr><td>Jackline </td><td>254702604813</td><td>jacklineachieng65@gmail.com</td><td>2025-12-07 10:11:04</td><td>No Resume</td></tr><tr><td>Maryam Albalushi </td><td>95979422</td><td>maryamaalbulushi@gmail.com</td><td>2025-12-07 10:30:50</td><td>No Resume</td></tr><tr><td>Shahzad Ghani</td><td>96895304908</td><td>never172@gmail.com</td><td>2025-12-07 16:53:21</td><td>No Resume</td></tr><tr><td>Al Safa Al Kindi</td><td>96452533</td><td>alsafaaalkindi@gmail.com</td><td>2025-12-07 18:04:58</td><td>No Resume</td></tr><tr><td>Sammy</td><td>92980804</td><td>sammy.alshidhani.om@gmail.com</td><td>2025-12-07 21:31:01</td><td>No Resume</td></tr><tr><td>Razlan </td><td>98052466</td><td>razlan1691@gmail.com</td><td>2025-12-07 23:00:38</td><td>No Resume</td></tr><tr><td>Said Saud</td><td>98889184</td><td>saidalkhaify6@gmail.com</td><td>2025-12-08 09:08:58</td><td>No Resume</td></tr><tr><td>Vyshakh P</td><td>8593013966</td><td>Vyshakhpranavam123@gmail.com</td><td>2025-12-09 15:09:06</td><td>No Resume</td></tr><tr><td>Vyshakh P</td><td>8593013966</td><td>Vyshakhpranavam123@gmail.com</td><td>2025-12-09 15:09:13</td><td>No Resume</td></tr><tr><td>Mayookh P</td><td>919744765208</td><td>mayookhmachu@gmail.com</td><td>2025-12-09 20:54:56</td><td>No Resume</td></tr><tr><td>Mohsen moradi gourab </td><td>09119851912</td><td>mohsen.moradi985@gmail.com</td><td>2025-12-10 12:08:54</td><td>No Resume</td></tr><tr><td>Mohsen moradi gourab </td><td>09119851912</td><td>mohsen.moradi985@gmail.com</td><td>2025-12-10 12:10:03</td><td>No Resume</td></tr><tr><td>Shubham Madan</td><td>96771165</td><td>shubham.madan@zohomail.com</td><td>2025-12-12 12:53:56</td><td>No Resume</td></tr><tr><td>Vaishnavi sk</td><td>8129126968</td><td>vaishnavisk60@gmail.com</td><td>2025-12-12 14:13:13</td><td>No Resume</td></tr><tr><td>Infant Jeslin</td><td>9003780084</td><td>jeslininfant@gmail.com</td><td>2025-12-12 15:29:16</td><td>No Resume</td></tr><tr><td>Rawan Badar </td><td>99036242</td><td>rawanalraiisi11@gmail.com</td><td>2025-12-12 15:36:41</td><td>No Resume</td></tr><tr><td>Ahlam Zahor Said Al Rawahi</td><td>93298959</td><td>ahlamalrawahi18@gmail.com</td><td>2025-12-13 03:47:51</td><td>No Resume</td></tr><tr><td>Preeti Thampi</td><td>91214930</td><td>preetithampi@gmail.com</td><td>2025-12-13 20:13:56</td><td>No Resume</td></tr><tr><td>PRASHANTH VISHWANATH POOJARY</td><td>92037111</td><td>prashanthpoojary1003@gmail.com</td><td>2025-12-14 16:43:56</td><td>No Resume</td></tr><tr><td>Rawan </td><td>99036242</td><td>rawanalraiisi11@gmail.com</td><td>2025-12-15 13:17:14</td><td>No Resume</td></tr><tr><td>Bosky dutia</td><td>0096895113492</td><td>boskydutia@gmail.com</td><td>2025-12-15 16:26:26</td><td>No Resume</td></tr><tr><td>Bosky dutia</td><td>0096895113492</td><td>boskydutia@gmail.com</td><td>2025-12-15 17:15:54</td><td>No Resume</td></tr><tr><td>Santhosh John</td><td>919048143681</td><td>santhoshjohn7@yahoo.com</td><td>2025-12-16 07:46:49</td><td>No Resume</td></tr><tr><td>Ishfaq Beig</td><td>919797886529</td><td>beigishfaq123@gmail.com</td><td>2025-12-17 16:30:01</td><td>No Resume</td></tr><tr><td>M Zia</td><td>923220428685</td><td>zia.uppal87@gmail.com</td><td>2025-12-17 18:28:59</td><td>No Resume</td></tr><tr><td>Shamim Ahmad</td><td>00918877887725</td><td>shamim604@gmail.com</td><td>2025-12-19 21:38:04</td><td>No Resume</td></tr><tr><td>Manu Krishnan Pillai</td><td>0096899851344</td><td>manu.pillai02@gmail.com</td><td>2025-12-20 20:00:36</td><td>No Resume</td></tr><tr><td>Abdullah Al Busaidi </td><td>96899517121</td><td>abualayham73@gmail.com</td><td>2025-12-20 22:56:59</td><td>No Resume</td></tr><tr><td>Omar Baabbad</td><td>96897101202</td><td>omar.baabad@hotmail.com</td><td>2025-12-21 09:18:41</td><td>No Resume</td></tr><tr><td>Chaitanya Dhoyda</td><td>78782909</td><td>CHAITANYADHOYDA@GMAIL.COM</td><td>2025-12-21 11:31:00</td><td>No Resume</td></tr><tr><td>SINDHU</td><td>96899267175</td><td>sindhumuscat82@gmail.com</td><td>2025-12-21 12:26:55</td><td>No Resume</td></tr><tr><td>Vishnu Viswanathan </td><td>91224964</td><td>vishnuviswanathanr@yahoo.com</td><td>2025-12-21 15:12:05</td><td>No Resume</td></tr><tr><td>Zakaria Yahya Al Rumhi</td><td>99385853</td><td>zak.rumhi@gmail.com</td><td>2025-12-21 17:45:53</td><td>No Resume</td></tr><tr><td>SHAIJU C A</td><td>9048533891</td><td>Nandhanashaiju@gmail.com</td><td>2025-12-21 20:00:33</td><td>No Resume</td></tr><tr><td>Nisanth Venu</td><td>97099755</td><td>nvn006@gmail.com</td><td>2025-12-22 10:52:38</td><td>No Resume</td></tr><tr><td>Naresh kopela </td><td>919618170250</td><td>Nareshkopela822@gmail.com</td><td>2025-12-22 21:03:17</td><td>No Resume</td></tr><tr><td>Salman Kehinde Wasiu</td><td>96875062299</td><td>salmankehinde92@gmail.com</td><td>2025-12-27 15:18:30</td><td>No Resume</td></tr><tr><td>Jenu Lazar</td><td>96894747045</td><td>jenvismighty@gmail.com</td><td>2025-12-28 11:46:06</td><td>No Resume</td></tr><tr><td>Ahmed AlRumhi</td><td>99762660</td><td>ahmed-alrumhi@hotmail.com</td><td>2025-12-28 16:33:19</td><td>No Resume</td></tr><tr><td>Ibrahim Ragab Ibrahim </td><td>91968362</td><td>ebrahimragab314@yahoo.com</td><td>2025-12-28 20:44:09</td><td>No Resume</td></tr><tr><td>Maryam </td><td>0096894696898</td><td>msqu941@gmail.com</td><td>2025-12-29 08:56:10</td><td>No Resume</td></tr><tr><td>Dima koubily</td><td>963988157296</td><td>dkbely1992@gmail.com</td><td>2025-12-29 16:04:27</td><td>No Resume</td></tr><tr><td>Mahtab Alam</td><td>78613647</td><td>mahtab89alam@gmail.com</td><td>2025-12-29 17:45:29</td><td>No Resume</td></tr><tr><td>Ashvathaman </td><td>9444606186</td><td>yashvath24@gmail.com</td><td>2025-12-29 23:53:58</td><td>No Resume</td></tr><tr><td>Rizqy affrisramyraj</td><td>628113030892</td><td>affrisramyraj@gmail.com</td><td>2025-12-30 06:17:25</td><td>No Resume</td></tr><tr><td>Sara Talib Albalushi </td><td>94022047</td><td>salbolushi12@gmail.com</td><td>2025-12-30 07:49:56</td><td>No Resume</td></tr><tr><td>Sara Albalushi </td><td>94022047</td><td>salbolushi12@gmail.com</td><td>2025-12-30 15:20:13</td><td>No Resume</td></tr><tr><td>Abdullah nabil juma al blaushi  </td><td>9916055</td><td>abad.aabd777@gmail.com</td><td>2026-01-01 02:12:45</td><td>No Resume</td></tr><tr><td>Balaji kandheri </td><td>919444107024</td><td>balajinaiduk@gmail.com</td><td>2026-01-01 13:40:21</td><td>No Resume</td></tr><tr><td>Pragathi P Nair</td><td>97011346</td><td>pragathinair17@gmail.com</td><td>2026-01-01 19:33:24</td><td>No Resume</td></tr><tr><td>Abdullah nabil juma al blaushi  </td><td>9916055</td><td>abad.aabd777@gmail.com</td><td>2026-01-01 20:32:22</td><td>No Resume</td></tr><tr><td>mohammed yaqoob al balushi</td><td>99766983</td><td>hmooodalbulushi007@gmail.com</td><td>2026-01-08 11:49:56</td><td>No Resume</td></tr><tr><td>mohammed yaqoob al balushi</td><td>99766983</td><td>hmooodalbulushi007@gmail.com</td><td>2026-01-08 12:02:49</td><td>No Resume</td></tr><tr><td>Mohammed AL JABRI </td><td>93351411</td><td>M79111@gmail.com</td><td>2026-01-08 13:22:02</td><td>No Resume</td></tr><tr><td>Sara Albalushi </td><td>94022047</td><td>salbolushi12@gmail.com</td><td>2026-01-08 15:54:24</td><td>No Resume</td></tr><tr><td>Muthukkannan M Murugesan</td><td>7904111568</td><td>muthukkannan.m2@gmail.com</td><td>2026-01-09 20:41:05</td><td>No Resume</td></tr><tr><td>Masood Hussain</td><td>03335671031</td><td>rana.masud.vet@gmail.com</td><td>2026-01-09 20:53:10</td><td>No Resume</td></tr><tr><td>Naveen Muthumanickam</td><td>00919444814073</td><td>muthunaveen009@gmail.com</td><td>2026-01-09 22:26:02</td><td>No Resume</td></tr><tr><td>Lakshmana Rao Ummadi </td><td>7702949266</td><td>laxmnroyal225@gmail.com</td><td>2026-01-09 22:39:57</td><td>No Resume</td></tr><tr><td>Maryam Albalushi </td><td>95979422</td><td>maryamaalbulushi@gmail.com</td><td>2026-01-10 03:41:20</td><td>No Resume</td></tr><tr><td>Khurram Mr </td><td>922103222374534</td><td>khurrammeer25@gmail.com</td><td>2026-01-10 07:51:09</td><td>No Resume</td></tr><tr><td>Kavya Dehulia</td><td>919820447521</td><td>kavya.dehulia@gmail.com</td><td>2026-01-10 12:58:16</td><td>No Resume</td></tr><tr><td>Mohammed</td><td>77173791</td><td>mohammed9394@icloud.com</td><td>2026-01-10 13:01:53</td><td>No Resume</td></tr><tr><td>Faheem Iqbal </td><td>00923071666819</td><td>fahim_engr@hotmail.com</td><td>2026-01-11 18:19:33</td><td>No Resume</td></tr><tr><td>Mohammed</td><td>77173791</td><td>mohammed9394@icloud.com</td><td>2026-01-12 17:10:19</td><td>No Resume</td></tr><tr><td>Sharon Elizabeth Saju</td><td>08178483326</td><td>sharonsharon540@gmail.com</td><td>2026-01-12 18:37:48</td><td>No Resume</td></tr><tr><td>Fatma Mansoor Nasser Al Taie</td><td>99117081</td><td>fatmaaltaie@gmail.com</td><td>2026-01-13 05:17:18</td><td>No Resume</td></tr><tr><td>Sachin Thomas</td><td>96878992300</td><td>sachinthomas230@gmail.com</td><td>2026-01-13 12:41:03</td><td>No Resume</td></tr><tr><td>Shifa Sajid</td><td>96876002259</td><td>shifasajid11@gmail.com</td><td>2026-01-14 08:01:35</td><td>No Resume</td></tr><tr><td>Fatma Mansoor Nasser Al Taie</td><td>99117081</td><td>fatmaaltaie@gmail.com</td><td>2026-01-15 01:57:10</td><td>No Resume</td></tr><tr><td>Hrutwik Kulkarni</td><td>9834592351</td><td>khrutwik38@gmail.com</td><td>2026-01-20 10:02:23</td><td>No Resume</td></tr><tr><td>Elias V Prakash</td><td>99658238</td><td>prakashev1976@gmail.com</td><td>2026-01-20 20:10:46</td><td>No Resume</td></tr><tr><td>Mohammed Maqbool Al Balushi</td><td>94707656</td><td>maqdamham1@gmail.com</td><td>2026-01-20 20:41:09</td><td>No Resume</td></tr><tr><td>Bhailasree Sanalkumar</td><td>95580235</td><td>ila.bh2296@gmail.com</td><td>2026-01-21 19:19:53</td><td>No Resume</td></tr><tr><td>Andrio Savio Bruno Rodrigues</td><td>96877261006</td><td>andriorodricks@gmail.com</td><td>2026-01-21 21:25:41</td><td>No Resume</td></tr><tr><td>Adrian Ramirez </td><td>0927776547</td><td>rz.81ramirez@gmail.com</td><td>2026-01-25 07:54:44</td><td>No Resume</td></tr><tr><td>Laila </td><td>94452316</td><td>Lailaalbalushi123@gmail.com</td><td>2026-01-25 17:54:40</td><td>No Resume</td></tr><tr><td>Abdulnazar</td><td>8943442514</td><td>nazarkk196@gmail.com</td><td>2026-01-26 09:21:51</td><td>No Resume</td></tr><tr><td>Mohammed Nasser Alghaithi</td><td>95215977</td><td>malghaithy306@gmail.com</td><td>2026-01-26 13:06:44</td><td>No Resume</td></tr><tr><td>Hilal Humaid Alharthy</td><td>98808925</td><td>hilalalharthy0@gmail.com</td><td>2026-01-26 13:06:55</td><td>No Resume</td></tr><tr><td>Mohammed Nasser Alghaithi</td><td>95215977</td><td>malghaithy306@gmail.com</td><td>2026-01-26 17:14:09</td><td>No Resume</td></tr><tr><td>Rianna Lobo</td><td>93214836</td><td>loborianna@gmail.com</td><td>2026-01-26 18:22:45</td><td>No Resume</td></tr><tr><td>Hilal Humaid Alharthy</td><td>98808925</td><td>hilalalharthy0@gmail.com</td><td>2026-01-27 02:03:05</td><td>No Resume</td></tr><tr><td>Pragathi P Nair</td><td>97011346</td><td>pragathinair17@gmail.com</td><td>2026-01-27 11:56:50</td><td>No Resume</td></tr><tr><td>Shamsa Faisal albhantah</td><td>91971306</td><td>shamsaalbhantah@gmail.com</td><td>2026-01-27 14:26:22</td><td>No Resume</td></tr><tr><td>nabil Khan</td><td>96890655212</td><td>east_yorker@outlook.com</td><td>2026-01-27 21:00:23</td><td>No Resume</td></tr><tr><td>John S</td><td>99999999</td><td>johns@gmail.com</td><td>2026-01-27 21:56:47</td><td>No Resume</td></tr><tr><td>Kavya Jayan</td><td>94167997</td><td>kavya309197@gamil.com</td><td>2026-02-01 15:58:06</td><td>No Resume</td></tr><tr><td>Sinoy Ramath</td><td>96878480043</td><td>srk98447@gmail.com</td><td>2026-02-02 13:29:31</td><td>No Resume</td></tr><tr><td>sitaram majhi</td><td>96898835912</td><td>sitarammajhi@gmail.com</td><td>2026-02-03 06:29:41</td><td>No Resume</td></tr><tr><td>Toney Rajan</td><td>00918891995887</td><td>toneyrajan@live.com</td><td>2026-02-03 10:01:22</td><td>No Resume</td></tr><tr><td>Mahesh Solanki </td><td>9898312572</td><td>mahesh3485@yahoo.co.in</td><td>2026-02-04 09:55:51</td><td>No Resume</td></tr><tr><td>okusanya onotomiwa adebanjo</td><td>233507466621</td><td>tomabitravel@gmail.com</td><td>2026-02-04 17:59:14</td><td>No Resume</td></tr><tr><td>Senthilkumar Annamalai</td><td>919787000642</td><td>senthil1486@gmail.com</td><td>2026-02-08 18:04:25</td><td>No Resume</td></tr><tr><td>Steve Lobo </td><td>97858041</td><td>steve381993@gmail.com</td><td>2026-02-08 18:23:35</td><td>No Resume</td></tr><tr><td>Biju Kurup</td><td>98006226</td><td>itsbiju.vk@gmail.com</td><td>2026-02-10 13:49:03</td><td>No Resume</td></tr><tr><td>Esam Naser</td><td>00971551902575</td><td>esamlele1989@gmail.com</td><td>2026-02-10 14:42:23</td><td>No Resume</td></tr><tr><td>yeyrflfydw</td><td>+1-531-079-9696</td><td>ugmhqihz@checkyourform.xyz</td><td>2026-02-11 05:15:34</td><td>No Resume</td></tr><tr><td>Mohammad AaliMahmoudi</td><td>9352281922</td><td>m.aalimahmoudi@gmail.com</td><td>2026-02-11 15:12:31</td><td>No Resume</td></tr><tr><td>Ahlam Al Zadjali</td><td>93981161</td><td>dream_alzadjaal@hotmail.com</td><td>2026-02-12 15:55:16</td><td>No Resume</td></tr><tr><td>Sachin Thomas</td><td>78992300</td><td>sachinthomas230@gmail.com</td><td>2026-02-12 21:45:22</td><td>No Resume</td></tr><tr><td>Mohd Shanib</td><td>94620816</td><td>mshanib298@gmail.com</td><td>2026-02-13 00:34:13</td><td>No Resume</td></tr><tr><td>Arpan Sudhi</td><td>447915736061</td><td>sudhiarpan@gmail.com</td><td>2026-02-14 01:57:04</td><td>No Resume</td></tr><tr><td>Arpan Sudhi</td><td>7915736061</td><td>sudhiarpan.work@protonmail.com</td><td>2026-02-14 03:40:05</td><td>No Resume</td></tr><tr><td>Santhosh John</td><td>92991621</td><td>santhoshjohn7@yahoo.com</td><td>2026-02-23 23:35:19</td><td>No Resume</td></tr><tr><td>Musaab Al Shibli</td><td>71389938</td><td>Musaab.alshibli@gmail.com</td><td>2026-02-24 15:16:10</td><td>No Resume</td></tr><tr><td>Veerendra Palakurthi </td><td>966545173821</td><td>veerendra.palakurthi@gmail.com</td><td>2026-02-24 17:59:40</td><td>No Resume</td></tr><tr><td>Manju Ajayasankar</td><td>92203972</td><td>msmanjupillai@gmail.com</td><td>2026-02-24 18:41:46</td><td>No Resume</td></tr><tr><td>Mahesh Sen</td><td>7495020922</td><td>maheshsain4u@gmail.com</td><td>2026-02-25 20:17:40</td><td>No Resume</td></tr><tr><td>Tariq Ali Alraisi</td><td>95444455</td><td>tar.al.raisi@gmail.com</td><td>2026-02-25 21:50:37</td><td>No Resume</td></tr><tr><td>KUSHAL VERNEKAR</td><td>0096895430102</td><td>kushalvernekar5@gmail.com</td><td>2026-02-26 15:26:58</td><td>No Resume</td></tr><tr><td>Salim Al Habsi</td><td>95559953</td><td>salim.alhabsi.9329@gmail.com</td><td>2026-02-27 00:57:25</td><td>No Resume</td></tr><tr><td>Yagnesh Shukla</td><td>00919327931951</td><td>yagneshjshukla@hotmail.com</td><td>2026-02-28 11:00:09</td><td>No Resume</td></tr><tr><td>Test Resume</td><td>9447332469</td><td>TestEmail@gmail.com</td><td>2026-03-01 13:26:49</td><td>No Resume</td></tr><tr><td>TestResume For Check</td><td>9447332469</td><td>TestResume2@gmail.com</td><td>2026-03-01 13:48:03</td><td>No Resume</td></tr><tr><td>Mohammad emran shaikh </td><td>78855591</td><td>emranshaikh177@gmail.com</td><td>2026-03-02 18:02:10</td><td>No Resume</td></tr><tr><td>Mohammad emran shaikh </td><td>78855591</td><td>emranshaikh177@gmail.com</td><td>2026-03-02 19:10:41</td><td>No Resume</td></tr><tr><td>Abdur Rafay</td><td>95140479</td><td>rafaymirza1905@gmail.com</td><td>2026-03-04 16:59:44</td><td>No Resume</td></tr><tr><td>Kadimi Mani Kanta</td><td>09490375823</td><td>Kmanikanta947@gmail.com</td><td>2026-03-04 21:37:27</td><td>No Resume</td></tr><tr><td>Abdelrahman Sherif</td><td>01064312966</td><td>abdowagih800@gmail.com</td><td>2026-03-04 23:24:16</td><td>No Resume</td></tr><tr><td>Inzmam Ul Haque</td><td>79035303039</td><td>inzmamkhan77@gmail.com</td><td>2026-03-05 13:06:27</td><td>No Resume</td></tr><tr><td>Mihir Mohan Barshikar</td><td>79085480</td><td>barshikarmihir@gmail.com</td><td>2026-03-06 18:49:02</td><td>No Resume</td></tr><tr><td>Yaseen </td><td>95272107</td><td>ironoman12@gmail.com</td><td>2026-03-08 14:48:15</td><td>No Resume</td></tr><tr><td>Yaseen </td><td>95272107</td><td>ironoman12@gmail.com</td><td>2026-03-08 19:57:14</td><td>No Resume</td></tr><tr><td>Sachin T Thomas</td><td>78992300</td><td>sachinthomas230@gmail.com</td><td>2026-03-09 01:02:56</td><td>No Resume</td></tr><tr><td>Rahat Mobeen</td><td>03089009985</td><td>rahatmobeen.533@gmail.com</td><td>2026-03-11 16:00:23</td><td>No Resume</td></tr><tr><td>Khizar Hayat</td><td>923049538823</td><td>uafkhizar@gmail.com</td><td>2026-03-11 22:18:55</td><td>No Resume</td></tr><tr><td>Anil Singh Tanwar</td><td>00919896666076</td><td>aniltanwar143@gmail.com</td><td>2026-03-12 05:54:38</td><td>No Resume</td></tr><tr><td>Nauman ijaz</td><td>971564675781</td><td>nomi481@icloud.com</td><td>2026-03-12 07:49:02</td><td>No Resume</td></tr><tr><td>Muhammad Shafiq UR Rehman</td><td>923026837621</td><td>malikshafiqmzg@gmail.com</td><td>2026-03-12 10:18:25</td><td>No Resume</td></tr><tr><td>test</td><td>123456789</td><td>test@gmail.com</td><td>2026-03-12 17:14:51</td><td>No Resume</td></tr><tr><td>Needa Mulla</td><td>96877431207</td><td>nidammulla@gmail.com</td><td>2026-03-14 17:07:23</td><td>No Resume</td></tr><tr><td>Fahad Salim albrashdi </td><td>97447661</td><td>fahadsalim493@gmail.com</td><td>2026-03-15 13:16:03</td><td>No Resume</td></tr><tr><td>Fahad Salim albrashdi </td><td>97447661</td><td>fahadsalim493@gmail.com</td><td>2026-03-15 22:59:48</td><td>No Resume</td></tr><tr><td>Moustafa Ramdhane MEZIANE </td><td>00221782940386</td><td>meziane.moustafa@gmail.com</td><td>2026-03-16 17:39:49</td><td>No Resume</td></tr><tr><td>Abdulrahman Alhashmi </td><td>95418330</td><td>alhashmiabdulrahman96@gmail.com</td><td>2026-03-22 01:19:14</td><td>No Resume</td></tr><tr><td>Stalan Varghese Mathew</td><td>92483780</td><td>stalanvmkas7@gmail.com</td><td>2026-03-24 16:58:13</td><td>No Resume</td></tr><tr><td>Mohamed Gamal Aldin Mostafa Alkhamisy </td><td>00966532859005</td><td>Mohamed_elkhamissi@yahoo.com</td><td>2026-04-01 00:34:21</td><td>No Resume</td></tr><tr><td>Joud Alzarei </td><td>97701913</td><td>Joudalzareii@gmail.com</td><td>2026-04-02 13:58:18</td><td>No Resume</td></tr><tr><td>Rajagopal Suresh</td><td>96895221996</td><td>suresh_rajagopal@hotmail.com</td><td>2026-04-02 21:07:37</td><td>No Resume</td></tr><tr><td>Meersha Jafar</td><td>917994648660</td><td>meershajafar@gmail.com</td><td>2026-04-07 17:07:05</td><td>No Resume</td></tr><tr><td>Roshan Mathew Abraham</td><td>6282149240</td><td>thefallenshallriseagain12345@gmail.com</td><td>2026-04-07 17:32:28</td><td>No Resume</td></tr><tr><td>Mohamed Marzouk</td><td>201005169692</td><td>radilogy.ns@gmail.com</td><td>2026-04-08 03:54:16</td><td>No Resume</td></tr><tr><td>Muhammad Ibrahim Qasim</td><td>00966539148083</td><td>miqasim111@gmail.com</td><td>2026-04-12 14:04:20</td><td>No Resume</td></tr><tr><td>Joyens</td><td>9494286600</td><td>joyens.vet@gmail.com</td><td>2026-04-12 19:26:28</td><td>No Resume</td></tr><tr><td>Muhammad Abbas</td><td>03067193653</td><td>mianabbas96@gmail.com</td><td>2026-04-12 21:27:45</td><td>No Resume</td></tr><tr><td>MOHAMMAD ISHAQ</td><td>00923335068894</td><td>dmishaq@hotmail.con</td><td>2026-04-12 22:40:20</td><td>No Resume</td></tr><tr><td>Reem Al Sinani</td><td>93938749</td><td>reem.al5sinani@gmail.com</td><td>2026-04-12 23:18:48</td><td>No Resume</td></tr><tr><td>Samah Abdulrahman Elrade Elhaj </td><td>00966570628654</td><td>samahelradi7171@gmail.com</td><td>2026-04-13 12:30:22</td><td>No Resume</td></tr><tr><td>Samah Abdulrahman Elrade Elhaj </td><td>00966570628654</td><td>samahelradi7171@gmail.com</td><td>2026-04-13 12:31:52</td><td>No Resume</td></tr><tr><td>Aashir Naeem</td><td>03083825933</td><td>ashirnaeem929@gmail.com</td><td>2026-04-13 12:44:08</td><td>No Resume</td></tr><tr><td>Usman Nasir</td><td>923226508410</td><td>usmannasir155@gmail.com</td><td>2026-04-13 23:35:11</td><td>No Resume</td></tr><tr><td>Waleed w  ismaeel</td><td>00962780889648</td><td>wismaeel254@gmail.com</td><td>2026-04-14 00:20:56</td><td>No Resume</td></tr><tr><td>eliyas m</td><td>7200925101</td><td>eliyas089@gmail.com</td><td>2026-04-14 06:13:26</td><td>No Resume</td></tr><tr><td>Khaled Mohamed</td><td>967779666307</td><td>khaled.mahmoud@sarvetpoultry.com</td><td>2026-04-14 10:41:01</td><td>No Resume</td></tr><tr><td>Gomaa Yakout Ahmed Elhaddad </td><td>00201006193078</td><td>gomaaelhaddad@gmail.com</td><td>2026-04-14 15:08:24</td><td>No Resume</td></tr><tr><td>Mudassar Ehsan Chattha</td><td>07947826124</td><td>chatthaa123@gmail.com</td><td>2026-04-15 04:38:44</td><td>No Resume</td></tr><tr><td>Mudassar Ehsan Chattha</td><td>07947826124</td><td>chatthaa123@gmail.com</td><td>2026-04-15 04:39:08</td><td>No Resume</td></tr><tr><td>Talha Ahmad</td><td>00923318624142</td><td>drmianahm@gmail.com</td><td>2026-04-15 11:37:50</td><td>No Resume</td></tr><tr><td>Tauqir Abbas</td><td>0097431429419</td><td>tauqir.abbas@yahoo.com</td><td>2026-04-16 10:51:13</td><td>No Resume</td></tr><tr><td>Abubakar yahuza kurami</td><td>966562860691</td><td>yahuzakuramiabubakar@gmail.com</td><td>2026-04-16 14:08:04</td><td>No Resume</td></tr><tr><td>Ramy Lasheen </td><td>00971585877622</td><td>m10_ramy@hotmail.com</td><td>2026-04-17 18:30:41</td><td>No Resume</td></tr><tr><td>Kasirajan</td><td>96069840</td><td>rajankasi6@gmail.com</td><td>2026-04-17 21:28:52</td><td>No Resume</td></tr><tr><td>Dr Muhammad Saleem</td><td>966566828798</td><td>saleemdr6@gmail.com</td><td>2026-04-18 00:58:36</td><td>No Resume</td></tr><tr><td>SHAMIL M R</td><td>6005163772</td><td>Shamillulu1996@gmail.com</td><td>2026-04-18 10:34:29</td><td>No Resume</td></tr><tr><td>SHAMIL M R</td><td>6005163772</td><td>Shamillulu1996@gmail.com</td><td>2026-04-18 10:34:48</td><td>No Resume</td></tr><tr><td>Ali zanaty </td><td>01060861246</td><td>alizanaty828@gmail.com</td><td>2026-04-19 17:48:55</td><td>No Resume</td></tr><tr><td>ali zanaty</td><td>01060861246</td><td>alizanaty828@gmail.com</td><td>2026-04-19 17:49:33</td><td>No Resume</td></tr><tr><td>Ahmed Mohammed</td><td>92412896</td><td>ahmed.sac77@gmail.com</td><td>2026-04-19 23:13:48</td><td>No Resume</td></tr><tr><td>ABDELKADER MGOUSSI</td><td>661737307</td><td>abdelkader.mgoussi03@gmail.com</td><td>2026-04-20 00:56:02</td><td>No Resume</td></tr><tr><td>ABDELKADER MGOUSSI</td><td>0661737307</td><td>abdelkader.mgoussi03@gmail.com</td><td>2026-04-20 00:57:31</td><td>No Resume</td></tr><tr><td>ABDELKADER MGOUSSI</td><td>0661737307</td><td>abdelkader.mgoussi03@gmail.com</td><td>2026-04-20 00:58:17</td><td>No Resume</td></tr><tr><td>Ian Tenebroso </td><td>97450782505</td><td>tenebroso_ian@yahoo.com</td><td>2026-04-20 08:50:48</td><td>No Resume</td></tr><tr><td>Mohamed Harraz </td><td>98280440</td><td>mharraz64@yahoo.com</td><td>2026-04-20 10:54:23</td><td>No Resume</td></tr><tr><td>Muhammad Uzair</td><td>00966501035809</td><td>muzair.24@gmail.com</td><td>2026-04-20 11:32:35</td><td>No Resume</td></tr><tr><td>Abdullah Al Busaidi</td><td>95335767</td><td>xxalbusaidi@gmail.com</td><td>2026-04-20 11:57:21</td><td>No Resume</td></tr><tr><td>BRIJESH KUMAR GUPTA </td><td>00966560342325</td><td>brijeshraaz8@gmail.com</td><td>2026-04-20 12:12:47</td><td>No Resume</td></tr><tr><td>Saud abdul majid</td><td>78558733</td><td>saudiisayyed98@gmail.com</td><td>2026-04-20 13:32:48</td><td>No Resume</td></tr><tr><td>Mahmood jamal almazroei</td><td>95363647</td><td>mahmoodalmaz190@gmail.com</td><td>2026-04-20 13:47:39</td><td>No Resume</td></tr><tr><td>Mohammed ALMaawali </td><td>79003090</td><td>m7.l7.47@gmail.com</td><td>2026-04-20 13:48:43</td><td>No Resume</td></tr><tr><td>Ammar Al Mahrouqi</td><td>77108977</td><td>amrmhrouqi@gmail.com</td><td>2026-04-20 13:51:44</td><td>No Resume</td></tr><tr><td>Kathiravan Karmegavannan selvi</td><td>965578715491</td><td>Kathir.ksk15@gmail.com</td><td>2026-04-20 15:14:43</td><td>No Resume</td></tr><tr><td>OLUWASEYI EMMANUEL FOLARANMI</td><td>95548216</td><td>dkenipx@gmail.com</td><td>2026-04-20 19:59:21</td><td>No Resume</td></tr><tr><td>Sandeep Kumar </td><td>9769525488</td><td>sandeep08051989@gmail.com</td><td>2026-04-20 20:33:12</td><td>No Resume</td></tr><tr><td>Vikram Singh</td><td>08302529591</td><td>vikramsingh.ssti@gmail.com</td><td>2026-04-21 06:48:36</td><td>No Resume</td></tr><tr><td>NIHAL KUMAR</td><td>91888774867</td><td>nihalsudarshan.1358@gmail.com</td><td>2026-04-21 09:18:19</td><td>No Resume</td></tr><tr><td>MABROOK AHMED SULAIMAN ALTALAI</td><td>96109700</td><td>975mabrook975@gmail.com</td><td>2026-04-21 10:46:08</td><td>No Resume</td></tr><tr><td>SIYAD MOIDEEN</td><td>9961663061</td><td>ersiyadmoideen@gmail.com</td><td>2026-04-21 11:35:06</td><td>No Resume</td></tr><tr><td>RAMACHANDRA MOHAN BHAT</td><td>98080649</td><td>rambhat71@hotmail.com</td><td>2026-04-21 12:57:49</td><td>No Resume</td></tr><tr><td>FERNANDO FERNANDO</td><td>4741295021</td><td>ipb.nando@gmail.com</td><td>2026-04-21 14:46:58</td><td>No Resume</td></tr><tr><td>Vikram Singh</td><td>08302529591</td><td>vikramsingh.ssti@gmail.com</td><td>2026-04-21 16:37:31</td><td>No Resume</td></tr><tr><td>Mulla Munawar</td><td>917989681196</td><td>abdulmunawar9@gmail.com</td><td>2026-04-21 17:06:20</td><td>No Resume</td></tr><tr><td>Kannan</td><td>78454754</td><td>karthikannancvl@gmail.com</td><td>2026-04-22 10:38:08</td><td>No Resume</td></tr><tr><td>Ashitha C</td><td>72092213</td><td>ashithac295@gmail.com</td><td>2026-04-22 11:51:39</td><td>No Resume</td></tr><tr><td>Dhanil Dharmarajan</td><td>0096894705758</td><td>dhanilunni@gmail.com</td><td>2026-04-22 14:45:51</td><td>No Resume</td></tr><tr><td>Dhanil Dharmarajan</td><td>0096894705758</td><td>dhanilunni@gmail.com</td><td>2026-04-22 14:46:28</td><td>No Resume</td></tr><tr><td>Younis Munir</td><td>96878412102</td><td>younassaeedi0@gmail.com</td><td>2026-04-23 08:02:07</td><td>No Resume</td></tr><tr><td>Loay Battash</td><td>99322068</td><td>loay5@hotmail.com</td><td>2026-04-23 12:14:54</td><td>No Resume</td></tr><tr><td>Mirza Gulam Hussain Mazindrani</td><td>0096871940248</td><td>mghmazindrani@yahoo.com</td><td>2026-04-23 21:45:17</td><td>No Resume</td></tr><tr><td>Mansoor Ahmed</td><td>96871313018</td><td>mansoor.asyed1988@gmail.com</td><td>2026-04-25 19:17:15</td><td>No Resume</td></tr><tr><td>Midhun Kumar S</td><td>9747671705</td><td>midhunkumarsj@gmail.com</td><td>2026-04-25 19:51:03</td><td>No Resume</td></tr><tr><td>Mithula P M</td><td>94566590</td><td>mithula.pm08@gmail.com</td><td>2026-04-25 20:32:24</td><td>No Resume</td></tr><tr><td>Sabir Hussain</td><td>78199556</td><td>sabirjan1214@gmail.com</td><td>2026-04-26 14:00:57</td><td>No Resume</td></tr><tr><td>Amarnadh Puppala</td><td>07747971884</td><td>amarnadhbadrinadh@gmail.com</td><td>2026-04-27 10:54:40</td><td>No Resume</td></tr><tr><td>Faiz Ahmad</td><td>00917899609270</td><td>faizahmed1999@gmail.com</td><td>2026-04-27 13:08:12</td><td>No Resume</td></tr><tr><td>Samarendra Tiwary</td><td>93208371</td><td>sntiwary2011@gmail.com</td><td>2026-05-03 10:37:45</td><td>No Resume</td></tr><tr><td>Varshal S Ullal</td><td>8105484559</td><td>varshalsullal@gmail.com</td><td>2026-05-04 20:10:59</td><td>No Resume</td></tr><tr><td>Humud Salim Al Sinawi</td><td>96891497615</td><td>humudalsinawi15@gmail.com</td><td>2026-05-04 22:03:53</td><td>No Resume</td></tr><tr><td>Gopakumar Gopala Krishna</td><td>971507632173</td><td>gopangkumar@hotmail.com</td><td>2026-05-06 11:00:54</td><td>No Resume</td></tr><tr><td>Muhammad Ihtisham Ali</td><td>00966551622374</td><td>khansham824@gmail.com</td><td>2026-05-06 12:17:58</td><td>No Resume</td></tr><tr><td>reshma </td><td>72642429</td><td>reshmasatish03@gmail.com</td><td>2026-05-06 13:43:58</td><td>No Resume</td></tr><tr><td>MUHAMMAD AAMIR HUSSAIN</td><td>966507471586</td><td>m.aamirh1976@gmail.com</td><td>2026-05-06 15:27:32</td><td>No Resume</td></tr><tr><td>Walid Badr</td><td>00201118766695</td><td>walidsbadr@gmail.com</td><td>2026-05-07 17:14:55</td><td>No Resume</td></tr><tr><td>Ahmed Ezzat Anas </td><td>201558882252</td><td>a.ezzat77@hotmail.com</td><td>2026-05-07 17:42:06</td><td>No Resume</td></tr><tr><td>Ahmed Ezzat Anas </td><td>00201558882252</td><td>a.ezzat77@hotmail.com</td><td>2026-05-07 23:11:24</td><td>No Resume</td></tr><tr><td>Prasobh P</td><td>07510833404</td><td>prasobhprabhakaran1@gmail.com</td><td>2026-05-09 23:57:28</td><td>No Resume</td></tr><tr><td>Rony Chamaa</td><td>009613817457</td><td>ronychamaa@gmail.com</td><td>2026-05-12 16:32:16</td><td>No Resume</td></tr><tr><td>Islam Helmy Mohamed</td><td>00201003782361</td><td>Islam_nh50@yahoo.com</td><td>2026-05-12 19:11:25</td><td>No Resume</td></tr><tr><td>Syed Zaid Ahmad</td><td>98706181</td><td>zaidahmadsyed87@gmail.com</td><td>2026-05-12 19:17:41</td><td>No Resume</td></tr><tr><td>Aravind Byju</td><td>0971508617912</td><td>aravindroyal@gmail.com</td><td>2026-05-13 12:20:19</td><td>No Resume</td></tr><tr><td>leonidas tsampas</td><td>00306942593067</td><td>leonidas.tsampas@insead.edu</td><td>2026-05-13 15:54:01</td><td>No Resume</td></tr><tr><td>Rufthar Farook</td><td>97339823282</td><td>Vfrufthar@gmail.com</td><td>2026-05-13 21:11:54</td><td>No Resume</td></tr><tr><td>IRFAN KHAN</td><td>0096556649494</td><td>irfanjsk@rediffmail.com</td><td>2026-05-14 12:35:54</td><td>No Resume</td></tr><tr><td>Hatem Aly BadrElDin</td><td>00201221616733</td><td>Hatembadreldin.hb@gmail.com</td><td>2026-05-15 10:18:18</td><td>No Resume</td></tr><tr><td>Ramiz Arangad Kunhumohammed</td><td>00919447775779</td><td>ramiz_fca@akramiz.com</td><td>2026-05-16 12:44:56</td><td>No Resume</td></tr><tr><td>Khirulnisa</td><td>971524100715</td><td>fiza.nisa413@gmail.com</td><td>2026-05-16 13:55:22</td><td>No Resume</td></tr><tr><td>Pineth Turnino</td><td>71952769</td><td>pinethturnino@gmail.com</td><td>2026-05-18 13:47:06</td><td>No Resume</td></tr><tr><td>kamni pahilajani</td><td>97608509</td><td>kamnipahilajani1@gmail.com</td><td>2026-05-18 14:07:58</td><td>No Resume</td></tr><tr><td>Syed Mohammad azim</td><td>97154351390</td><td>azimbaqar@gmail.com</td><td>2026-05-18 16:34:20</td><td>No Resume</td></tr><tr><td>Moza Harith</td><td>79611751</td><td>mozaharith89@gmail.com</td><td>2026-05-19 13:04:09</td><td>No Resume</td></tr><tr><td>RIJO JOSE </td><td>98629790</td><td>rijoscochin@gmail.com</td><td>2026-05-20 18:22:57</td><td>No Resume</td></tr><tr><td>Allwin John</td><td>96879760437</td><td>allwinjohn98@gmail.com</td><td>2026-05-21 15:00:01</td><td>No Resume</td></tr><tr><td>Lasya </td><td>77268481</td><td>lasyab22@gmail.com</td><td>2026-05-22 16:44:09</td><td>No Resume</td></tr><tr><td>Hadeer mekawy</td><td>96892722564</td><td>hadeermekawy687@gmail.com</td><td>2026-05-23 14:57:04</td><td>No Resume</td></tr><tr><td>Inigo Majella</td><td>90645988</td><td>inigomajella.87@gmail.com</td><td>2026-05-24 11:06:31</td><td>No Resume</td></tr><tr><td>Dr Girish CH</td><td>7204564418</td><td>girishchvet@gmail.com</td><td>2026-05-24 12:37:06</td><td>No Resume</td></tr><tr><td>Raghavendra Bagade</td><td>09008011557</td><td>raghubagade@gmail.com</td><td>2026-05-24 19:49:04</td><td>No Resume</td></tr><tr><td>Ramakrishnan Melarcode Suryanarayanan </td><td>9176099806</td><td>sanjaymelarcode@gmail.com</td><td>2026-05-25 00:59:36</td><td>No Resume</td></tr><tr><td>Sherif Elnaggar </td><td>00971529983033</td><td>sherif.naggar@hotmail.com</td><td>2026-05-25 01:29:28</td><td>No Resume</td></tr><tr><td>Mahmood Khalfan Hamed Al Hashmi </td><td>92522122</td><td>al-ufuq77@hotmail.com</td><td>2026-05-25 01:43:30</td><td>No Resume</td></tr><tr><td>Anjusha K S</td><td>75063768</td><td>anjusha484@gmail.com</td><td>2026-05-25 06:41:44</td><td>No Resume</td></tr><tr><td>Kamal Rahang </td><td>918822802376</td><td>kamalrahang555@gmail.com</td><td>2026-05-25 07:38:23</td><td>No Resume</td></tr><tr><td>Kamal Rahang </td><td>8822802376</td><td>kamalrahang555@gmail.com</td><td>2026-05-25 07:42:28</td><td>No Resume</td></tr><tr><td>Parth Joshi</td><td>98979256</td><td>p...3@yahoo.in</td><td>2026-05-25 07:56:48</td><td>No Resume</td></tr><tr><td>Hossam Murshidy Ahmed</td><td>94396096</td><td>Hossam_murshidy@hotmail.com</td><td>2026-05-25 08:29:34</td><td>No Resume</td></tr><tr><td>Jaiprakash</td><td>919619641049</td><td>jp.eck2005@gmail.com</td><td>2026-05-25 08:42:13</td><td>No Resume</td></tr><tr><td>Shikha</td><td>0585713210</td><td>17shikha.agarwal@gmail.com</td><td>2026-05-25 08:58:50</td><td>No Resume</td></tr><tr><td>RAMAN KUMARESAN</td><td>9943683379</td><td>raman.rk79@gmail.com</td><td>2026-05-25 09:42:29</td><td>No Resume</td></tr><tr><td>MUNIRA MOHAMMED</td><td>96420497</td><td>muneera_alkindy@hotmail.com</td><td>2026-05-25 10:03:56</td><td>No Resume</td></tr><tr><td>Rajesh Soni</td><td>95760238</td><td>yesrajeshsoni@gmail.com</td><td>2026-05-25 10:37:38</td><td>No Resume</td></tr><tr><td>Muhammad Javed Khan</td><td>96890192012</td><td>javedboc@yahoo.com</td><td>2026-05-25 12:00:53</td><td>No Resume</td></tr><tr><td>Sadiq Khan</td><td>99666993</td><td>sadiqkhanfoundation@gmail.com</td><td>2026-05-25 12:05:43</td><td>No Resume</td></tr><tr><td>harshita jerajani</td><td>08080770389</td><td>jerajaniharshita@yahoo.com</td><td>2026-05-25 12:34:42</td><td>No Resume</td></tr><tr><td>Prathmesh</td><td>97156594321</td><td>prathameshborcar03@gmail.com</td><td>2026-05-25 14:09:36</td><td>No Resume</td></tr><tr><td>Rashid Mubark</td><td>98993316</td><td>bualij654@gmail.com</td><td>2026-05-25 14:33:39</td><td>No Resume</td></tr><tr><td>Dr Subodh Sakpal</td><td>9833061949</td><td>subodh.sakpal@gmail.com</td><td>2026-05-25 14:58:35</td><td>No Resume</td></tr><tr><td>Adarsh Mishra</td><td>918104165029</td><td>adarshmishra68@gmail.com</td><td>2026-05-25 16:00:04</td><td>No Resume</td></tr><tr><td>Adarsh Mishra </td><td>918104165029</td><td>adarshmishra68@gmail.com</td><td>2026-05-25 16:00:38</td><td>No Resume</td></tr><tr><td>Khaldoun Ali Younes </td><td>0096891415385</td><td>e.khaldounyounes@gmail.com</td><td>2026-05-25 16:18:00</td><td>No Resume</td></tr><tr><td>Rajesh Maggon</td><td>96895613348</td><td>maggonrajesh67@gmail.com</td><td>2026-05-25 17:22:58</td><td>No Resume</td></tr><tr><td>Owais Ahmed</td><td>923072830355</td><td>owaisahmed.cba.caf@gmail.com</td><td>2026-05-25 18:16:47</td><td>No Resume</td></tr><tr><td>Hamid Eshaghzadeh</td><td>9118270710</td><td>hamideshaghzade@ut.ac.ir</td><td>2026-05-28 10:30:10</td><td>No Resume</td></tr><tr><td>Saif Ali</td><td>79062748</td><td>alfarsi075444@gmail.com</td><td>2026-05-30 20:05:37</td><td>No Resume</td></tr><tr><td>SHAHNAWAZ KHAN</td><td>96878041816</td><td>khanshahnawaz3416@gmail.com</td><td>2026-05-31 13:36:19</td><td>No Resume</td></tr><tr><td>SRINITHI MOHANAN</td><td>7909214808</td><td>srinithimohanan@gmail.com</td><td>2026-06-01 19:10:36</td><td>No Resume</td></tr><tr><td>Alhussain Ali</td><td>72751573</td><td>alhussain.ali9282@gmail.com</td><td>2026-06-02 22:56:53</td><td>No Resume</td></tr><tr><td>Muhammed sajir</td><td>00966559792703</td><td>sajirwayanad@gmail.com</td><td>2026-06-03 21:17:22</td><td>No Resume</td></tr><tr><td>Aisha Mohammed Al Balushi</td><td>79936637</td><td>aybalushi18@gmail.com</td><td>2026-06-03 22:26:12</td><td>No Resume</td></tr><tr><td>Salim AlUraimi </td><td>99763201</td><td>Salimalarimi201@gmail.com</td><td>2026-06-03 22:36:52</td><td>No Resume</td></tr><tr><td>samir raikar</td><td>9322399634</td><td>raikar.samir@gmail.com</td><td>2026-06-03 23:08:25</td><td>No Resume</td></tr><tr><td>Kulthoom Yousuf Al Habsi</td><td>93298468</td><td>kulthoomym@hotmail.com</td><td>2026-06-04 12:02:12</td><td>No Resume</td></tr><tr><td>Muhammed Sheheer </td><td>98765346</td><td>Sheheer.hse1840@gmail.com</td><td>2026-06-04 13:05:24</td><td>No Resume</td></tr><tr><td>KANNAN NAIR</td><td>916238117118</td><td>mckannannair369@gmail.com</td><td>2026-06-04 13:11:18</td><td>No Resume</td></tr><tr><td>Adnan Saleem</td><td>92486938</td><td>adnan.saleem1979@gmail.com</td><td>2026-06-04 14:17:16</td><td>No Resume</td></tr><tr><td>Salim Yousuf Al Habsi</td><td>95559953</td><td>salim.alhabsi.9329@gmail.com</td><td>2026-06-05 08:46:30</td><td>No Resume</td></tr><tr><td>Ahmed Al Barwani </td><td>95466812</td><td>ahmed9546@hotmail.com</td><td>2026-06-05 11:28:07</td><td>No Resume</td></tr><tr><td>Praveen Kumar Talasu</td><td>91281079</td><td>praveen.talasu87@gmail.com</td><td>2026-06-07 19:23:02</td><td>No Resume</td></tr><tr><td>Aiman Ahmed Al Kharusi</td><td>92244992</td><td>ALKHARUSI.AIMAN@GMAIL.COM</td><td>2026-06-07 22:48:19</td><td>No Resume</td></tr><tr><td>Said Saif AlShibli</td><td>96667479</td><td>sidoooo990@gmail.com</td><td>2026-06-08 23:28:23</td><td>No Resume</td></tr><tr><td>Srikesh Subash</td><td>98489727</td><td>srikeshsb7@gmail.com</td><td>2026-06-09 01:28:00</td><td>No Resume</td></tr><tr><td>Neeraj Patade</td><td>00919049994194</td><td>patadeneeraj@gmail.com</td><td>2026-06-09 10:12:51</td><td>No Resume</td></tr><tr><td>Ahmed Kamel Elsakhawy</td><td>01008078102</td><td>elsakhawy.2011@gmail.com</td><td>2026-06-09 11:21:20</td><td>No Resume</td></tr><tr><td>Mohamed ashik</td><td>8428854276</td><td>aashiashi112@gmail.com</td><td>2026-06-09 17:29:31</td><td>No Resume</td></tr><tr><td>Srikesh Subash</td><td>98489727</td><td>srikeshsb7@gmail.com</td><td>2026-06-09 17:41:33</td><td>No Resume</td></tr><tr><td>Srikesh Subash</td><td>98489727</td><td>srikeshsb7@gmail.com</td><td>2026-06-09 20:39:45</td><td>No Resume</td></tr><tr><td>Adarsh Kannampunchayil </td><td>95657469</td><td>adarshkannampunchayil2016@gmail.com</td><td>2026-06-10 19:35:57</td><td>No Resume</td></tr><tr><td>Sumin Kumar km</td><td>95324263</td><td>suminkumarkammadavil@gmail.com</td><td>2026-06-10 19:41:05</td><td>No Resume</td></tr><tr><td>Sumin Kumar km</td><td>95324263</td><td>suminkumarkammadavil@gmail.com</td><td>2026-06-11 12:54:06</td><td>No Resume</td></tr><tr><td>RAHUL MEHTA</td><td>95813415</td><td>smartrahul1664@gmail.com</td><td>2026-06-11 20:02:01</td><td>No Resume</td></tr><tr><td>Rameez Parmar </td><td>99179702</td><td>rameezparmar89@gmail.com</td><td>2026-06-15 16:51:45</td><td>No Resume</td></tr><tr><td>Anusree K</td><td>96877382645</td><td>anusreeahel@gmail.com</td><td>2026-06-21 22:56:56</td><td>No Resume</td></tr><tr><td>Saleh Al Hashami</td><td>95637809</td><td>saleh-sq@hotmail.com</td><td>2026-06-23 17:48:46</td><td>No Resume</td></tr><tr><td>Abdulrahman Alkharusi </td><td>96775621</td><td>al2000al@gmail.com</td><td>2026-06-23 18:01:33</td><td>No Resume</td></tr><tr><td>Shanmugaraj </td><td>96892405877</td><td>shanrajsivalingam@gmail.com</td><td>2026-06-24 09:28:25</td><td>No Resume</td></tr><tr><td>ASHLEY LOBO</td><td>92742687</td><td>ashleyagnelolobo@gmail.com</td><td>2026-06-24 16:23:23</td><td>No Resume</td></tr><tr><td>Khalid Al Balushi </td><td>0096899664442</td><td>kal2cu@yahoo.com</td><td>2026-06-24 23:05:47</td><td>No Resume</td></tr><tr><td>Hassan Hamdan</td><td>99655882</td><td>signor.hamdan@hotmail.com</td><td>2026-06-24 23:06:00</td><td>No Resume</td></tr><tr><td>Mallek </td><td>213656526862</td><td>mallek.djalil@outlook.fr</td><td>2026-06-25 13:42:35</td><td>No Resume</td></tr><tr><td>Sumit Kumar</td><td>79734113</td><td>ksumit12231a0388@gmail.com</td><td>2026-06-25 20:04:56</td><td>No Resume</td></tr><tr><td>Sumit Kumar</td><td>79734113</td><td>ksumit12231a0388@gmail.com</td><td>2026-06-25 20:05:24</td><td>No Resume</td></tr><tr><td>Hadeer Mekawy</td><td>96892722564</td><td>hadeermekawy687@gmail.com</td><td>2026-06-26 03:57:35</td><td>No Resume</td></tr><tr><td>imran Haider</td><td>00923367865127</td><td>ikroyal@yahoo.com</td><td>2026-06-27 07:51:14</td><td>No Resume</td></tr><tr><td>Jagmal Chauhan </td><td>919257456063</td><td>chauhanjagmal86@gmail.com</td><td>2026-06-27 10:57:49</td><td>No Resume</td></tr><tr><td>Chetan</td><td>72851201</td><td>CMORE926@gmail.com</td><td>2026-06-28 18:02:40</td><td>No Resume</td></tr><tr><td>Tarun</td><td>7760605854</td><td>tharunk569@gmail.com</td><td>2026-06-28 18:03:53</td><td>No Resume</td></tr><tr><td>SUSHWITH ADAPA</td><td>9632092335</td><td>sushwithadapa@gmail.com</td><td>2026-06-28 18:29:29</td><td>No Resume</td></tr><tr><td>SUSHWITH ADAPA</td><td>9632092335</td><td>sushwithadapa@gmail.com</td><td>2026-06-28 18:29:29</td><td>No Resume</td></tr><tr><td>Monik Oza</td><td>918511120265</td><td>monik2911@gmail.com</td><td>2026-06-29 11:30:57</td><td>No Resume</td></tr><tr><td>refat kekhia</td><td>76910401</td><td>Refatkz.1998@gmail.com</td><td>2026-06-29 15:57:57</td><td>No Resume</td></tr><tr><td>Syed Faizan Irfan </td><td>97692322</td><td>sfaizan863@gmail.com</td><td>2026-07-02 18:31:05</td><td>No Resume</td></tr><tr><td>Syed Faizan Irfan </td><td>97692322</td><td>sfaizan863@gmail.com</td><td>2026-07-02 18:32:00</td><td>No Resume</td></tr><tr><td>Abhay </td><td>8139076623</td><td>abhaytk63@gmail.com</td><td>2026-07-05 16:49:02</td><td>No Resume</td></tr><tr><td>lalith sukumaran</td><td>92434046</td><td>sukumaranlalith6@gmail.com</td><td>2026-07-07 12:02:41</td><td>No Resume</td></tr><tr><td>Shachi Punani</td><td>00919687918728</td><td>shachipunani@gmail.com</td><td>2026-07-08 19:34:38</td><td>No Resume</td></tr><tr><td>Vishnu priya V</td><td>78175056</td><td>vishnupriya1220@gmail.com</td><td>2026-07-12 17:06:50</td><td>No Resume</td></tr><tr><td>Azharuddin Ansari</td><td>93004120</td><td>mohdazharddin@gmail.com</td><td>2026-07-15 23:33:28</td><td>No Resume</td></tr><tr><td>Md Mahoshin Ali</td><td>01797725534</td><td>ali141mahosin@gmail.com</td><td>2026-07-16 19:41:55</td><td>No Resume</td></tr><tr><td>Mahmud Un Nabi</td><td>78559345</td><td>mahmudunnabi@live.com</td><td>2026-07-16 20:09:48</td><td>No Resume</td></tr><tr><td>Muhammad Aatif Nazeer</td><td>03441233476</td><td>atifnazeer2042@gmail.com</td><td>2026-07-17 15:28:04</td><td>No Resume</td></tr><tr><td>Mohamed Adel</td><td>00201156077332</td><td>mohamedsoli4@yahoo.com</td><td>2026-07-18 14:52:04</td><td>No Resume</td></tr><tr><td>Adeshina Olajide</td><td>71302040</td><td>pjaidgroup@gmail.com</td><td>2026-07-18 19:52:49</td><td>No Resume</td></tr><tr><td>Zafar Iqbal </td><td>00923000133557</td><td>dr.zafarrai@gmail.com</td><td>2026-07-19 19:43:05</td><td>No Resume</td></tr><tr><td>Sunil Rawat</td><td>75071240</td><td>sr828730@gmail.com</td><td>2026-07-19 21:15:16</td><td>No Resume</td></tr><tr><td>BEN MOGAKA NYANDEGE</td><td>254720379700</td><td>nyandegeb@yahoo.com</td><td>2026-07-20 01:39:21</td><td>No Resume</td></tr><tr><td>Amir Elsaiiad</td><td>00966532809571</td><td>Elsaiiad.vet@gmail.com</td><td>2026-07-20 05:55:13</td><td>No Resume</td></tr><tr><td>isra</td><td>77057336</td><td>essba1443@gmail.com</td><td>2026-07-20 11:15:32</td><td>No Resume</td></tr><tr><td>Retham Al Suleimani </td><td>98578576</td><td>Rethamms@gmail.com</td><td>2026-07-20 11:35:51</td><td>No Resume</td></tr><tr><td>Sandip Raj</td><td>917021797005</td><td>sandipraj0906@gmail.com</td><td>2026-07-20 16:41:32</td><td>No Resume</td></tr><tr><td>shaher alharrasi</td><td>96895420143</td><td>shaher.alharrasi@gmail.com</td><td>2026-07-20 17:10:22</td><td>No Resume</td></tr><tr><td>Sreenath S Pillai</td><td>94261056</td><td>sreenathspillai07@gmail.com</td><td>2026-07-21 11:20:24</td><td>No Resume</td></tr><tr><td>MUTHUKUMAR</td><td>96894378077</td><td>muthukumarmanickkam@gmail.com</td><td>2026-07-21 12:33:27</td><td>No Resume</td></tr><tr><td>Fatma</td><td>96020821</td><td>itsfatmaali_821@outlook.com</td><td>2026-07-22 02:14:43</td><td>No Resume</td></tr><tr><td>Hari Prasad Panthi </td><td>9779866130042</td><td>panthihari94@gmail.com</td><td>2026-07-22 06:09:13</td><td>No Resume</td></tr><tr><td>Erik Itty Sajan</td><td>97457888</td><td>erikittysajan@gmail.com</td><td>2026-07-22 17:29:43</td><td>No Resume</td></tr><tr><td>Omar Amen</td><td>00966567419143</td><td>omarkamel83@vet.aun.edu.eg</td><td>2026-07-23 04:31:06</td><td>No Resume</td></tr><tr><td>Azharuddi Ansari</td><td>93004120</td><td>mohdazharddin@gmail.com</td><td>2026-07-25 00:33:29</td><td>No Resume</td></tr><tr><td>Hassan Alshazly Hassan</td><td>93693973</td><td>mr.shazly12@gmail.com</td><td>2026-07-26 16:30:02</td><td>No Resume</td></tr><tr><td>Sharon John David</td><td>71151226</td><td>sharonjd001@gmail.com</td><td>2026-07-27 10:42:50</td><td>No Resume</td></tr><tr><td>Muhammad Asad Baber</td><td>00923313679008</td><td>masadbabar@outlook.com</td><td>2026-07-27 11:31:26</td><td>No Resume</td></tr><tr><td>Peerzada Muhammad Ahmed </td><td>923036464088</td><td>ahmadpeerzada@gmail.com</td><td>2026-07-28 22:23:48</td><td>No Resume</td></tr><tr><td>Maria</td><td>71747994</td><td>mariahilal972@gmail.com</td><td>2026-07-28 23:45:28</td><td>No Resume</td></tr><tr><td>Mohammad Tosif Qureshi</td><td>917976610342</td><td>tosif9351842423@gmail.com</td><td>2026-07-29 10:47:34</td><td>No Resume</td></tr><tr><td>Saravanan Dhiraviyam </td><td>09043872017</td><td>saravananmeena7@gmail.com</td><td>2026-07-29 12:45:08</td><td>No Resume</td></tr><tr><td>BIKRAM JHA</td><td>918859530027</td><td>bikramjha494@gmail.com</td><td>2026-07-29 14:26:44</td><td>No Resume</td></tr><tr><td>MOHAMED SAID TAWFIK </td><td>00201005248562</td><td>msthan132@gmail.com</td><td>2026-07-29 15:12:20</td><td>No Resume</td></tr><tr><td>Ayaz Ahmad</td><td>96879370799</td><td>ayaz.787ahmad@gmail.com</td><td>2026-07-30 19:03:55</td><td><button type='button' class='btn btn-sm btn-info view-resume-btn' 
                                                data-bs-toggle='modal' data-bs-target='#resumeModal' 
                                                data-resume-path='../uploads/resumes/6a6b52c31bd8a.pdf'>View</button> <a href='../uploads/resumes/6a6b52c31bd8a.pdf' download class='btn btn-sm btn-success'>Download</a> <button type='button' class='btn btn-sm btn-danger delete-resume-btn' 
                                                data-application-id='361' 
                                                data-resume-path='uploads/resumes/6a6b52c31bd8a.pdf'>
                                                Delete
                                              </button></td></tr><tr><td>Jehangir Shah</td><td>03009339052</td><td>jehangirshahgardaizee@yahoo.com</td><td>2026-07-31 00:18:24</td><td><button type='button' class='btn btn-sm btn-info view-resume-btn' 
                                                data-bs-toggle='modal' data-bs-target='#resumeModal' 
                                                data-resume-path='../uploads/resumes/6a6b9c78881f0.pdf'>View</button> <a href='../uploads/resumes/6a6b9c78881f0.pdf' download class='btn btn-sm btn-success'>Download</a> <button type='button' class='btn btn-sm btn-danger delete-resume-btn' 
                                                data-application-id='362' 
                                                data-resume-path='uploads/resumes/6a6b9c78881f0.pdf'>
                                                Delete
                                              </button></td></tr><tr><td>Nasrullah Khan</td><td>923143076532</td><td>Azina786@gmail.com</td><td>2026-08-01 14:07:29</td><td><button type='button' class='btn btn-sm btn-info view-resume-btn' 
                                                data-bs-toggle='modal' data-bs-target='#resumeModal' 
                                                data-resume-path='../uploads/resumes/6a6db0499ee11.pdf'>View</button> <a href='../uploads/resumes/6a6db0499ee11.pdf' download class='btn btn-sm btn-success'>Download</a> <button type='button' class='btn btn-sm btn-danger delete-resume-btn' 
                                                data-application-id='363' 
                                                data-resume-path='uploads/resumes/6a6db0499ee11.pdf'>
                                                Delete
                                              </button></td></tr>                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p class="mb-0">© 2026 JM International SPC. All rights reserved.</p>
        </div>
    </footer>

    <!-- Resume Modal -->
    <div class="modal fade" id="resumeModal" tabindex="-1" aria-labelledby="resumeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resumeModalLabel">Resume Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe class="resume-iframe" src=""></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-print">Print</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Confirmation Modal (EXACT SAME AS FIRST PAGE) -->
    <div class="modal fade" id="deleteResumeModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to <strong>permanently delete</strong> this resume?</p>
                <p class="text-danger"><strong>This action cannot be undone.</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Yes, Delete Permanently</button>
            </div>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="/admin/assets/admin-notify.js"></script>
    <script>
    $(document).ready(function() {
        // Initialize DataTable
        $('#applicationsTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true
        });
    
        // View Resume
        $('.view-resume-btn').on('click', function() {
            var resumePath = $(this).data('resume-path');
            $('#resumeModal .resume-iframe').attr('src', resumePath);
        });
    
        // Print Resume
        $('.btn-print').on('click', function() {
            var iframe = document.querySelector('.resume-iframe');
            if (iframe) iframe.contentWindow.print();
        });
    
        // Clear iframe when modal closes
        $('#resumeModal').on('hidden.bs.modal', function() {
            $('.resume-iframe').attr('src', '');
        });
    
        // ========== DELETE RESUME - RESUME DROP-OFF ONLY ==========
        let deleteApplicationId = null;
        let deleteResumePath = null;
    
        // When Delete button is clicked
        $(document).on('click', '.delete-resume-btn', function() {
            deleteApplicationId = $(this).data('application-id');
            deleteResumePath = $(this).data('resume-path');
            $('#deleteResumeModal').modal('show');
        });
    
        // Confirm Delete → Use separate script for Resume Drop-Off
        $('#confirmDeleteBtn').on('click', function() {
            if (!deleteApplicationId || !deleteResumePath) return;
    
            $.ajax({
                url: 'delete_resume_rd.php',  // ← Your NEW separate file
                type: 'POST',
                data: {
                    application_id: deleteApplicationId,
                    resume_path: deleteResumePath
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Replace buttons with "Deleted" message
                        const $cell = $(`.delete-resume-btn[data-application-id="${deleteApplicationId}"]`).closest('td');
                        $cell.html('<span class="text-success"><i class="fas fa-check-circle"></i> Resume Deleted</span>');
    
                        // Optional: Show success message
                        if (typeof showAdminToast === 'function') showAdminToast('Resume has been permanently deleted from server and database.', 'success');
                        else alert('Resume has been permanently deleted from server and database.');
                    } else {
                        if (typeof showAdminToast === 'function') showAdminToast(response.message || 'Failed to delete resume', 'danger');
                        else alert('Error: ' + (response.message || 'Failed to delete resume'));
                    }
                },
                error: function() {
                    if (typeof showAdminToast === 'function') showAdminToast('Server error. Please try again later.', 'danger');
                    else alert('Server error. Please try again later.');
                },
                complete: function() {
                    $('#deleteResumeModal').modal('hide');
                }
            });
        });
        // ==========================================================
    });
    </script>
    
</body>
</html>