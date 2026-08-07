
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
            <li class="nav-item active">
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
            <h3 class="text-center mb-4">Job Applications</h3>

            <!-- Filter Form -->
            <div class="card shadow mb-5">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Filter Applications</h3>
                </div>
                <div class="card-body">
                    <form method="GET" class="filter-form">
                        <div class="row">
                            <div class="col-md-3 form-group mb-3">
                                <label for="job_id">Job ID</label>
                                <input type="text" class="form-control" id="job_id" name="job_id" value="">
                            </div>
                            <div class="col-md-3 form-group mb-3">
                                <label for="company">Company</label>
                                <input type="text" class="form-control" id="company" name="company" value="">
                            </div>
                            <div class="col-md-3 form-group mb-3">
                                <label for="position">Position</label>
                                <input type="text" class="form-control" id="position" name="position" value="">
                            </div>
                            <div class="col-md-3 form-group mb-3">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" id="location" name="location" value="">
                            </div>
                        </div>
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
                                <a href="/admin/applications_list.php" class="btn btn-secondary ms-2">Reset</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Applications Table -->
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Received Applications</h3>
                </div>
                <div class="card-body">
                    <table id="applicationsTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Application ID</th>
                                <th>Job ID</th>
                                <th>Company</th>
                                <th>Position</th>
                                <th>Location</th>
                                <th>Applicant Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Application Submitted Date</th>
                                <th>Resume</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>1</td><td>11</td><td>Leading Aquaculture Project in Oman</td><td>Sea Bream Hatchery Head</td><td>Oman</td><td>Riddhiman Saha</td><td>12507975662</td><td>riddhiman04@gmail.com</td><td>2025-12-03 13:32:08</td><td>No Resume</td></tr><tr><td>20</td><td>11</td><td>Leading Aquaculture Project in Oman</td><td>Sea Bream Hatchery Head</td><td>Oman</td><td>Hajer  Alharthy </td><td>94364451</td><td>hajer.alharthy20@gmail.com</td><td>2025-12-10 23:01:54</td><td>No Resume</td></tr><tr><td>34</td><td>11</td><td>Leading Aquaculture Project in Oman</td><td>Sea Bream Hatchery Head</td><td>Oman</td><td>Cesar Omar Rodriguez Arana</td><td>526862214288</td><td>rasecramo@hotmail.com</td><td>2025-12-17 03:29:07</td><td>No Resume</td></tr><tr><td>2</td><td>12</td><td>Oman’s Premier Corporate Entity</td><td>Business Development Manager</td><td>Oman</td><td>Mashal Al Mageni</td><td>96661396</td><td>mashal.almageni@gmail.com</td><td>2025-12-03 17:59:52</td><td>No Resume</td></tr><tr><td>13</td><td>12</td><td>Oman’s Premier Corporate Entity</td><td>Business Development Manager</td><td>Oman</td><td>Saif Al Sibani</td><td>77117715</td><td>xisaif96@gmail.com</td><td>2025-12-07 22:55:41</td><td>No Resume</td></tr><tr><td>14</td><td>12</td><td>Oman’s Premier Corporate Entity</td><td>Business Development Manager</td><td>Oman</td><td>Saif Al Sibani</td><td>77117715</td><td>xisaif96@gmail.com</td><td>2025-12-07 22:56:10</td><td>No Resume</td></tr><tr><td>21</td><td>12</td><td>Oman’s Premier Corporate Entity</td><td>Business Development Manager</td><td>Oman</td><td>Tarooq Pasha</td><td>91313786</td><td>tarooqpasha36@gmail.com</td><td>2025-12-12 10:13:31</td><td>No Resume</td></tr><tr><td>41</td><td>12</td><td>Oman’s Premier Corporate Entity</td><td>Business Development Manager</td><td>Oman</td><td>Ahmed Said Salim AlRumhi</td><td>99762660</td><td>ahmed-alrumhi@hotmail.com</td><td>2025-12-28 16:31:12</td><td>No Resume</td></tr><tr><td>47</td><td>12</td><td>Oman’s Premier Corporate Entity</td><td>Business Development Manager</td><td>Oman</td><td>Faisal Abdel Aal</td><td>93890915</td><td>faisal_abdulaal@hotmail.com</td><td>2026-01-09 21:20:24</td><td>No Resume</td></tr><tr><td>50</td><td>12</td><td>Oman’s Premier Corporate Entity</td><td>Business Development Manager</td><td>Oman</td><td>Mohammed </td><td>77173791</td><td>mohammed9394@icloud.com</td><td>2026-01-10 13:08:21</td><td>No Resume</td></tr><tr><td>51</td><td>12</td><td>Oman’s Premier Corporate Entity</td><td>Business Development Manager</td><td>Oman</td><td>Mashal </td><td>96896661396</td><td>mashal_almageni@hotmail.com</td><td>2026-01-12 15:32:38</td><td>No Resume</td></tr><tr><td>58</td><td>12</td><td>Oman’s Premier Corporate Entity</td><td>Business Development Manager</td><td>Oman</td><td>THATODE KRISHNA</td><td>99277013</td><td>krishnathatode@gmail.com</td><td>2026-01-17 21:56:21</td><td>No Resume</td></tr><tr><td>65</td><td>12</td><td>Oman’s Premier Corporate Entity</td><td>Business Development Manager</td><td>Oman</td><td>sagayaraj amaladoss</td><td>96892971352</td><td>a_sagayaraja@yahoo.com</td><td>2026-02-23 15:07:24</td><td>No Resume</td></tr><tr><td>71</td><td>12</td><td>Oman’s Premier Corporate Entity</td><td>Business Development Manager</td><td>Oman</td><td>MD Habib Hashmi</td><td>9835589558</td><td>habibhashmi45@gmail.com</td><td>2026-03-04 14:55:27</td><td>No Resume</td></tr><tr><td>94</td><td>12</td><td>Oman’s Premier Corporate Entity</td><td>Business Development Manager</td><td>Oman</td><td>Test</td><td>123456789</td><td>test@gmail.com</td><td>2026-03-12 17:05:56</td><td>No Resume</td></tr><tr><td>126</td><td>12</td><td>Oman’s Premier Corporate Entity</td><td>Business Development Manager</td><td>Oman</td><td>SHAMIL M R</td><td>6005163772</td><td>Shamillulu1996@gmail.com</td><td>2026-04-18 10:36:30</td><td>No Resume</td></tr><tr><td>144</td><td>12</td><td>Oman’s Premier Corporate Entity</td><td>Business Development Manager</td><td>Oman</td><td>husni hamadeh </td><td>97466664421</td><td>hamadehhosni@gmail.com</td><td>2026-05-05 13:53:51</td><td>No Resume</td></tr><tr><td>151</td><td>12</td><td>Oman’s Premier Corporate Entity</td><td>Business Development Manager</td><td>Oman</td><td>Aravind Byju</td><td>0971508617912</td><td>aravindroyal@gmail.com</td><td>2026-05-13 12:25:48</td><td>No Resume</td></tr><tr><td>154</td><td>12</td><td>Oman’s Premier Corporate Entity</td><td>Business Development Manager</td><td>Oman</td><td>Shailendra Pandey</td><td>09619507905</td><td>pandeyje13@gmail.com</td><td>2026-05-14 00:11:22</td><td>No Resume</td></tr><tr><td>156</td><td>12</td><td>Oman’s Premier Corporate Entity</td><td>Business Development Manager</td><td>Oman</td><td>Shabbeer Rabbani</td><td>919962082008</td><td>mdshabeer2002@yahoo.co.in</td><td>2026-05-14 14:37:49</td><td>No Resume</td></tr><tr><td>7</td><td>13</td><td>Leading Organization in Oman</td><td>Head of Legal - Omani National</td><td>Muscat, Oman</td><td>Al Safa Al Kindi</td><td>96452533</td><td>alsafaaalkindi@gmail.com</td><td>2025-12-07 18:05:46</td><td>No Resume</td></tr><tr><td>11</td><td>13</td><td>Leading Organization in Oman</td><td>Head of Legal - Omani National</td><td>Muscat, Oman</td><td>Arwa Albalushi </td><td>93962474</td><td>arwalblooshi9995@gmail.com</td><td>2025-12-07 22:05:18</td><td>No Resume</td></tr><tr><td>12</td><td>13</td><td>Leading Organization in Oman</td><td>Head of Legal - Omani National</td><td>Muscat, Oman</td><td>ISHRAQ ALNASSRI</td><td>79325522</td><td>ishraq.mo90@gmail.com</td><td>2025-12-07 22:41:31</td><td>No Resume</td></tr><tr><td>15</td><td>13</td><td>Leading Organization in Oman</td><td>Head of Legal - Omani National</td><td>Muscat, Oman</td><td>Khawla</td><td>79926960</td><td>khawlaalismaili@gmail.com</td><td>2025-12-08 14:23:38</td><td>No Resume</td></tr><tr><td>16</td><td>13</td><td>Leading Organization in Oman</td><td>Head of Legal - Omani National</td><td>Muscat, Oman</td><td>Khawla</td><td>79926960</td><td>khawlaalismaili@gmail.com</td><td>2025-12-08 14:23:40</td><td>No Resume</td></tr><tr><td>19</td><td>13</td><td>Leading Organization in Oman</td><td>Head of Legal - Omani National</td><td>Muscat, Oman</td><td>Saif Al Sibani</td><td>77117715</td><td>xisaif96@gmail.com</td><td>2025-12-10 22:47:22</td><td>No Resume</td></tr><tr><td>3</td><td>14</td><td>Leading Construction &amp; Property Group</td><td>Head of Property Management - Omani National</td><td>Muscat, Oman</td><td>Shrooq Nasser Mubarak Alrashdi </td><td>77075522</td><td>alshosh44@icloud.com</td><td>2025-12-04 20:59:16</td><td>No Resume</td></tr><tr><td>6</td><td>14</td><td>Leading Construction &amp; Property Group</td><td>Head of Property Management - Omani National</td><td>Muscat, Oman</td><td>Shrooq Nasser Mubarak Alrashdi </td><td>77075522</td><td>alshosh44@icloud.com</td><td>2025-12-07 00:15:35</td><td>No Resume</td></tr><tr><td>8</td><td>14</td><td>Leading Construction &amp; Property Group</td><td>Head of Property Management - Omani National</td><td>Muscat, Oman</td><td>Sammy</td><td>92980804</td><td>Sammy.Alshidhani.om@gmail.com</td><td>2025-12-07 21:29:16</td><td>No Resume</td></tr><tr><td>9</td><td>14</td><td>Leading Construction &amp; Property Group</td><td>Head of Property Management - Omani National</td><td>Muscat, Oman</td><td>Sammy</td><td>92980804</td><td>sammy.alshidhani.om@gmail.com</td><td>2025-12-07 21:30:10</td><td>No Resume</td></tr><tr><td>23</td><td>14</td><td>Leading Construction &amp; Property Group</td><td>Head of Property Management - Omani National</td><td>Muscat, Oman</td><td>Rashid AL Maqbali</td><td>98177366</td><td>nlprkm@gmail.com</td><td>2025-12-15 11:30:09</td><td>No Resume</td></tr><tr><td>43</td><td>14</td><td>Leading Construction &amp; Property Group</td><td>Head of Property Management - Omani National</td><td>Muscat, Oman</td><td>Sammy</td><td>92980804</td><td>Sammy.alshidhani.om@gmail.com</td><td>2026-01-04 09:46:28</td><td>No Resume</td></tr><tr><td>53</td><td>14</td><td>Leading Construction &amp; Property Group</td><td>Head of Property Management - Omani National</td><td>Muscat, Oman</td><td>Fatma Mansoor Nasser Al Taie</td><td>99117081</td><td>fatmaaltaie@gmail.com</td><td>2026-01-13 05:12:27</td><td>No Resume</td></tr><tr><td>22</td><td>17</td><td>Leading FMCG Group</td><td>Assistant Manager - ERP Controller, Receivables &amp; MIS</td><td>Oman</td><td>PRASHANTH VISHWANATH POOJARY</td><td>92037111</td><td>Prashanthpoojary1003@gmail.com</td><td>2025-12-14 16:45:28</td><td>No Resume</td></tr><tr><td>35</td><td>17</td><td>Leading FMCG Group</td><td>Assistant Manager - ERP Controller, Receivables &amp; MIS</td><td>Oman</td><td>Ishfaq Beig</td><td>919797886529</td><td>beigishfaq123@gmail.com</td><td>2025-12-17 16:33:08</td><td>No Resume</td></tr><tr><td>86</td><td>17</td><td>Leading FMCG Group</td><td>Assistant Manager - ERP Controller, Receivables &amp; MIS</td><td>Oman</td><td>Siju Kottackal</td><td>71126708</td><td>sijukottackal@outlook.com</td><td>2026-03-10 18:39:02</td><td>No Resume</td></tr><tr><td>140</td><td>17</td><td>Leading FMCG Group</td><td>Assistant Manager - ERP Controller, Receivables &amp; MIS</td><td>Oman</td><td>eliyas m</td><td>917200925101</td><td>eliyas089@gmail.com</td><td>2026-04-27 04:25:26</td><td>No Resume</td></tr><tr><td>4</td><td>19</td><td>Leading FMCG Company in Oman</td><td>Graphic Designer</td><td>Muscat, Oman</td><td>Sakhawat ali</td><td>03070934520</td><td>sakhawatalilashari@gmail.com</td><td>2025-12-05 23:23:27</td><td>No Resume</td></tr><tr><td>5</td><td>19</td><td>Leading FMCG Company in Oman</td><td>Graphic Designer</td><td>Muscat, Oman</td><td>Sakhawat ali</td><td>03070934520</td><td>sakhawatalilashari@gmail.com</td><td>2025-12-05 23:27:06</td><td>No Resume</td></tr><tr><td>10</td><td>19</td><td>Leading FMCG Company in Oman</td><td>Graphic Designer</td><td>Muscat, Oman</td><td>Ayat nasser ALbahri</td><td>90995953</td><td>ayatn1333@gmail.com</td><td>2025-12-07 21:31:30</td><td>No Resume</td></tr><tr><td>17</td><td>19</td><td>Leading FMCG Company in Oman</td><td>Graphic Designer</td><td>Muscat, Oman</td><td>Huzaifa Akbar </td><td>76390679</td><td>huze778@gmail.com</td><td>2025-12-09 09:04:06</td><td>No Resume</td></tr><tr><td>18</td><td>19</td><td>Leading FMCG Company in Oman</td><td>Graphic Designer</td><td>Muscat, Oman</td><td>Rahil Al Jassasi</td><td>95699044</td><td>rahil.aljassasi@outlook.com</td><td>2025-12-09 14:09:03</td><td>No Resume</td></tr><tr><td>61</td><td>19</td><td>Leading FMCG Company in Oman</td><td>Graphic Designer</td><td>Muscat, Oman</td><td>Halima Hassan Ali Al Balushi</td><td>94944373</td><td>haleeema.h56@gmail.com</td><td>2026-02-08 14:43:25</td><td>No Resume</td></tr><tr><td>62</td><td>19</td><td>Leading FMCG Company in Oman</td><td>Graphic Designer</td><td>Muscat, Oman</td><td>Ulysses Andres</td><td>97003079</td><td>ulyandres77@gmail.com</td><td>2026-02-09 15:45:19</td><td>No Resume</td></tr><tr><td>24</td><td>20</td><td>Leading Engineering &amp; Automation Company</td><td>SCADA Engineers - Omani National</td><td>Muscat, Sultanate of Oman</td><td>Younis aljadidi</td><td>93337147</td><td>y95ounis@gmail.com</td><td>2025-12-16 14:01:51</td><td>No Resume</td></tr><tr><td>25</td><td>20</td><td>Leading Engineering &amp; Automation Company</td><td>SCADA Engineers - Omani National</td><td>Muscat, Sultanate of Oman</td><td>Younis aljadidi</td><td>93337147</td><td>y95ounis@gmail.com</td><td>2025-12-16 15:17:10</td><td>No Resume</td></tr><tr><td>26</td><td>20</td><td>Leading Engineering &amp; Automation Company</td><td>SCADA Engineers - Omani National</td><td>Muscat, Sultanate of Oman</td><td>Teeb Al Farsi</td><td>96896120196</td><td>teebalfarsi01@gmail.com</td><td>2025-12-16 15:23:42</td><td>No Resume</td></tr><tr><td>27</td><td>20</td><td>Leading Engineering &amp; Automation Company</td><td>SCADA Engineers - Omani National</td><td>Muscat, Sultanate of Oman</td><td>Khoula AlMaqbali </td><td>91416188</td><td>Khoulalmaqbali@gmail.com</td><td>2025-12-16 17:38:21</td><td>No Resume</td></tr><tr><td>28</td><td>20</td><td>Leading Engineering &amp; Automation Company</td><td>SCADA Engineers - Omani National</td><td>Muscat, Sultanate of Oman</td><td>Khoula AlMaqbali </td><td>91416188</td><td>Khoulalmaqbali@gmail.com</td><td>2025-12-16 17:39:00</td><td>No Resume</td></tr><tr><td>29</td><td>20</td><td>Leading Engineering &amp; Automation Company</td><td>SCADA Engineers - Omani National</td><td>Muscat, Sultanate of Oman</td><td>Khoula AlMaqbali </td><td>91416188</td><td>Khoulalmaqbali@gmail.com</td><td>2025-12-16 17:47:16</td><td>No Resume</td></tr><tr><td>30</td><td>20</td><td>Leading Engineering &amp; Automation Company</td><td>SCADA Engineers - Omani National</td><td>Muscat, Sultanate of Oman</td><td>ELYAS</td><td>0096897254433</td><td>nabhani-n9m@hotmail.com</td><td>2025-12-16 17:54:46</td><td>No Resume</td></tr><tr><td>31</td><td>20</td><td>Leading Engineering &amp; Automation Company</td><td>SCADA Engineers - Omani National</td><td>Muscat, Sultanate of Oman</td><td>Maeen Alwahaibi</td><td>99215152</td><td>maeen.alwahaibi@outlook.com</td><td>2025-12-16 21:28:47</td><td>No Resume</td></tr><tr><td>32</td><td>20</td><td>Leading Engineering &amp; Automation Company</td><td>SCADA Engineers - Omani National</td><td>Muscat, Sultanate of Oman</td><td>YAHYA SULAIMAN SALEH AL YAZEEDI</td><td>99226956</td><td>scadaoman@gmail.com</td><td>2025-12-17 01:42:53</td><td>No Resume</td></tr><tr><td>33</td><td>20</td><td>Leading Engineering &amp; Automation Company</td><td>SCADA Engineers - Omani National</td><td>Muscat, Sultanate of Oman</td><td></td><td></td><td></td><td>2025-12-17 01:46:42</td><td>No Resume</td></tr><tr><td>36</td><td>20</td><td>Leading Engineering &amp; Automation Company</td><td>SCADA Engineers - Omani National</td><td>Muscat, Sultanate of Oman</td><td>Ali Said</td><td>98109359</td><td>alisaid33334@gmail.com</td><td>2025-12-18 12:47:17</td><td>No Resume</td></tr><tr><td>85</td><td>20</td><td>Leading Engineering &amp; Automation Company</td><td>SCADA Engineers - Omani National</td><td>Muscat, Sultanate of Oman</td><td>Amur </td><td>91249291</td><td>albalushiamur71@gmail.com</td><td>2026-03-08 16:03:31</td><td>No Resume</td></tr><tr><td>37</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>Nasser Salim AlSiyabi</td><td>93886373</td><td>nasserxx90@gmail.com</td><td>2025-12-24 12:12:37</td><td>No Resume</td></tr><tr><td>38</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>Ahmed Saleh Alhakmani</td><td>97734844</td><td>ahmed97734@gmail.com</td><td>2025-12-26 01:13:06</td><td>No Resume</td></tr><tr><td>39</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>Ahmed Saleh Alhakmani</td><td>97734844</td><td>ahmed97734@gmail.com</td><td>2025-12-26 02:45:17</td><td>No Resume</td></tr><tr><td>40</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>Maeen Alwahaibi</td><td>99215152</td><td>maeen.alwahaibi@outlook.com</td><td>2025-12-27 00:23:23</td><td>No Resume</td></tr><tr><td>42</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>Maryam Mohammed</td><td>94696898</td><td>msqu941@gmail.com</td><td>2025-12-29 08:58:18</td><td>No Resume</td></tr><tr><td>44</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>Amur </td><td>91249291</td><td>albalushiamur71@gmail.com</td><td>2026-01-04 22:16:53</td><td>No Resume</td></tr><tr><td>45</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>Ibrahim Ali Ahmed Baomar</td><td>94049413</td><td>Ibrahimbaomar00@gmail.com</td><td>2026-01-05 17:41:03</td><td>No Resume</td></tr><tr><td>48</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>Maryam Albalushi </td><td>95979422</td><td>maryamaalbulushi@gmail.com</td><td>2026-01-10 03:39:56</td><td>No Resume</td></tr><tr><td>54</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>Fatma Mansoor Al Taie</td><td>99117081</td><td>fatmaaltaie@gmail.com</td><td>2026-01-13 05:15:44</td><td>No Resume</td></tr><tr><td>55</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>Abdulaziz Al Wahaibi</td><td>96105050</td><td>alwahaibiabdulaziz66@gmail.com</td><td>2026-01-13 17:19:53</td><td>No Resume</td></tr><tr><td>59</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>Abdulaziz Al Wahaibi</td><td>96105050</td><td>alwahaibiabdulaziz66@gmail.com</td><td>2026-01-21 16:16:44</td><td>No Resume</td></tr><tr><td>123</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>Musaab AL Abri</td><td>96335587</td><td>musaabkhalfan@gmail.com</td><td>2026-04-15 20:48:01</td><td>No Resume</td></tr><tr><td>124</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>Musaab AL Abri</td><td>96335587</td><td>musaabkhalfan@gmail.com</td><td>2026-04-15 20:49:12</td><td>No Resume</td></tr><tr><td>127</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>Aws Albriki</td><td>94804199</td><td>awshamed5@outlook.com</td><td>2026-04-19 19:18:31</td><td>No Resume</td></tr><tr><td>129</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>Nasser khalifa Mohammed AL MAMRI </td><td>92521003</td><td>nasseralmamari820@gmail.com</td><td>2026-04-20 12:21:12</td><td>No Resume</td></tr><tr><td>131</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>Maria </td><td>71747994</td><td>mariahilal972@gmail.com</td><td>2026-04-20 23:26:57</td><td>No Resume</td></tr><tr><td>132</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>Maria</td><td>71747994</td><td>mariahilal972@gmail.con</td><td>2026-04-20 23:27:46</td><td>No Resume</td></tr><tr><td>145</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>Al Minhal Al Abdawani</td><td>96082850</td><td>alminhal.25@gmail.com</td><td>2026-05-05 15:28:19</td><td>No Resume</td></tr><tr><td>157</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>Moza Harith</td><td>79611751</td><td>mozaharith89@gmail.com</td><td>2026-05-19 13:00:35</td><td>No Resume</td></tr><tr><td>183</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>Alhussain Ali</td><td>72751573</td><td>alhussain.ali9282@gmail.com</td><td>2026-06-02 23:35:56</td><td>No Resume</td></tr><tr><td>203</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>Yousuf Ibrahim alhashmi </td><td>92609200</td><td>Yousufthegame@gmail.com</td><td>2026-06-17 19:01:37</td><td>No Resume</td></tr><tr><td>211</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>wujood</td><td>97506016</td><td>wujood20@gmail.com</td><td>2026-06-25 01:52:31</td><td>No Resume</td></tr><tr><td>212</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>wujood</td><td>97506016</td><td>wujood20@gmail.com</td><td>2026-06-25 18:06:18</td><td>No Resume</td></tr><tr><td>214</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>Issa Said AlHashemi</td><td>90918077</td><td>alhashemiissa9@gmail.com</td><td>2026-06-28 08:06:10</td><td>No Resume</td></tr><tr><td>221</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>Shahla Abdulaziz Ahmed Alrawahi </td><td>77313073</td><td>shahlaalrawahi07@gmail.com</td><td>2026-07-09 01:10:07</td><td>No Resume</td></tr><tr><td>236</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>Fatma</td><td>96020821</td><td>itsfatmaali_821@outlook.com</td><td>2026-07-22 02:15:18</td><td>No Resume</td></tr><tr><td>247</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>Maria</td><td>71747994</td><td>mariahilal972@gmail.com</td><td>2026-07-28 23:47:52</td><td>No Resume</td></tr><tr><td>258</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>Mohammed hamed</td><td>95529650</td><td>mohammedmoo185@gmail.com</td><td>2026-08-03 00:37:53</td><td><button type='button' class='btn btn-sm btn-info view-resume-btn' data-bs-toggle='modal' data-bs-target='#resumeModal' data-resume-path='../uploads/resumes/6a6f9589ce7d6.pdf'>View</button> <a href='../uploads/resumes/6a6f9589ce7d6.pdf' download class='btn btn-sm btn-success'>Download</a> <button type='button' class='btn btn-sm btn-danger delete-resume-btn' 
                                                    data-application-id='258' 
                                                    data-resume-path='uploads/resumes/6a6f9589ce7d6.pdf'>
                                                    Delete
                                              </button></td></tr><tr><td>259</td><td>21</td><td>---</td><td>Omani Graduate Trainees</td><td>---</td><td>Mohammed hamed</td><td>95529650</td><td>mohammedmoo185@gmail.com</td><td>2026-08-03 00:37:58</td><td><button type='button' class='btn btn-sm btn-info view-resume-btn' data-bs-toggle='modal' data-bs-target='#resumeModal' data-resume-path='../uploads/resumes/6a6f958e13534.pdf'>View</button> <a href='../uploads/resumes/6a6f958e13534.pdf' download class='btn btn-sm btn-success'>Download</a> <button type='button' class='btn btn-sm btn-danger delete-resume-btn' 
                                                    data-application-id='259' 
                                                    data-resume-path='uploads/resumes/6a6f958e13534.pdf'>
                                                    Delete
                                              </button></td></tr><tr><td>46</td><td>22</td><td>Leading Organization in Oman</td><td>Project Manager for GP Project</td><td>Oman</td><td>Masood Hussain</td><td>923335671031</td><td>rana.masud.vet@gmail.com</td><td>2026-01-09 20:50:53</td><td>No Resume</td></tr><tr><td>56</td><td>22</td><td>Leading Organization in Oman</td><td>Project Manager for GP Project</td><td>Oman</td><td>Dileep Nair</td><td>0096893342526</td><td>kumar.nairdileep@gmail.com</td><td>2026-01-17 10:03:25</td><td>No Resume</td></tr><tr><td>57</td><td>22</td><td>Leading Organization in Oman</td><td>Project Manager for GP Project</td><td>Oman</td><td>THATODE KRISHNA</td><td>99277013</td><td>krishnathatode@gmail.com</td><td>2026-01-17 21:55:19</td><td>No Resume</td></tr><tr><td>60</td><td>22</td><td>Leading Organization in Oman</td><td>Project Manager for GP Project</td><td>Oman</td><td>Elias V prakash </td><td>99658238</td><td>prakashev1976@gmail.com</td><td>2026-01-22 10:26:13</td><td>No Resume</td></tr><tr><td>66</td><td>22</td><td>Leading Organization in Oman</td><td>Project Manager for GP Project</td><td>Oman</td><td>Yagnesh Shukla</td><td>00919327931951</td><td>yagneshjshukla@hotmail.com</td><td>2026-02-28 11:01:33</td><td>No Resume</td></tr><tr><td>100</td><td>22</td><td>Leading Organization in Oman</td><td>Project Manager for GP Project</td><td>Oman</td><td>Dr Imran Wazir</td><td>923014245494</td><td>dr.imranwazir@yahoo.com</td><td>2026-03-16 12:38:05</td><td>No Resume</td></tr><tr><td>138</td><td>22</td><td>Leading Organization in Oman</td><td>Project Manager for GP Project</td><td>Oman</td><td>Ademola Adetifa </td><td>96897413355</td><td>adetifaademola2001@yahoo.com</td><td>2026-04-22 16:25:28</td><td>No Resume</td></tr><tr><td>170</td><td>22</td><td>Leading Organization in Oman</td><td>Project Manager for GP Project</td><td>Oman</td><td>SHYAM KISHOR SINGH</td><td>97308517</td><td>shyam3801@gmail.com</td><td>2026-05-26 12:47:43</td><td>No Resume</td></tr><tr><td>224</td><td>22</td><td>Leading Organization in Oman</td><td>Project Manager for GP Project</td><td>Oman</td><td>DR M Qayyum</td><td>00923005234932</td><td>doctormqayyum@gmail.com</td><td>2026-07-16 21:28:05</td><td>No Resume</td></tr><tr><td>104</td><td>23</td><td>Leading Oil &amp; Gas Construction Company</td><td>Multiple - Omani Nationals only</td><td>Oman</td><td>Sulaiman</td><td>71186383</td><td>saljabri323@gmail.com</td><td>2026-03-26 20:51:40</td><td>No Resume</td></tr><tr><td>105</td><td>23</td><td>Leading Oil &amp; Gas Construction Company</td><td>Multiple - Omani Nationals only</td><td>Oman</td><td>Sulaiman khamis hamed Aljabri </td><td>71186383</td><td>saljabri323@gmail.com</td><td>2026-03-26 20:52:32</td><td>No Resume</td></tr><tr><td>134</td><td>23</td><td>Leading Oil &amp; Gas Construction Company</td><td>Multiple - Omani Nationals only</td><td>Oman</td><td>Aiman Al amri</td><td>98552595</td><td>aimanal3amri@gmail.com</td><td>2026-04-21 04:46:14</td><td>No Resume</td></tr><tr><td>135</td><td>23</td><td>Leading Oil &amp; Gas Construction Company</td><td>Multiple - Omani Nationals only</td><td>Oman</td><td>Almonther Adil Khamis Alshukaili </td><td>93800809</td><td>almontherrrr35@gmail.com</td><td>2026-04-22 12:42:10</td><td>No Resume</td></tr><tr><td>160</td><td>23</td><td>Leading Oil &amp; Gas Construction Company</td><td>Multiple - Omani Nationals only</td><td>Oman</td><td>Muhanna</td><td>92844457</td><td>muhanna.civil@gmail.com</td><td>2026-05-25 02:30:08</td><td>No Resume</td></tr><tr><td>172</td><td>23</td><td>Leading Oil &amp; Gas Construction Company</td><td>Multiple - Omani Nationals only</td><td>Oman</td><td>Alhussain Ali</td><td>72751573</td><td>alhussain.ali9282@gmail.com</td><td>2026-06-02 22:58:49</td><td>No Resume</td></tr><tr><td>188</td><td>23</td><td>Leading Oil &amp; Gas Construction Company</td><td>Multiple - Omani Nationals only</td><td>Oman</td><td>Abdullah mohammed al busaidi</td><td>95065293</td><td>abdullahcce@hotmail.com</td><td>2026-06-04 09:36:23</td><td>No Resume</td></tr><tr><td>209</td><td>23</td><td>Leading Oil &amp; Gas Construction Company</td><td>Multiple - Omani Nationals only</td><td>Oman</td><td>Khalid Al Balushi </td><td>0096899664442</td><td>kal2cu@yahoo.com</td><td>2026-06-24 23:08:33</td><td>No Resume</td></tr><tr><td>218</td><td>23</td><td>Leading Oil &amp; Gas Construction Company</td><td>Multiple - Omani Nationals only</td><td>Oman</td><td>TALAL</td><td>95406961</td><td>tal96al.24@gmail.com</td><td>2026-07-07 09:56:46</td><td>No Resume</td></tr><tr><td>237</td><td>23</td><td>Leading Oil &amp; Gas Construction Company</td><td>Multiple - Omani Nationals only</td><td>Oman</td><td>Fahad Al zadjali</td><td>92699686</td><td>alzadjalifahad977@gmail.com</td><td>2026-07-25 22:04:08</td><td>No Resume</td></tr><tr><td>180</td><td>26</td><td>Leading Technology Company</td><td>AI Expert &amp; Consultant</td><td>Rusayl, Oman</td><td>Alhussain Ali</td><td>72751573</td><td>alhussain.ali9282@gmail.com</td><td>2026-06-02 23:33:58</td><td>No Resume</td></tr><tr><td>234</td><td>26</td><td>Leading Technology Company</td><td>AI Expert &amp; Consultant</td><td>Rusayl, Oman</td><td>Adama AmieManga</td><td>0096897941108</td><td>omanadama@gmail.com</td><td>2026-07-21 10:15:34</td><td>No Resume</td></tr><tr><td>181</td><td>27</td><td>Global Intelligence &amp; Investment Office</td><td>Investment Director</td><td>Oman</td><td>Alhussain Ali</td><td>72751573</td><td>alhussain.ali9282@gmail.com</td><td>2026-06-02 23:34:34</td><td>No Resume</td></tr><tr><td>49</td><td>29</td><td>Leading Technology Company</td><td>AI Quality Engineer</td><td>Rusayl, Oman</td><td>Mohammed </td><td>77173791</td><td>mohammed9394@icloud.com</td><td>2026-01-10 13:04:35</td><td>No Resume</td></tr><tr><td>52</td><td>29</td><td>Leading Technology Company</td><td>AI Quality Engineer</td><td>Rusayl, Oman</td><td>Mohammed </td><td>77173791</td><td>mohammed9394@icloud.com</td><td>2026-01-12 17:10:19</td><td>No Resume</td></tr><tr><td>63</td><td>29</td><td>Leading Technology Company</td><td>AI Quality Engineer</td><td>Rusayl, Oman</td><td>TestName</td><td>9447332469</td><td>TestEmail@gmail.com</td><td>2026-02-10 20:50:11</td><td>No Resume</td></tr><tr><td>64</td><td>29</td><td>Leading Technology Company</td><td>AI Quality Engineer</td><td>Rusayl, Oman</td><td>TestbyPrasanth</td><td>123456789</td><td>test@gmail.com</td><td>2026-02-16 17:09:33</td><td>No Resume</td></tr><tr><td>68</td><td>29</td><td>Leading Technology Company</td><td>AI Quality Engineer</td><td>Rusayl, Oman</td><td>Nasir Alsatmi </td><td>99684297</td><td>al-satmi99@hotmail.com</td><td>2026-03-03 06:48:06</td><td>No Resume</td></tr><tr><td>83</td><td>31</td><td>Leading engineering organization in Oman</td><td>Testing &amp; Commissioning Engineer</td><td>Oman</td><td>hamza ayoob</td><td>03317947041</td><td>hamzaayoob@outlook.com</td><td>2026-03-06 11:10:42</td><td>No Resume</td></tr><tr><td>95</td><td>31</td><td>Leading engineering organization in Oman</td><td>Testing &amp; Commissioning Engineer</td><td>Oman</td><td>test</td><td>123456799</td><td>test@gmail.com</td><td>2026-03-12 17:09:36</td><td>No Resume</td></tr><tr><td>130</td><td>31</td><td>Leading engineering organization in Oman</td><td>Testing &amp; Commissioning Engineer</td><td>Oman</td><td>tareq Alabbas</td><td>92950788</td><td>engtariq2007@gmail.com</td><td>2026-04-20 16:02:18</td><td>No Resume</td></tr><tr><td>179</td><td>31</td><td>Leading engineering organization in Oman</td><td>Testing &amp; Commissioning Engineer</td><td>Oman</td><td>Alhussain Ali</td><td>72751573</td><td>alhussain.ali9282@gmail.com</td><td>2026-06-02 23:32:55</td><td>No Resume</td></tr><tr><td>182</td><td>31</td><td>Leading engineering organization in Oman</td><td>Testing &amp; Commissioning Engineer</td><td>Oman</td><td>Alhussain Ali</td><td>72751573</td><td>alhussain.ali9282@gmail.com</td><td>2026-06-02 23:35:13</td><td>No Resume</td></tr><tr><td>196</td><td>31</td><td>Leading engineering organization in Oman</td><td>Testing &amp; Commissioning Engineer</td><td>Oman</td><td>Ahmed Kamel Elsakhawy</td><td>01008078102</td><td>elsakhawy.2011@gmail.com</td><td>2026-06-09 11:22:07</td><td>No Resume</td></tr><tr><td>82</td><td>32</td><td>Leading engineering organization in Oman</td><td>Power &amp; Substation Professionals</td><td>Oman</td><td>hamza ayoob</td><td>03317947041</td><td>hamzaayoob51@gmail.com</td><td>2026-03-06 11:09:48</td><td>No Resume</td></tr><tr><td>84</td><td>32</td><td>Leading engineering organization in Oman</td><td>Power &amp; Substation Professionals</td><td>Oman</td><td>Ahmed Osman</td><td>0096876893367</td><td>ahmed30mlk@gmail.com</td><td>2026-03-06 21:59:48</td><td>No Resume</td></tr><tr><td>106</td><td>32</td><td>Leading engineering organization in Oman</td><td>Power &amp; Substation Professionals</td><td>Oman</td><td>Mohamed Qurani </td><td>92041764</td><td>engmohamedqu@gmail.com</td><td>2026-03-27 12:27:16</td><td>No Resume</td></tr><tr><td>142</td><td>32</td><td>Leading engineering organization in Oman</td><td>Power &amp; Substation Professionals</td><td>Oman</td><td>Tyron Garcia</td><td>639681243997</td><td>tyrongarcia21@gmail.com</td><td>2026-04-28 21:42:58</td><td>No Resume</td></tr><tr><td>243</td><td>32</td><td>Leading engineering organization in Oman</td><td>Power &amp; Substation Professionals</td><td>Oman</td><td>Sheshmani Tripathi</td><td>919322583153</td><td>sheshmanitripathi25@gmail.com</td><td>2026-07-28 21:29:44</td><td>No Resume</td></tr><tr><td>69</td><td>34</td><td>Leading poultry organization</td><td>Sales Manager</td><td>Oman</td><td>Ahmed kamal </td><td>201126336633</td><td>a.ragaie@yahoo.com</td><td>2026-03-04 14:09:00</td><td>No Resume</td></tr><tr><td>70</td><td>34</td><td>Leading poultry organization</td><td>Sales Manager</td><td>Oman</td><td>Mohamed said</td><td>0538987461</td><td>dr_mohamedsaid89@yahoo.com</td><td>2026-03-04 14:25:14</td><td>No Resume</td></tr><tr><td>72</td><td>34</td><td>Leading poultry organization</td><td>Sales Manager</td><td>Oman</td><td>Samar Issa</td><td>71751480</td><td>hcsamarissa@gmail.com</td><td>2026-03-04 16:48:40</td><td>No Resume</td></tr><tr><td>73</td><td>34</td><td>Leading poultry organization</td><td>Sales Manager</td><td>Oman</td><td>Samar Issa</td><td>71751480</td><td>hcsamarissa@gmail.com</td><td>2026-03-04 16:49:54</td><td>No Resume</td></tr><tr><td>74</td><td>34</td><td>Leading poultry organization</td><td>Sales Manager</td><td>Oman</td><td>Abdur Rafay</td><td>95140479</td><td>rafaymirza1905@gmail.com</td><td>2026-03-04 17:00:35</td><td>No Resume</td></tr><tr><td>75</td><td>34</td><td>Leading poultry organization</td><td>Sales Manager</td><td>Oman</td><td>Dr Karim Ullah</td><td>966579435177</td><td>dr.koringo@gmail.com</td><td>2026-03-04 17:21:48</td><td>No Resume</td></tr><tr><td>76</td><td>34</td><td>Leading poultry organization</td><td>Sales Manager</td><td>Oman</td><td>Abdallah Ahmad Aly</td><td>00966532947023</td><td>abdallahahmad030@gmail.com</td><td>2026-03-04 18:06:21</td><td>No Resume</td></tr><tr><td>77</td><td>34</td><td>Leading poultry organization</td><td>Sales Manager</td><td>Oman</td><td>Jamal Al Qassmi </td><td>91511511</td><td>jamal.alqassmi@gmail.com</td><td>2026-03-04 20:50:09</td><td>No Resume</td></tr><tr><td>78</td><td>34</td><td>Leading poultry organization</td><td>Sales Manager</td><td>Oman</td><td>Hammad</td><td>923226402891</td><td>drhammadqamar@gmail.com</td><td>2026-03-04 21:26:58</td><td>No Resume</td></tr><tr><td>79</td><td>34</td><td>Leading poultry organization</td><td>Sales Manager</td><td>Oman</td><td>Tamera Ahmed </td><td>0536645792</td><td>tamer.saied12@gmail.com</td><td>2026-03-05 11:53:50</td><td>No Resume</td></tr><tr><td>80</td><td>34</td><td>Leading poultry organization</td><td>Sales Manager</td><td>Oman</td><td>Khalil Nassar</td><td>0035795500461</td><td>khalil.code@outlook.com</td><td>2026-03-05 14:45:04</td><td>No Resume</td></tr><tr><td>81</td><td>34</td><td>Leading poultry organization</td><td>Sales Manager</td><td>Oman</td><td>Mostafa Ebrahim Mostafa</td><td>00201080900137</td><td>drmostafaebrahim1991@gmail.com</td><td>2026-03-06 06:54:38</td><td>No Resume</td></tr><tr><td>87</td><td>35</td><td>A leading business organization in Oman</td><td>Head of Events &amp; Communications</td><td>Muscat</td><td>Hussein Al Fadhil</td><td>99881977</td><td>hussein.alfadhil@gmail.com</td><td>2026-03-11 11:24:46</td><td>No Resume</td></tr><tr><td>125</td><td>35</td><td>A leading business organization in Oman</td><td>Head of Events &amp; Communications</td><td>Muscat</td><td>SHAMIL M R</td><td>6005163772</td><td>Shamillulu1996@gmail.com</td><td>2026-04-18 10:35:50</td><td>No Resume</td></tr><tr><td>143</td><td>35</td><td>A leading business organization in Oman</td><td>Head of Events &amp; Communications</td><td>Muscat</td><td>Liane Noronha</td><td>95228525</td><td>liane_noronha@hotmail.com</td><td>2026-05-04 00:17:42</td><td>No Resume</td></tr><tr><td>148</td><td>35</td><td>A leading business organization in Oman</td><td>Head of Events &amp; Communications</td><td>Muscat</td><td>Anna Chesalina</td><td>0096894091209</td><td>annachesalina@gmail.com</td><td>2026-05-07 11:11:36</td><td>No Resume</td></tr><tr><td>153</td><td>35</td><td>A leading business organization in Oman</td><td>Head of Events &amp; Communications</td><td>Muscat</td><td>Priya Elango</td><td>92263576</td><td>priyadelango@gmail.com</td><td>2026-05-13 20:38:52</td><td>No Resume</td></tr><tr><td>166</td><td>35</td><td>A leading business organization in Oman</td><td>Head of Events &amp; Communications</td><td>Muscat</td><td>Sadiq Khan</td><td>99666993</td><td>sadiqkhanfoundation@gmail.com</td><td>2026-05-25 12:07:03</td><td>No Resume</td></tr><tr><td>178</td><td>35</td><td>A leading business organization in Oman</td><td>Head of Events &amp; Communications</td><td>Muscat</td><td>Alhussain Ali</td><td>72751573</td><td>alhussain.ali9282@gmail.com</td><td>2026-06-02 23:15:50</td><td>No Resume</td></tr><tr><td>226</td><td>35</td><td>A leading business organization in Oman</td><td>Head of Events &amp; Communications</td><td>Muscat</td><td>Muhammad Waqas</td><td>923313894602</td><td>jamwaqas844@gmail.com</td><td>2026-07-17 07:31:38</td><td>No Resume</td></tr><tr><td>88</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Nabil AROUA</td><td>5144667501</td><td>aroua.nabil12@gmail.com</td><td>2026-03-11 21:49:00</td><td>No Resume</td></tr><tr><td>89</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Muhammad Asim iqbal</td><td>03071519464</td><td>masimiqbal9694@gmail.com</td><td>2026-03-11 23:18:31</td><td>No Resume</td></tr><tr><td>90</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Muhammad Naeem Aslam</td><td>00923487795329</td><td>maliknaeemarl@gmail.com</td><td>2026-03-12 02:16:12</td><td>No Resume</td></tr><tr><td>91</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Abdallah Eldeeb </td><td>201011061506</td><td>Abdallaheldeeb112@gmail.com</td><td>2026-03-12 08:13:26</td><td>No Resume</td></tr><tr><td>92</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Muhammad Shafiq UR Rehman</td><td>923026837621</td><td>malikshafiqmzg@gmail.com</td><td>2026-03-12 10:22:24</td><td>No Resume</td></tr><tr><td>93</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Muhammad Bilal</td><td>03018053868</td><td>muhammadbilal53868@gmail.com</td><td>2026-03-12 13:20:39</td><td>No Resume</td></tr><tr><td>96</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Khalil Nassar</td><td>0035795500461</td><td>khalil.code@outlook.com</td><td>2026-03-12 17:18:21</td><td>No Resume</td></tr><tr><td>97</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Tonderai Gono</td><td>447707598223</td><td>tonderaigono100@gmail.com</td><td>2026-03-12 23:36:03</td><td>No Resume</td></tr><tr><td>98</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Tariq Aziz</td><td>03159702436</td><td>drtariqazizkhattak@gmail.com</td><td>2026-03-13 05:57:21</td><td>No Resume</td></tr><tr><td>99</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Test IT</td><td>99990000</td><td>it.jminternational@gmail.com</td><td>2026-03-13 14:06:08</td><td>No Resume</td></tr><tr><td>101</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Muhammad Saad</td><td>03212957549</td><td>saadsadiq1991@outlook.com</td><td>2026-03-24 15:58:23</td><td>No Resume</td></tr><tr><td>102</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Ahmed Kamel</td><td>00201012212242</td><td>a.kamel87@yahoo.com</td><td>2026-03-25 21:28:20</td><td>No Resume</td></tr><tr><td>103</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Ahmed Kamel</td><td>00201012212242</td><td>elambrtor@gmail.com</td><td>2026-03-25 21:30:41</td><td>No Resume</td></tr><tr><td>107</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Hesham Kotb</td><td>966551914950</td><td>albeetar1@yahoo.com</td><td>2026-04-12 13:57:10</td><td>No Resume</td></tr><tr><td>108</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Dr  Hasnain Ejaz</td><td>971565726271</td><td>hasnainijaz98@gmail.com</td><td>2026-04-12 15:24:05</td><td>No Resume</td></tr><tr><td>109</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Umar Farooq </td><td>77318669</td><td>drumarvet@hotmail.com</td><td>2026-04-12 18:36:14</td><td>No Resume</td></tr><tr><td>110</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Asad Raza</td><td>03136804309</td><td>asadraza8345@gmail.com</td><td>2026-04-12 18:41:41</td><td>No Resume</td></tr><tr><td>111</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Dr Tayyeb ullah </td><td>03189091932</td><td>vetdrtayyeb1234@gmail.com</td><td>2026-04-12 19:13:43</td><td>No Resume</td></tr><tr><td>112</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Tayyeb Ullah</td><td>03189091932</td><td>vetdrtayyeb1234@gmail.com</td><td>2026-04-12 19:14:29</td><td>No Resume</td></tr><tr><td>113</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Joyens</td><td>9494286600</td><td>joyens.vet@gmail.com</td><td>2026-04-12 19:27:23</td><td>No Resume</td></tr><tr><td>114</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Toram ganga eswara rao </td><td>916304316202</td><td>eswartoram@gmail.com</td><td>2026-04-12 20:07:53</td><td>No Resume</td></tr><tr><td>115</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Dr Nasrullah </td><td>923362316566</td><td>nasrullahnasar274@gmail.com</td><td>2026-04-12 20:38:55</td><td>No Resume</td></tr><tr><td>116</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Pavan Kumar Mandalapu </td><td>9849808154</td><td>mandalapupava0@gmail.com</td><td>2026-04-13 01:55:05</td><td>No Resume</td></tr><tr><td>117</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Maher mohsin alforqani</td><td>95999674</td><td>mahermohsin699@gmail.com</td><td>2026-04-13 18:31:42</td><td>No Resume</td></tr><tr><td>118</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Muhamamd Asad Ramzan</td><td>966531498850</td><td>asad15770@gmail.com</td><td>2026-04-14 09:13:01</td><td>No Resume</td></tr><tr><td>119</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Muhammad Asad Ramzan</td><td>966531498850</td><td>ramzanasad87@gmail.com</td><td>2026-04-14 09:27:20</td><td>No Resume</td></tr><tr><td>120</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Gomaa Yakout Ahmed Elhaddad </td><td>0021006193078</td><td>gomaaelhaddad@gmail.com</td><td>2026-04-14 15:00:48</td><td>No Resume</td></tr><tr><td>121</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>MOHAMMED AL SHAMSI</td><td>98571197</td><td>alshamsi.m89@gmail.com</td><td>2026-04-14 15:15:59</td><td>No Resume</td></tr><tr><td>122</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Muhammad Hassama</td><td>03229625665</td><td>muhammadhassama65@gmail.com</td><td>2026-04-15 12:04:23</td><td>No Resume</td></tr><tr><td>128</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Mohamed Fahmi AL Busaidi</td><td>94444693</td><td>mohamed.albusaidi25@gmail.com</td><td>2026-04-19 23:52:58</td><td>No Resume</td></tr><tr><td>136</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Mazin Adil Alshukaili </td><td>92240815</td><td>mak2020a75@gmail.com</td><td>2026-04-22 12:47:13</td><td>No Resume</td></tr><tr><td>137</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Mddad Nasser Hamood alnahbi</td><td>93699799</td><td>maddad.alnaabi97@gmail.com</td><td>2026-04-22 15:47:53</td><td>No Resume</td></tr><tr><td>139</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Mddad Nasser Hamood alnahbi</td><td>93699799</td><td>maddad.alnaabi97@gmail.com</td><td>2026-04-22 21:21:19</td><td>No Resume</td></tr><tr><td>141</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Amarnadh Puppala</td><td>07747971884</td><td>amarnadhbadrinadh@gmail.com</td><td>2026-04-27 10:52:50</td><td>No Resume</td></tr><tr><td>149</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Muataz Fadol</td><td>971509669147</td><td>muatazpoult@gmail.com</td><td>2026-05-11 20:53:10</td><td>No Resume</td></tr><tr><td>150</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Muataz Fadol</td><td>971509669147</td><td>muatazpoult@gmail.com</td><td>2026-05-11 20:53:50</td><td>No Resume</td></tr><tr><td>155</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Abdullah alsarhani</td><td>96459522</td><td>al-sarhani88@hotmail.com</td><td>2026-05-14 09:59:53</td><td>No Resume</td></tr><tr><td>161</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Abdul Tahoor Khan</td><td>966568103598</td><td>abdultahoor@gmail.com</td><td>2026-05-25 02:59:35</td><td>No Resume</td></tr><tr><td>165</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Muhammad Javed Khan</td><td>90192012</td><td>Javedboc@yahoo.com</td><td>2026-05-25 12:03:19</td><td>No Resume</td></tr><tr><td>177</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Alhussain Ali</td><td>72751573</td><td>alhussain.ali9282@gmail.com</td><td>2026-06-02 23:14:47</td><td>No Resume</td></tr><tr><td>192</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Renganathan sellaperumal </td><td>79336077</td><td>srenganathan91@gmail.com</td><td>2026-06-04 17:23:01</td><td>No Resume</td></tr><tr><td>197</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Ahmed Kamel Elsakhawy</td><td>01008078102</td><td>elsakhawy.2011@gmail.com</td><td>2026-06-09 11:24:12</td><td>No Resume</td></tr><tr><td>200</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Hussein </td><td>00966548542429</td><td>ht1606552@gmail.com</td><td>2026-06-15 09:02:15</td><td>No Resume</td></tr><tr><td>210</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Khalid Al Balushi </td><td>0096899664442</td><td>kal2cu@yahoo.com</td><td>2026-06-24 23:11:48</td><td>No Resume</td></tr><tr><td>220</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Dewashish kumar </td><td>6299812002</td><td>kr.dewashish17@gmail.com</td><td>2026-07-08 12:49:15</td><td>No Resume</td></tr><tr><td>225</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Robson Okello</td><td>265897465077</td><td>engokellorobson@gmail.com</td><td>2026-07-17 02:02:53</td><td>No Resume</td></tr><tr><td>227</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Amjad Ali </td><td>03093966463</td><td>amjad.ali.ryk110@gmail.com</td><td>2026-07-17 12:11:18</td><td>No Resume</td></tr><tr><td>229</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Husnain Ullah</td><td>03129641865</td><td>husnainch5531@gmail.com</td><td>2026-07-18 18:16:25</td><td>No Resume</td></tr><tr><td>232</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>amir elsaiiad</td><td>00966532809571</td><td>elsaiiad.vet@gmail.com</td><td>2026-07-20 05:47:32</td><td>No Resume</td></tr><tr><td>238</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Aashish Mahat</td><td>009779841670572</td><td>cobb.draashish@gmail.com</td><td>2026-07-25 22:45:00</td><td>No Resume</td></tr><tr><td>240</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Husnain Ullah</td><td>03129641865</td><td>husnainch5531@gmail.com</td><td>2026-07-27 15:20:13</td><td>No Resume</td></tr><tr><td>244</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Muhammad Kashif</td><td>923059670844</td><td>mk7942306@gmail.com</td><td>2026-07-28 22:23:44</td><td>No Resume</td></tr><tr><td>245</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Mahmoud Ewida</td><td>0565283553</td><td>engmahmoudewida@gmail.com</td><td>2026-07-28 22:38:23</td><td>No Resume</td></tr><tr><td>246</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Mahmoud Ewida</td><td>0565283553</td><td>engmahmoudewida@gmail.com</td><td>2026-07-28 22:38:48</td><td>No Resume</td></tr><tr><td>248</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Syed Majid Bukhari</td><td>03090808499</td><td>syedmajid1241@gmail.com</td><td>2026-07-29 00:25:19</td><td>No Resume</td></tr><tr><td>249</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Mahendran Kuppusamy</td><td>94493633</td><td>mahendrankuppusamy1982@gmail.com</td><td>2026-07-29 08:56:22</td><td>No Resume</td></tr><tr><td>251</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Edidiong Titus Okon</td><td>09032837756</td><td>eddidiongokon@gmail.com</td><td>2026-07-29 20:18:50</td><td>No Resume</td></tr><tr><td>252</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Edidiong Titus Okon</td><td>09032837756</td><td>eddidiongokon@gmail.com</td><td>2026-07-29 20:19:09</td><td>No Resume</td></tr><tr><td>255</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>NADEEM KHAN</td><td>92389140</td><td>nadeem.shenu@gmail.com</td><td>2026-08-01 21:17:17</td><td><button type='button' class='btn btn-sm btn-info view-resume-btn' data-bs-toggle='modal' data-bs-target='#resumeModal' data-resume-path='../uploads/resumes/6a6e1505ef9f6.docx'>View</button> <a href='../uploads/resumes/6a6e1505ef9f6.docx' download class='btn btn-sm btn-success'>Download</a> <button type='button' class='btn btn-sm btn-danger delete-resume-btn' 
                                                    data-application-id='255' 
                                                    data-resume-path='uploads/resumes/6a6e1505ef9f6.docx'>
                                                    Delete
                                              </button></td></tr><tr><td>260</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Kabir Ibrahim Yerima</td><td>2349066601857</td><td>mangayerima@gmail.com</td><td>2026-08-03 05:42:27</td><td><button type='button' class='btn btn-sm btn-info view-resume-btn' data-bs-toggle='modal' data-bs-target='#resumeModal' data-resume-path='../uploads/resumes/6a6fdceb31f86.pdf'>View</button> <a href='../uploads/resumes/6a6fdceb31f86.pdf' download class='btn btn-sm btn-success'>Download</a> <button type='button' class='btn btn-sm btn-danger delete-resume-btn' 
                                                    data-application-id='260' 
                                                    data-resume-path='uploads/resumes/6a6fdceb31f86.pdf'>
                                                    Delete
                                              </button></td></tr><tr><td>261</td><td>36</td><td>Leading poultry company in Oman</td><td>Various</td><td>Oman</td><td>Kabir Ibrahim Yerima</td><td>2349066601857</td><td>mangayeirma@gmail.com</td><td>2026-08-03 05:43:17</td><td><button type='button' class='btn btn-sm btn-info view-resume-btn' data-bs-toggle='modal' data-bs-target='#resumeModal' data-resume-path='../uploads/resumes/6a6fdd1d15eb3.pdf'>View</button> <a href='../uploads/resumes/6a6fdd1d15eb3.pdf' download class='btn btn-sm btn-success'>Download</a> <button type='button' class='btn btn-sm btn-danger delete-resume-btn' 
                                                    data-application-id='261' 
                                                    data-resume-path='uploads/resumes/6a6fdd1d15eb3.pdf'>
                                                    Delete
                                              </button></td></tr><tr><td>133</td><td>40</td><td>Leading automobile company</td><td>Various Technical</td><td>Oman</td><td>Mahmood Raad Al Zadjali</td><td>97142434</td><td>mhzdjali@gmail.com</td><td>2026-04-21 01:25:43</td><td>No Resume</td></tr><tr><td>164</td><td>40</td><td>Leading automobile company</td><td>Various Technical</td><td>Oman</td><td>Toney Rajan</td><td>0097471165661</td><td>toneyrajan@live.com</td><td>2026-05-25 11:34:36</td><td>No Resume</td></tr><tr><td>167</td><td>40</td><td>Leading automobile company</td><td>Various Technical</td><td>Oman</td><td>Rashid Mubark</td><td>98993316</td><td>bualij654@gmail.com</td><td>2026-05-25 14:34:41</td><td>No Resume</td></tr><tr><td>184</td><td>40</td><td>Leading automobile company</td><td>Various Technical</td><td>Oman</td><td>Hafiz Muhammad Waqas </td><td>91722695</td><td>hwaqas2436@gmail.com</td><td>2026-06-03 00:47:32</td><td>No Resume</td></tr><tr><td>185</td><td>40</td><td>Leading automobile company</td><td>Various Technical</td><td>Oman</td><td>Hafiz Muhammad Waqas </td><td>91722695</td><td>hwaqas2436@gmail.com</td><td>2026-06-03 00:49:26</td><td>No Resume</td></tr><tr><td>186</td><td>40</td><td>Leading automobile company</td><td>Various Technical</td><td>Oman</td><td>Hafiz Muhammad Waqas </td><td>91722695</td><td>hwaqas2436@gmail.com</td><td>2026-06-03 00:54:10</td><td>No Resume</td></tr><tr><td>217</td><td>40</td><td>Leading automobile company</td><td>Various Technical</td><td>Oman</td><td>TALAL</td><td>95406961</td><td>tal96al.24@gmail.com</td><td>2026-07-07 09:10:51</td><td>No Resume</td></tr><tr><td>146</td><td>41</td><td>Leading non-profit organization</td><td>Event &amp; Sponsorship Manager</td><td>Muscat</td><td>Loay Ali Abdullah Al Harthy</td><td>94993939</td><td>loay.alharthy34@gmail.com</td><td>2026-05-06 17:17:47</td><td>No Resume</td></tr><tr><td>147</td><td>41</td><td>Leading non-profit organization</td><td>Event &amp; Sponsorship Manager</td><td>Muscat</td><td>Anna Chesalina</td><td>0096894091209</td><td>annachesalina@gmail.com</td><td>2026-05-07 10:55:52</td><td>No Resume</td></tr><tr><td>152</td><td>41</td><td>Leading non-profit organization</td><td>Event &amp; Sponsorship Manager</td><td>Muscat</td><td>Priya Elango</td><td>92263576</td><td>priyadelango@gmail.com</td><td>2026-05-13 20:35:01</td><td>No Resume</td></tr><tr><td>168</td><td>41</td><td>Leading non-profit organization</td><td>Event &amp; Sponsorship Manager</td><td>Muscat</td><td>M A Nawaz</td><td>97608990</td><td>ma.nawaz98@gmail.com</td><td>2026-05-25 16:48:45</td><td>No Resume</td></tr><tr><td>175</td><td>41</td><td>Leading non-profit organization</td><td>Event &amp; Sponsorship Manager</td><td>Muscat</td><td>Alhussain Ali</td><td>72751573</td><td>alhussain.ali9282@gmail.com</td><td>2026-06-02 23:12:41</td><td>No Resume</td></tr><tr><td>176</td><td>41</td><td>Leading non-profit organization</td><td>Event &amp; Sponsorship Manager</td><td>Muscat</td><td>Alhussain Ali</td><td>72751573</td><td>alhussain.ali9282@gmail.com</td><td>2026-06-02 23:13:55</td><td>No Resume</td></tr><tr><td>233</td><td>41</td><td>Leading non-profit organization</td><td>Event &amp; Sponsorship Manager</td><td>Muscat</td><td>isra</td><td>77057336</td><td>essba1443@gmail.com</td><td>2026-07-20 11:17:08</td><td>No Resume</td></tr><tr><td>254</td><td>41</td><td>Leading non-profit organization</td><td>Event &amp; Sponsorship Manager</td><td>Muscat</td><td>Jehangir Shah</td><td>03009339052</td><td>jehangirshahgardaizee@yahoo.com</td><td>2026-07-31 00:24:35</td><td><button type='button' class='btn btn-sm btn-info view-resume-btn' data-bs-toggle='modal' data-bs-target='#resumeModal' data-resume-path='../uploads/resumes/6a6b9deb199df.pdf'>View</button> <a href='../uploads/resumes/6a6b9deb199df.pdf' download class='btn btn-sm btn-success'>Download</a> <button type='button' class='btn btn-sm btn-danger delete-resume-btn' 
                                                    data-application-id='254' 
                                                    data-resume-path='uploads/resumes/6a6b9deb199df.pdf'>
                                                    Delete
                                              </button></td></tr><tr><td>158</td><td>42</td><td>Leading FMCG company in Muscat</td><td>FMCG Roles - Multiple Positions</td><td>Muscat</td><td>Omar Alaywan</td><td>971556660102</td><td>oalaywan@gmail.com</td><td>2026-05-20 14:26:18</td><td>No Resume</td></tr><tr><td>159</td><td>42</td><td>Leading FMCG company in Muscat</td><td>FMCG Roles - Multiple Positions</td><td>Muscat</td><td>Ziyad Firfire</td><td>971503932683</td><td>ziyadfirfire@hotmail.com</td><td>2026-05-21 12:02:29</td><td>No Resume</td></tr><tr><td>162</td><td>42</td><td>Leading FMCG company in Muscat</td><td>FMCG Roles - Multiple Positions</td><td>Muscat</td><td>Himanshu Thapliyal </td><td>00919560971986</td><td>hthapliyal12@gmail.com</td><td>2026-05-25 08:18:50</td><td>No Resume</td></tr><tr><td>163</td><td>42</td><td>Leading FMCG company in Muscat</td><td>FMCG Roles - Multiple Positions</td><td>Muscat</td><td>Imran Ul Huda</td><td>00923333969763</td><td>imranulhuda86@gmail.com</td><td>2026-05-25 10:36:30</td><td>No Resume</td></tr><tr><td>174</td><td>42</td><td>Leading FMCG company in Muscat</td><td>FMCG Roles - Multiple Positions</td><td>Muscat</td><td>Alhussain Ali</td><td>72751573</td><td>alhussain.ali9282@gmail.com</td><td>2026-06-02 23:00:28</td><td>No Resume</td></tr><tr><td>193</td><td>42</td><td>Leading FMCG company in Muscat</td><td>FMCG Roles - Multiple Positions</td><td>Muscat</td><td>Nishpa Das</td><td>93966410</td><td>dasnishpa@gmail.com</td><td>2026-06-08 18:59:45</td><td>No Resume</td></tr><tr><td>194</td><td>42</td><td>Leading FMCG company in Muscat</td><td>FMCG Roles - Multiple Positions</td><td>Muscat</td><td>Nishpa Das</td><td>93966410</td><td>dasnishpa@gmail.com</td><td>2026-06-08 19:00:13</td><td>No Resume</td></tr><tr><td>195</td><td>42</td><td>Leading FMCG company in Muscat</td><td>FMCG Roles - Multiple Positions</td><td>Muscat</td><td>Srikesh Subash</td><td>98489727</td><td>srikeshsb7@gmail.com</td><td>2026-06-09 01:26:26</td><td>No Resume</td></tr><tr><td>202</td><td>42</td><td>Leading FMCG company in Muscat</td><td>FMCG Roles - Multiple Positions</td><td>Muscat</td><td>Rameez Parmar</td><td>99179702</td><td>rameezparmar89@gmail.com</td><td>2026-06-15 16:52:34</td><td>No Resume</td></tr><tr><td>207</td><td>42</td><td>Leading FMCG company in Muscat</td><td>FMCG Roles - Multiple Positions</td><td>Muscat</td><td>ASHLEY LOBO</td><td>92742687</td><td>ashleylobo12@gmail.com</td><td>2026-06-24 16:27:17</td><td>No Resume</td></tr><tr><td>208</td><td>42</td><td>Leading FMCG company in Muscat</td><td>FMCG Roles - Multiple Positions</td><td>Muscat</td><td>Hassan Hamdan</td><td>99655882</td><td>signor.hamdan@hotmail.com</td><td>2026-06-24 23:05:01</td><td>No Resume</td></tr><tr><td>215</td><td>42</td><td>Leading FMCG company in Muscat</td><td>FMCG Roles - Multiple Positions</td><td>Muscat</td><td>Mona sarghini</td><td>3717688181</td><td>monasarghinimba@gmail.com</td><td>2026-06-30 20:26:11</td><td>No Resume</td></tr><tr><td>216</td><td>42</td><td>Leading FMCG company in Muscat</td><td>FMCG Roles - Multiple Positions</td><td>Muscat</td><td>Roshan R Nair </td><td>00971561077394</td><td>Mail.roshan.r.n@gmail.com</td><td>2026-07-01 14:05:48</td><td>No Resume</td></tr><tr><td>239</td><td>42</td><td>Leading FMCG company in Muscat</td><td>FMCG Roles - Multiple Positions</td><td>Muscat</td><td>Sharon John David</td><td>71151226</td><td>sharonjd001@gmail.com</td><td>2026-07-27 10:41:43</td><td>No Resume</td></tr><tr><td>256</td><td>42</td><td>Leading FMCG company in Muscat</td><td>FMCG Roles - Multiple Positions</td><td>Muscat</td><td>Mohammed hamed</td><td>95529650</td><td>muhammedhamed099@gmail.com</td><td>2026-08-03 00:32:50</td><td><button type='button' class='btn btn-sm btn-info view-resume-btn' data-bs-toggle='modal' data-bs-target='#resumeModal' data-resume-path='../uploads/resumes/6a6f945a4e903.pdf'>View</button> <a href='../uploads/resumes/6a6f945a4e903.pdf' download class='btn btn-sm btn-success'>Download</a> <button type='button' class='btn btn-sm btn-danger delete-resume-btn' 
                                                    data-application-id='256' 
                                                    data-resume-path='uploads/resumes/6a6f945a4e903.pdf'>
                                                    Delete
                                              </button></td></tr><tr><td>169</td><td>43</td><td>Leading organization in Oman</td><td>Assistant Finance Manager</td><td>Oman</td><td>Owais Ahmed</td><td>923072830355</td><td>owaisahmed.cba.caf@gmail.com</td><td>2026-05-25 18:19:30</td><td>No Resume</td></tr><tr><td>171</td><td>43</td><td>Leading organization in Oman</td><td>Assistant Finance Manager</td><td>Oman</td><td>samir raikar</td><td>9322399634</td><td>raikar.samir@gmail.com</td><td>2026-05-31 00:36:07</td><td>No Resume</td></tr><tr><td>173</td><td>43</td><td>Leading organization in Oman</td><td>Assistant Finance Manager</td><td>Oman</td><td>Alhussain Ali</td><td>72751573</td><td>alhussain.ali9282@gmail.com</td><td>2026-06-02 22:59:39</td><td>No Resume</td></tr><tr><td>187</td><td>43</td><td>Leading organization in Oman</td><td>Assistant Finance Manager</td><td>Oman</td><td>samir raikar</td><td>9322399634</td><td>raikar.samir@gmail.com</td><td>2026-06-03 23:10:35</td><td>No Resume</td></tr><tr><td>189</td><td>43</td><td>Leading organization in Oman</td><td>Assistant Finance Manager</td><td>Oman</td><td>Kulthoom Yousuf Al Habsi</td><td>93298468</td><td>kulthoomym@hotmail.com</td><td>2026-06-04 12:02:59</td><td>No Resume</td></tr><tr><td>190</td><td>43</td><td>Leading organization in Oman</td><td>Assistant Finance Manager</td><td>Oman</td><td>Nasser Said Saleh AL Ghafri</td><td>96144569</td><td>na96144569na@gmail.com</td><td>2026-06-04 14:43:27</td><td>No Resume</td></tr><tr><td>191</td><td>43</td><td>Leading organization in Oman</td><td>Assistant Finance Manager</td><td>Oman</td><td>Nasser Said Saleh AL Ghafri</td><td>96144569</td><td>na96144569na@gmail.com</td><td>2026-06-04 15:56:21</td><td>No Resume</td></tr><tr><td>198</td><td>43</td><td>Leading organization in Oman</td><td>Assistant Finance Manager</td><td>Oman</td><td>Abduljabbar Al buloshi</td><td>98298317</td><td>ajmohican@gmail.com</td><td>2026-06-09 16:35:40</td><td>No Resume</td></tr><tr><td>204</td><td>43</td><td>Leading organization in Oman</td><td>Assistant Finance Manager</td><td>Oman</td><td>Khalil sulaiman saif alhashami </td><td>92255684</td><td>Khalil-19993@hotmail.com</td><td>2026-06-18 13:21:56</td><td>No Resume</td></tr><tr><td>213</td><td>43</td><td>Leading organization in Oman</td><td>Assistant Finance Manager</td><td>Oman</td><td>Khalil sulaiman saif alhashami </td><td>92255684</td><td>Khalil-19993@hotmail.com</td><td>2026-06-26 10:47:54</td><td>No Resume</td></tr><tr><td>219</td><td>43</td><td>Leading organization in Oman</td><td>Assistant Finance Manager</td><td>Oman</td><td>Agnivesh Sathe</td><td>971506439212</td><td>agnivesh.sathe@gmail.com</td><td>2026-07-07 23:42:20</td><td>No Resume</td></tr><tr><td>223</td><td>43</td><td>Leading organization in Oman</td><td>Assistant Finance Manager</td><td>Oman</td><td>Siham saleem</td><td>71163956</td><td>ramies1960@gmail.com</td><td>2026-07-14 00:40:30</td><td>No Resume</td></tr><tr><td>235</td><td>43</td><td>Leading organization in Oman</td><td>Assistant Finance Manager</td><td>Oman</td><td>Nasra Ahmed Suleiman Al Sibani</td><td>96444767</td><td>nassra003@gmail.com</td><td>2026-07-21 13:27:35</td><td>No Resume</td></tr><tr><td>250</td><td>43</td><td>Leading organization in Oman</td><td>Assistant Finance Manager</td><td>Oman</td><td>Adarsh Shastry</td><td>96362652</td><td>adarshshastry84@gmail.com</td><td>2026-07-29 18:39:31</td><td>No Resume</td></tr><tr><td>257</td><td>43</td><td>Leading organization in Oman</td><td>Assistant Finance Manager</td><td>Oman</td><td>Mohammed hamed</td><td>95529650</td><td>mohammedmoo185@gmail.com</td><td>2026-08-03 00:34:36</td><td><button type='button' class='btn btn-sm btn-info view-resume-btn' data-bs-toggle='modal' data-bs-target='#resumeModal' data-resume-path='../uploads/resumes/6a6f94c4e8748.pdf'>View</button> <a href='../uploads/resumes/6a6f94c4e8748.pdf' download class='btn btn-sm btn-success'>Download</a> <button type='button' class='btn btn-sm btn-danger delete-resume-btn' 
                                                    data-application-id='257' 
                                                    data-resume-path='uploads/resumes/6a6f94c4e8748.pdf'>
                                                    Delete
                                              </button></td></tr><tr><td>199</td><td>44</td><td>Leading luxury resort in Jebel Akhdar</td><td>HR &amp; Learning and Development Executive</td><td>Jebel Akhdar, Oman</td><td>Musdalifa Nouman</td><td>93592088</td><td>muzii.nouman@gmail.com</td><td>2026-06-14 16:55:24</td><td>No Resume</td></tr><tr><td>205</td><td>44</td><td>Leading luxury resort in Jebel Akhdar</td><td>HR &amp; Learning and Development Executive</td><td>Jebel Akhdar, Oman</td><td>Isam Albalushi</td><td>97658061</td><td>Isam_albalushi@30hotmail.com</td><td>2026-06-22 23:15:56</td><td>No Resume</td></tr><tr><td>206</td><td>44</td><td>Leading luxury resort in Jebel Akhdar</td><td>HR &amp; Learning and Development Executive</td><td>Jebel Akhdar, Oman</td><td>ASHLEY LOBO</td><td>92742687</td><td>ashleyagnelolobo@gmail.com</td><td>2026-06-24 16:24:18</td><td>No Resume</td></tr><tr><td>222</td><td>44</td><td>Leading luxury resort in Jebel Akhdar</td><td>HR &amp; Learning and Development Executive</td><td>Jebel Akhdar, Oman</td><td>Sulaiman Al Lamki</td><td>99780999</td><td>s999allamki@yahoo.com</td><td>2026-07-13 17:16:35</td><td>No Resume</td></tr><tr><td>228</td><td>44</td><td>Leading luxury resort in Jebel Akhdar</td><td>HR &amp; Learning and Development Executive</td><td>Jebel Akhdar, Oman</td><td>Abdullah Alsaadi</td><td>92227673</td><td>abdullah.assadi1991@gmail.com</td><td>2026-07-18 03:09:26</td><td>No Resume</td></tr><tr><td>230</td><td>44</td><td>Leading luxury resort in Jebel Akhdar</td><td>HR &amp; Learning and Development Executive</td><td>Jebel Akhdar, Oman</td><td></td><td></td><td></td><td>2026-07-18 23:55:42</td><td>No Resume</td></tr><tr><td>231</td><td>44</td><td>Leading luxury resort in Jebel Akhdar</td><td>HR &amp; Learning and Development Executive</td><td>Jebel Akhdar, Oman</td><td></td><td></td><td></td><td>2026-07-19 04:37:02</td><td>No Resume</td></tr><tr><td>241</td><td>44</td><td>Leading luxury resort in Jebel Akhdar</td><td>HR &amp; Learning and Development Executive</td><td>Jebel Akhdar, Oman</td><td>Ahmed Al Farsi</td><td>93671420</td><td>ahmedfarsi189@gmail.com</td><td>2026-07-27 16:01:22</td><td>No Resume</td></tr><tr><td>242</td><td>44</td><td>Leading luxury resort in Jebel Akhdar</td><td>HR &amp; Learning and Development Executive</td><td>Jebel Akhdar, Oman</td><td>Ahmed Al Farsi</td><td>93671420</td><td>ahmedfarsi189@gmail.com</td><td>2026-07-27 16:01:37</td><td>No Resume</td></tr><tr><td>253</td><td>44</td><td>Leading luxury resort in Jebel Akhdar</td><td>HR &amp; Learning and Development Executive</td><td>Jebel Akhdar, Oman</td><td>Jehangir Shah</td><td>00923009339052</td><td>jehangirshahgardaizee@yahoo.com</td><td>2026-07-31 00:21:26</td><td><button type='button' class='btn btn-sm btn-info view-resume-btn' data-bs-toggle='modal' data-bs-target='#resumeModal' data-resume-path='../uploads/resumes/6a6b9d2e5f544.pdf'>View</button> <a href='../uploads/resumes/6a6b9d2e5f544.pdf' download class='btn btn-sm btn-success'>Download</a> <button type='button' class='btn btn-sm btn-danger delete-resume-btn' 
                                                    data-application-id='253' 
                                                    data-resume-path='uploads/resumes/6a6b9d2e5f544.pdf'>
                                                    Delete
                                              </button></td></tr><tr><td>201</td><td>45</td><td>Leading steel manufacturing company in the UAE</td><td>Sales &amp; Marketing Executives - Steel Industry</td><td>UAE</td><td>Sathish Kumar Nagarajan </td><td>919842127449</td><td>teamwing@gmail.com</td><td>2026-06-15 09:48:01</td><td>No Resume</td></tr>                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p class="mb-0">&copy; 2026 JM International SPC. All rights reserved.</p>
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

        // Handle View Resume button click
        $('.view-resume-btn').on('click', function() {
            var resumePath = $(this).data('resume-path');
            $('#resumeModal .resume-iframe').attr('src', resumePath);
        });

        // Handle Print button click
        $('.btn-print').on('click', function() {
            var iframe = document.querySelector('.resume-iframe');
            if (iframe) {
                iframe.contentWindow.print();
            }
        });

        // Clear iframe src when modal is closed
        $('#resumeModal').on('hidden.bs.modal', function() {
            $('.resume-iframe').attr('src', '');
        });

        // ==================== DELETE RESUME FUNCTIONALITY ====================
        let deleteApplicationId = null;
        let deleteResumePath = null;

        // When any Delete button is clicked
        $(document).on('click', '.delete-resume-btn', function() {
            deleteApplicationId = $(this).data('application-id');
            deleteResumePath = $(this).data('resume-path');
            $('#deleteResumeModal').modal('show');
        });

        // Confirm Delete Button in Modal
        $('#confirmDeleteBtn').on('click', function() {
            if (!deleteApplicationId) return;

            $.ajax({
                url: 'delete_resume.php',
                type: 'POST',
                data: {
                    application_id: deleteApplicationId,
                    resume_path: deleteResumePath
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Replace buttons with "Deleted" message
                        const $buttonCell = $(`.delete-resume-btn[data-application-id="${deleteApplicationId}"]`).closest('td');
                        $buttonCell.html('<span class="text-muted"><i class="fas fa-trash-alt"></i> Resume Deleted</span>');

                        // Optional: Show success toast/alert
                        if (typeof showAdminToast === 'function') showAdminToast('Resume permanently deleted from server.', 'success');
                        else alert('Resume permanently deleted from server.');
                    } else {
                        if (typeof showAdminToast === 'function') showAdminToast(response.message || 'Failed to delete.', 'danger');
                        else alert('Error: ' + (response.message || 'Failed to delete.'));
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
        // =====================================================================
    });
</script>
    <!-- Delete Confirmation Modal -->
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
</body>
</html>