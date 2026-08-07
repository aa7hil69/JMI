
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Job Management - JM International SPC</title>
    <link rel="shortcut icon" type="image/png" href="../images/logo.png?v=2">
    <link rel="icon" type="image/png" href="../images/logo.png?v=2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
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
            width: 100%;
            transition: transform 0.2s;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }
        .table {
            width: 100%;
            min-width: 1000px;
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
        .table td {
            vertical-align: middle;
        }
        .modal-lg {
            max-width: 900px;
        }
        .form-control, .form-select {
            border-radius: 6px;
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
            .table {
                min-width: auto;
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
            <li class="nav-item">
                <a href="gallery.php"><i class="fas fa-images me-2"></i> Gallery</a>
            </li>
            <li class="nav-item active">
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
            <h3 class="text-center mb-4">Job Management</h3>

            <!-- Alerts -->
                        
            <!-- Add Job Posting -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-primary text-white">
                            <h3 class="mb-0">Add Job Posting</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" id="addJobForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Company Name</label>
                                        <input type="text" class="form-control" name="company_name" maxlength="255" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Position</label>
                                        <input type="text" class="form-control" name="position" maxlength="255" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Location</label>
                                        <input type="text" class="form-control" name="location" maxlength="255" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Salary/Month(OMR)</label>
                                        <input type="text" class="form-control" maxlength="255" name="salary_per_month">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Job Description</label>
                                    <textarea id="job_description" class="form-control" name="job_description" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Responsibilities</label>
                                    <textarea id="responsibilities" class="form-control" name="responsibilities" required></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Apply On or Before</label>
                                        <input type="date" class="form-control" name="apply_before" required>
                                    </div>
                                    <div class="col-md-6 mb-3 d-flex align-items-end">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="status" checked>
                                            <label class="form-check-label">Active</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="add_job" class="btn btn-primary w-100">Add Job</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Job Listings -->
            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-primary text-white">
                            <h3 class="mb-0">Job Listings</h3>
                        </div>
                        <div class="card-body">
                            <!-- Filters -->
                            <form method="get" class="row g-2 mb-4">
                                <div class="col-md-3">
                                    <input type="text" name="f_company" class="form-control" placeholder="Company" value="">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="f_position" class="form-control" placeholder="Position" value="">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="f_location" class="form-control" placeholder="Location" value="">
                                </div>
                                <div class="col-md-2">
                                    <select class="form-select" name="f_status">
                                        <option value="">All Status</option>
                                        <option value="1" >Active</option>
                                        <option value="0" >Inactive</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="date" class="form-control" name="f_posted" value="">
                                </div>
                                <div class="col-md-1">
                                    <button class="btn btn-primary w-100">Filter</button>
                                </div>
                            </form>

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="table-dark text-center">
                                        <tr>
                                            <th>ID</th>
                                            <th>Company</th>
                                            <th>Position</th>
                                            <th>Location</th>
                                            <th>Salary</th>
                                            <th>Posted On</th>
                                            <th>Apply Before</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                                            <tr id="job-45" class="text-center">
                                            <td>45</td>
                                            <td>Leading steel manufacturing company in the UAE</td>
                                            <td>Sales &amp; Marketing Executives - Steel Industry</td>
                                            <td>UAE</td>
                                            <td>N/A</td>
                                            <td>2026-06-14 15:24:45</td>
                                            <td>2027-06-14</td>
                                            <td>
                                                <input type="checkbox" class="status-toggle" data-id="45" checked>
                                            </td>
                                            <td>
                                                <button class="btn btn-info btn-sm edit-btn" data-id="45">Edit</button>
                                                <button class="btn btn-danger btn-sm delete-btn"
                                                        data-id="45">
                                                   Delete
                                                </button>
                                            </td>
                                        </tr>
                                                                            <tr id="job-44" class="text-center">
                                            <td>44</td>
                                            <td>Leading luxury resort in Jebel Akhdar</td>
                                            <td>HR &amp; Learning and Development Executive</td>
                                            <td>Jebel Akhdar, Oman</td>
                                            <td>N/A</td>
                                            <td>2026-06-14 15:23:30</td>
                                            <td>2027-06-14</td>
                                            <td>
                                                <input type="checkbox" class="status-toggle" data-id="44" checked>
                                            </td>
                                            <td>
                                                <button class="btn btn-info btn-sm edit-btn" data-id="44">Edit</button>
                                                <button class="btn btn-danger btn-sm delete-btn"
                                                        data-id="44">
                                                   Delete
                                                </button>
                                            </td>
                                        </tr>
                                                                            <tr id="job-43" class="text-center">
                                            <td>43</td>
                                            <td>Leading organization in Oman</td>
                                            <td>Assistant Finance Manager</td>
                                            <td>Oman</td>
                                            <td>N/A</td>
                                            <td>2026-05-17 19:14:55</td>
                                            <td>2027-05-17</td>
                                            <td>
                                                <input type="checkbox" class="status-toggle" data-id="43" checked>
                                            </td>
                                            <td>
                                                <button class="btn btn-info btn-sm edit-btn" data-id="43">Edit</button>
                                                <button class="btn btn-danger btn-sm delete-btn"
                                                        data-id="43">
                                                   Delete
                                                </button>
                                            </td>
                                        </tr>
                                                                            <tr id="job-42" class="text-center">
                                            <td>42</td>
                                            <td>Leading FMCG company in Muscat</td>
                                            <td>FMCG Roles - Multiple Positions</td>
                                            <td>Muscat</td>
                                            <td>N/A</td>
                                            <td>2026-05-17 19:13:37</td>
                                            <td>2027-05-17</td>
                                            <td>
                                                <input type="checkbox" class="status-toggle" data-id="42" checked>
                                            </td>
                                            <td>
                                                <button class="btn btn-info btn-sm edit-btn" data-id="42">Edit</button>
                                                <button class="btn btn-danger btn-sm delete-btn"
                                                        data-id="42">
                                                   Delete
                                                </button>
                                            </td>
                                        </tr>
                                                                            <tr id="job-41" class="text-center">
                                            <td>41</td>
                                            <td>Leading non-profit organization</td>
                                            <td>Event &amp; Sponsorship Manager</td>
                                            <td>Muscat</td>
                                            <td>N/A</td>
                                            <td>2026-05-06 16:03:39</td>
                                            <td>2027-05-06</td>
                                            <td>
                                                <input type="checkbox" class="status-toggle" data-id="41" checked>
                                            </td>
                                            <td>
                                                <button class="btn btn-info btn-sm edit-btn" data-id="41">Edit</button>
                                                <button class="btn btn-danger btn-sm delete-btn"
                                                        data-id="41">
                                                   Delete
                                                </button>
                                            </td>
                                        </tr>
                                                                                                            </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                                                            <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center">
                                                                                                                            <li class="page-item active">
                                                <a class="page-link" href="?page=1">
                                                    1                                                </a>
                                            </li>
                                                                                    <li class="page-item ">
                                                <a class="page-link" href="?page=2">
                                                    2                                                </a>
                                            </li>
                                                                                    <li class="page-item ">
                                                <a class="page-link" href="?page=3">
                                                    3                                                </a>
                                            </li>
                                                                                    <li class="page-item ">
                                                <a class="page-link" href="?page=4">
                                                    4                                                </a>
                                            </li>
                                                                                    <li class="page-item ">
                                                <a class="page-link" href="?page=5">
                                                    5                                                </a>
                                            </li>
                                                                            </ul>
                                </nav>
                                                    </div>
                    </div>
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

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Job Posting</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body-content">
                    <!-- Form will be loaded here -->
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
    <div class="modal-content">
    
    <div class="modal-header bg-danger text-white">
    <h5 class="modal-title">
    <i class="fas fa-exclamation-triangle"></i> Warning
    </h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
    </div>
    
    <div class="modal-body text-center">
    
    <h5 style="color:red;font-weight:bold;">
    ⚠ ALL RESUMES FOR THIS JOB WILL ALSO BE DELETED
    </h5>
    
    <p class="mt-3">Do you want to continue?</p>
    
    </div>
    
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
    Cancel
    </button>
    
    <a href="#" id="confirmDelete" class="btn btn-danger">
    Yes Delete
    </a>
    
    </div>
    
    </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
$(document).ready(function () {

    /* --------------------------------------------------------------
       1. CKEDITOR – initialise once (Add-Job form)
       -------------------------------------------------------------- */
    if (typeof CKEDITOR !== 'undefined') {
        CKEDITOR.replace('job_description', { versionCheck: false });
        CKEDITOR.replace('responsibilities', { versionCheck: false });
    } else {
        console.error('CKEditor not loaded – using plain textareas');
    }

    /* --------------------------------------------------------------
       2. ADD-JOB FORM
       -------------------------------------------------------------- */
    $('#addJobForm').on('submit', function (e) {
        console.log('Add-Job form submit');

        // ---- date format check (HTML5 date picker already returns YYYY-MM-DD) ----
        const applyBefore = $('input[name="apply_before"]').val();
        if (!/^\d{4}-\d{2}-\d{2}$/.test(applyBefore)) {
            alert('Please enter a valid date for Apply Before (YYYY-MM-DD).');
            e.preventDefault();
            return;
        }

        // ---- push CKEditor content back into the hidden <textarea> ----
        if (typeof CKEDITOR !== 'undefined') {
            for (const name in CKEDITOR.instances) {
                CKEDITOR.instances[name].updateElement();
            }
        }
    });

    /* --------------------------------------------------------------
       3. STATUS TOGGLE (Active / Inactive)
       -------------------------------------------------------------- */
    $(document).on('change', '.status-toggle', function () {
        const job_id = $(this).data('id');
        const status = $(this).is(':checked') ? 1 : 0;

        $.post('toggle_status.php', { job_id, status }, function (res) {
            console.log('toggle_status response →', res);
        }).fail(() => alert('Failed to update status'));
    });

    /* --------------------------------------------------------------
       4. EDIT MODAL – load form + handle submit
       -------------------------------------------------------------- */
    let editModal = null;               // will hold the Bootstrap modal instance
    const $modalBody = $('#modal-body-content');

    $(document).on('click', '.edit-btn', function () {
        const job_id = $(this).data('id');
        console.log('Loading edit form for job_id:', job_id);

        $.get('edit_job_form.php', { job_id }, function (html) {
            $modalBody.html(html);                     // <-- html already contains <form id="editJobForm">…

            // ---- initialise CKEditor for every .ckeditor inside the modal ----
            if (typeof CKEDITOR !== 'undefined') {
                $modalBody.find('.ckeditor').each(function () {
                    if (!CKEDITOR.instances[this.id]) {
                        CKEDITOR.replace(this, { versionCheck: false });
                    }
                });
            }

            // ---- show modal (create instance only once) ----
            if (!editModal) {
                editModal = new bootstrap.Modal(document.getElementById('editModal'));
            }
            editModal.show();

        }).fail(() => alert('Could not load edit form'));
    });

    /* --------------------------------------------------------------
       5. EDIT FORM SUBMIT (delegated – works on dynamically loaded form)
       -------------------------------------------------------------- */
    $(document).on('submit', '#editJobForm', function (e) {
        e.preventDefault();
        console.log('Edit-Job form submit');

        // ---- push CKEditor content back into the textarea elements ----
        if (typeof CKEDITOR !== 'undefined') {
            for (const name in CKEDITOR.instances) {
                CKEDITOR.instances[name].updateElement();
            }
        }

        const formData = $(this).serialize();

        $.post('update_job.php', formData, function (resp) {
            console.log('update_job response →', resp);

            if (resp.success) {
                editModal.hide();
                location.reload();                 // refresh list with new data
            } else {
                alert('Error: ' + (resp.error || 'unknown'));
            }
        }, 'json')
        .fail(() => alert('Request failed – check console'));
    });
    let deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));

    $(document).on('click','.delete-btn',function(){
    
        let job_id = $(this).data('id');
    
        $('#confirmDelete').attr('href','?delete_id='+job_id);
    
        deleteModal.show();
    
    });

});
</script>

</body>
</html>