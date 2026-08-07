
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients - JM International SPC</title>
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
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
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
        .table thead th {
            background: #1e293b;
            color: white;
        }
        .clientname-cell {
            max-width: 300px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .clientname-cell:hover {
            white-space: normal;
            overflow: visible;
            text-overflow: clip;
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
            <li class="nav-item active">
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
            <h3 class="text-center mb-4">Clients Management</h3>

            <!-- Success/Error Message -->
            
            <!-- Add Client Form -->
            <div class="card shadow mb-5">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Add New Client</h3>
                </div>
                <div class="card-body">
                    <form method="POST" class="filter-form">
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="clientname">Client Name</label>
                                <input type="text" class="form-control" id="clientname" name="clientname" required>
                            </div>
                            <div class="col-md-3 form-group align-self-end mb-3">
                                <button type="submit" class="btn btn-primary">Add Client</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Filter Form -->
            <div class="card shadow mb-5">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Filter Clients</h3>
                </div>
                <div class="card-body">
                    <form method="GET" class="filter-form">
                        <div class="row">
                            <div class="col-md-3 form-group mb-3">
                                <label for="clientname">Client Name</label>
                                <input type="text" class="form-control" id="clientname" name="clientname" value="">
                            </div>
                            <div class="col-md-3 form-group mb-3">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="">All</option>
                                    <option value="1" >Active</option>
                                    <option value="0" >Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-3 form-group align-self-end mb-3">
                                <button type="submit" class="btn btn-primary">Apply Filters</button>
                                <a href="/admin/clients.php" class="btn btn-secondary ms-2">Reset</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Clients Table -->
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Client List</h3>
                </div>
                <div class="card-body">
                    <table id="clientsTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Client Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>1</td><td class='clientname-cell'>Abu Dhabi National Oil Co.</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=1&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>2</td><td class='clientname-cell'>Abu Hani Group</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=2&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>3</td><td class='clientname-cell'>Addirham</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=3&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>4</td><td class='clientname-cell'>Adlife Hospitals</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=4&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>5</td><td class='clientname-cell'>Al Adrak Trading &amp; Contracting</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=5&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>6</td><td class='clientname-cell'>Al Ghalbi Engineering &amp; Construction Co.</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=6&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>7</td><td class='clientname-cell'>Al Haditha Petroleum Co SAOC</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=7&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>8</td><td class='clientname-cell'>Al Hashar Group</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=8&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>9</td><td class='clientname-cell'>Al Hayat International Hospital</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=9&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>10</td><td class='clientname-cell'>Al Jassar Group</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=10&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>11</td><td class='clientname-cell'>Al Khalili Group of Companies</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=11&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>12</td><td class='clientname-cell'>Al Madina Takaful SAOG</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=12&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>13</td><td class='clientname-cell'>Al Moosa Group</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=13&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>14</td><td class='clientname-cell'>Al Naba Services</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=14&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>15</td><td class='clientname-cell'>Al Nama Poultry</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=15&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>16</td><td class='clientname-cell'>Al Rakaib Training LLC</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=16&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>17</td><td class='clientname-cell'>Al Saffa Poultry</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=17&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>18</td><td class='clientname-cell'>Al Shanfari Group</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=18&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>19</td><td class='clientname-cell'>Al Siyabi Group of Companies</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=19&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>20</td><td class='clientname-cell'>Al Tasnim Enterprises</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=20&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>21</td><td class='clientname-cell'>Al Thabat Holding LLC</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=21&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>22</td><td class='clientname-cell'>Alfellaj Hotel</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=22&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>23</td><td class='clientname-cell'>Apollo Hospital Oman</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=23&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>24</td><td class='clientname-cell'>Arabian Industries</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=24&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>25</td><td class='clientname-cell'>Asia Express Exchange</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=25&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>26</td><td class='clientname-cell'>Atyab Investments Group</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=26&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>27</td><td class='clientname-cell'>Bahwan Engineering Group</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=27&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>28</td><td class='clientname-cell'>Bahwan International Holding Group</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=28&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>29</td><td class='clientname-cell'>Bank Beirut</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=29&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>30</td><td class='clientname-cell'>Bank Muscat SAOG</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=30&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>31</td><td class='clientname-cell'>Berkeley Al Ghrimeel Engineering Consultancy Co.</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=31&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>32</td><td class='clientname-cell'>Bin Mirza Group</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=32&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>33</td><td class='clientname-cell'>Capital Drilling Limited</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=33&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>34</td><td class='clientname-cell'>Capital Drilling Limited (OMAN)</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=34&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>35</td><td class='clientname-cell'>Centre for British Teachers LLC</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=35&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>36</td><td class='clientname-cell'>CHIC by Sisters</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=36&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>37</td><td class='clientname-cell'>Crowe Oman</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=37&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>38</td><td class='clientname-cell'>Drake &amp; Scull International LLC (OHI Group)</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=38&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>39</td><td class='clientname-cell'>Duqm SEZAD</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=39&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>40</td><td class='clientname-cell'>Easa Al Saleh (AL GURG)</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=40&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>41</td><td class='clientname-cell'>Easa Saleh Al Gurg Group of Companies</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=41&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>42</td><td class='clientname-cell'>Enhance Oman</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=42&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>43</td><td class='clientname-cell'>Eva Clinic</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=43&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>44</td><td class='clientname-cell'>Farab-Nardis Co. FNC</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=44&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>45</td><td class='clientname-cell'>Fisheries Development of Oman</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=45&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>46</td><td class='clientname-cell'>Ghaida Al Mukhaini &amp; Her Partner Trading Co LLC</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=46&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>47</td><td class='clientname-cell'>Grand Blue City Development (GBC)</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=47&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>48</td><td class='clientname-cell'>Green Ferro Alloy FZC</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=48&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>49</td><td class='clientname-cell'>Gulf Agency Company LLC</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=49&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>50</td><td class='clientname-cell'>Gulf Mining Group</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=50&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>51</td><td class='clientname-cell'>Haffa House Hotel (Shanfari Group)</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=51&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>52</td><td class='clientname-cell'>Haya Water</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=52&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>53</td><td class='clientname-cell'>Intech LLC</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=53&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>54</td><td class='clientname-cell'>JGC Corporation - Japan (Bahwan Holding Group JV Company)</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=54&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>55</td><td class='clientname-cell'>Kapico Group Kuwait</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=55&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>56</td><td class='clientname-cell'>KOC Kuwait</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=56&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>57</td><td class='clientname-cell'>KONE - Oman</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=57&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>58</td><td class='clientname-cell'>KPMG</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=58&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>59</td><td class='clientname-cell'>Kuwait Flour Mills</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=59&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>60</td><td class='clientname-cell'>Landmark International LLC</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=60&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>61</td><td class='clientname-cell'>Mazoon Dairy Co. SAOC</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=61&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>62</td><td class='clientname-cell'>MHD AVON</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=62&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>63</td><td class='clientname-cell'>Ministry of Defence</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=63&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>64</td><td class='clientname-cell'>Ministry of Manpower</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=64&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>65</td><td class='clientname-cell'>Ministry of Social Affairs</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=65&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>66</td><td class='clientname-cell'>Moon Iron &amp; Steel Company SAOC</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=66&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>67</td><td class='clientname-cell'>Moosa Abdul Rahman Hassan</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=67&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>68</td><td class='clientname-cell'>Muscat BAY</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=68&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>69</td><td class='clientname-cell'>Muscat Fertilizer Co. LLC</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=69&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>70</td><td class='clientname-cell'>Muscat Finance SAOG</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=70&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>71</td><td class='clientname-cell'>Muscat Media Group</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=71&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>72</td><td class='clientname-cell'>Muscat Overseas Group</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=72&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>73</td><td class='clientname-cell'>Mustafa Sultan Enterprises LLC</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=73&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>74</td><td class='clientname-cell'>NABIL SAOG</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=74&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>75</td><td class='clientname-cell'>Nakhal Ahlia Investment Company SAOC</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=75&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>76</td><td class='clientname-cell'>National Drilling Co.</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=76&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>77</td><td class='clientname-cell'>National Gas Co. SAOG</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=77&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>78</td><td class='clientname-cell'>National Life &amp; General Insurance Co. SAOG</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=78&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>79</td><td class='clientname-cell'>Nestle Oman LLC</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=79&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>80</td><td class='clientname-cell'>NJS Consultants Oman LLC</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=80&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>81</td><td class='clientname-cell'>Oasis Energy LLC</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=81&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>82</td><td class='clientname-cell'>OHI Group of Companies</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=82&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>83</td><td class='clientname-cell'>OIFC</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=83&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>84</td><td class='clientname-cell'>Oman Data Park LLC</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=84&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>85</td><td class='clientname-cell'>Oman Flour Mills Co. SAOG</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=85&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>86</td><td class='clientname-cell'>Oman International Bank SAOG</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=86&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>87</td><td class='clientname-cell'>Oman International Container Terminal LLC</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=87&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>88</td><td class='clientname-cell'>Oman LNG</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=88&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>89</td><td class='clientname-cell'>Oman National Engineering &amp; Investment Co. SAOG</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=89&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>90</td><td class='clientname-cell'>Oman National Transport Co.</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=90&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>91</td><td class='clientname-cell'>Oman Porcelain Co. SAOC</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=91&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>92</td><td class='clientname-cell'>Oman Refreshment Co. SAOG</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=92&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>93</td><td class='clientname-cell'>OmanExpo – SABCO</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=93&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>94</td><td class='clientname-cell'>One Stop Solution</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=94&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>95</td><td class='clientname-cell'>Osool Poultry Co. SAOC</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=95&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>96</td><td class='clientname-cell'>PEC International LLC</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=96&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>97</td><td class='clientname-cell'>Port of Duqm</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=97&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>98</td><td class='clientname-cell'>Qatar Telecom (Q-Tel)</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=98&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>99</td><td class='clientname-cell'>Redington Gulf FZC Middle East Region</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=99&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>100</td><td class='clientname-cell'>REMAX LLC</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=100&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>101</td><td class='clientname-cell'>Renaissance Services SAOG</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=101&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>102</td><td class='clientname-cell'>Renna Mobile Oman</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=102&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>103</td><td class='clientname-cell'>Sagar Polyclinic</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=103&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>104</td><td class='clientname-cell'>Salam Stores</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=104&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>105</td><td class='clientname-cell'>SANDAN</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=105&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>106</td><td class='clientname-cell'>Saraya Bandar Al Jissah (Muscat Bay)</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=106&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>107</td><td class='clientname-cell'>Sayyar Group</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=107&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>108</td><td class='clientname-cell'>Scan Electromechanical Co. LLC</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=108&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>109</td><td class='clientname-cell'>Semb Jinko Shine SAOC</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=109&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>110</td><td class='clientname-cell'>Sharqiyah University</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=110&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>111</td><td class='clientname-cell'>Smart Outsourcing Solutions Doha, Qatar</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=111&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>112</td><td class='clientname-cell'>Spinneys Dubai LLC</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=112&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>113</td><td class='clientname-cell'>Starcare Hospital Muscat</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=113&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>114</td><td class='clientname-cell'>Suhail Bahwan Group</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=114&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>115</td><td class='clientname-cell'>Sultan Qaboos Port Authority</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=115&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>116</td><td class='clientname-cell'>Sultan Telecom Kuwait</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=116&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>117</td><td class='clientname-cell'>Tageer Finance Oman</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=117&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>118</td><td class='clientname-cell'>Takaful Insurance Co. SAOG Oman</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=118&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>119</td><td class='clientname-cell'>Tatweer Duqm</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=119&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>120</td><td class='clientname-cell'>Towell Group</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=120&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>121</td><td class='clientname-cell'>Trust Travel &amp; Tourism Company</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=121&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>122</td><td class='clientname-cell'>Voltamp Oman</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=122&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr><tr><td>123</td><td class='clientname-cell'>Zubair Group of Companies</td><td><span class="badge bg-success">Active</span></td><td><a href='clients.php?toggle_id=123&status=1' class='btn btn-sm btn-secondary'>Disable</a> </td></tr>                        </tbody>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="/admin/assets/admin-notify.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('#clientsTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true
            });

            // Handle Delete button click
            $('.delete-btn').on('click', function() {
                var clientId = $(this).data('id');
                if (confirm('Are you sure you want to delete this client?')) {
                    window.location.href = 'clients.php?delete_id=' + clientId;
                }
            });
        });
    </script>
</body>
</html>