
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages - JM International SPC</title>
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
        .message-cell {
            max-width: 300px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .message-cell:hover {
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
            <li class="nav-item active">
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
            <h3 class="text-center mb-4">Message Management</h3>

            <!-- Success/Error Message -->
            
            <!-- Filter Form -->
            <div class="card shadow mb-5">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Filter Messages</h3>
                </div>
                <div class="card-body">
                    <form method="GET" class="filter-form">
                        <div class="row">
                            <div class="col-md-3 form-group mb-3">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="">
                            </div>
                            <div class="col-md-3 form-group mb-3">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="">
                            </div>
                            <div class="col-md-3 form-group mb-3">
                                <label for="message">Message</label>
                                <input type="text" class="form-control" id="message" name="message" value="">
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
                                <a href="/admin/messages.php" class="btn btn-secondary ms-2">Reset</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Messages Table -->
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Received Messages</h3>
                </div>
                <div class="card-body">
                    <form method="POST" id="deleteAllForm">
                    <div class="mb-3">
                        <input type="checkbox" id="confirmDeleteAll">
                        <label for="confirmDeleteAll"><b>Select All Messages</b></label>
                    
                        <button type="button" class="btn btn-danger btn-sm ms-3" id="deleteAllBtn">
                            <i class="fas fa-trash"></i> Delete All Messages
                        </button>
                    </div>
                    <input type="hidden" name="delete_all_messages" value="1">
                    </form>
                    <table id="messagesTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>231</td><td>HARITHA EM</td><td>harithaem33@gmail.com</td><td class='message-cell'>I am currently looking for a job in Muscat. I holds masters degee in Biotechnology</td><td>2026-06-16 17:20:00</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='231'>Delete</button></td></tr><tr><td>235</td><td>Ali</td><td>asif@rocketdigitaltech.com</td><td class='message-cell'>Hello http://jminternationalspc.com,
 
If you’re looking to boost your website’s visibility, I can help you achieve top Google rankings.
 
I’ll prepare a complete SEO plan with actionable steps and potential growth insights for your products or services.
 
Once you share your target keywords and target market, I’ll send a full proposal.
 
Best Regards,
Asif</td><td>2026-07-01 15:17:37</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='235'>Delete</button></td></tr><tr><td>236</td><td>JimmyBrinc</td><td>info@hroncall.com.au</td><td class='message-cell'>WILL YOU BE NEXT TO HIT THE $27,000,000 JACKPOT https://autozed-h.com/pjvfXav</td><td>2026-07-03 09:01:25</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='236'>Delete</button></td></tr><tr><td>237</td><td>JimmyBrinc</td><td>countryness84@gmail.com</td><td class='message-cell'>THE $27,000,000 JACKPOT IS A TROPHY FOR TENACITY https://lmy.de/umXYq</td><td>2026-07-04 12:08:33</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='237'>Delete</button></td></tr><tr><td>238</td><td>JimmyBrinc</td><td>slugz805@yahoo.com</td><td class='message-cell'>The $27,000,000 Jackpot Is an Adventure in Affluence https://lnkz.at/bgF8V</td><td>2026-07-08 04:33:25</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='238'>Delete</button></td></tr><tr><td>239</td><td>Singh</td><td>ananya@rocketdigitaltech.com</td><td class='message-cell'>Hello http://jminternationalspc.com,
 
If you’re looking to boost your website’s visibility, I can help you achieve top Google rankings.
 
I’ll prepare a complete SEO plan with actionable steps and potential growth insights for your products or services.
 
Once you share your target keywords and target market, I’ll send a full proposal.
 
Best Regards,
Ananya</td><td>2026-07-09 06:00:43</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='239'>Delete</button></td></tr><tr><td>240</td><td>Parcha</td><td>parchad78@gmail.com</td><td class='message-cell'>Hello http://jminternationalspc.com,
 
We offer professional website design and development services for businesses looking to build a strong online presence.

If you are planning to create a new website or redesign your existing one, I would be happy to share our portfolio and pricing details.

Please let me know if you would like more information.
 
Best Regards,
Deepak</td><td>2026-07-09 16:15:37</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='240'>Delete</button></td></tr><tr><td>241</td><td>Deon Giltner</td><td>t.urnerfisher348382+deon.giltner@gmail.com</td><td class='message-cell'>Hi, I checked out jminternationalspc.com and found a few opportunities to bring in more customers. I&#039;d be happy to send over a free, no-obligation site audit: http://utraker.com/vBhNj?ozx










































To unsubscribe, please reply with subject:  Unsubscribe !jminternationalspc.com</td><td>2026-07-14 19:24:34</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='241'>Delete</button></td></tr><tr><td>242</td><td>Sonam Prajapati</td><td>sonam.rocketdigitaltech@gmail.com</td><td class='message-cell'>Hello,

We can place your website on Google 1st page.

I can give you our Complete SEO Action Plan along with a customary reach and add great value to your product/ service.

I may send you a SEO Packages &amp; price list. If interested.

Best Regards,
sonam
Online SEO Consultant</td><td>2026-07-15 20:06:43</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='242'>Delete</button></td></tr><tr><td>243</td><td>hamza el ghandori</td><td>hamzaelghandori123@gmail.com</td><td class='message-cell'>Dear Hiring Team,

I hope you are doing well.

My name is **Hamza El Ghandori**, and I am a Poultry Technician with hands-on experience in **Ross 308 Parent Stock** and **Hy-Line Brown** operations.

I previously worked as a **Poultry Technician at SMV Mauritania**, managing breeder flock performance, biosecurity, feeding programs, environmental control, and production monitoring. I also gained experience with **Hy-Line Brown** at **Couvoir Rahma (Morocco)** and worked as a **Team Leader / Operations Coordinator** at EDDIK, where I developed strong leadership and operational management skills.

I am very interested in joining your clients&#039; poultry projects in Oman. Please find my CV attached for your review. I would be grateful for the opportunity to discuss how my experience can contribute to your organization.

Thank you for your time and consideration. I look forward to hearing from you.

Kind regards,

**Hamza El Ghandori**
Email: [hamzaelghandori123@gmail.com]
Phone: +212 629461811</td><td>2026-07-16 16:13:47</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='243'>Delete</button></td></tr><tr><td>244</td><td>GANQFdtWkKVftFsp</td><td>pol.dev.y.1.9.9.8@gmail.com</td><td class='message-cell'>QbzUcWBrFhbKVuURydT</td><td>2026-07-17 05:50:26</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='244'>Delete</button></td></tr><tr><td>245</td><td>WilliambIg</td><td>Levonsmith400@gmail.com</td><td class='message-cell'>THE $27,000,000 JACKPOT IS THE PRIZE THAT STANDS TALL https://shortmylink.co/DUpKY</td><td>2026-07-19 12:02:26</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='245'>Delete</button></td></tr><tr><td>246</td><td>Sheldon Maruff</td><td>sheldon.maruff@gmail.com</td><td class='message-cell'>Quick note,

Thought you might want this.

There’s a free tool that lets you get more exposure across multiple classified sites with one form.

Here’s the URL:
https://boost-traffic.netlify.app/jminternationalspc.com
It’s free to use and takes seconds.

Happy to share more free exposure tools.</td><td>2026-07-20 01:59:58</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='246'>Delete</button></td></tr><tr><td>247</td><td>Danshika !</td><td>danshikarai@gmail.com</td><td class='message-cell'>Hi,

I noticed your website and wanted to reach out.

I help improve websites with small UX changes that can make navigation and conversions better.

Would you be interested in seeing a few ideas and my pricing?

Best regards,

Danshika</td><td>2026-07-20 11:42:20</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='247'>Delete</button></td></tr><tr><td>248</td><td>Dr AMM Nurul Alam</td><td>alam6059@yahoo.com</td><td class='message-cell'>I am writing to express my interest in a suitable job in relevant industry, research, development organization or academia. I hold a PhD in Applied life sciences ( Major in Meat Science) from Gyeongsang National University (South Korea), where I focus on edible biodegradable packaging, meat alternatives/analogs, and sustainable meat processing technologies.
With over a decade of academic and industrial experience, including senior management roles in the meat, food, and feed industries in Bangladesh and several publications in top journals (Food Bioscience, Foods, Food Research International), I am eager to contribute to innovative and sustainable research in New Zealand.
I would be grateful if you could please find time from your valuable schedule to discuss how my background could align with your partner organizations. Thank you for your time and consideration.
With thanks and best regards.</td><td>2026-07-20 17:27:05</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='248'>Delete</button></td></tr><tr><td>249</td><td>WilliambIg</td><td>EDWARDSBENAVIDEZ@GMAIL.COM</td><td class='message-cell'>Why the $27,000,000 Jackpot Is the Ultimate Feel-Good Prize https://lnkz.at/wCjHs</td><td>2026-07-21 06:12:22</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='249'>Delete</button></td></tr><tr><td>250</td><td>Muthukumar Manickkam</td><td>muthukumarmanickkam@gmail.com</td><td class='message-cell'>CURRENTLY I AM IN OMAN FOR LAST 5  YEARS , I HAVE TOTAL EXP OF 26 YEARS IN MAINTENANCE , FACILITIES MANAGEMENT AND OPERATION EXECUTIONS .  LOOKING FOR THE JOB IN OMAN . RESUME ALREADY SHARED WITH YOU . LOOKING FOR ANY INTERVIEWS AND SUITABLE ROLE</td><td>2026-07-21 12:35:53</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='250'>Delete</button></td></tr><tr><td>251</td><td>Richardshand</td><td>tridalasmedia@gmail.com</td><td class='message-cell'>Hello, 
Tridalas Media Services is a creative design services crafting powerful political, editing videos and marketing visuals. We design creative posters, flex banners, social media creatives, event branding, videos and promotional materials that help businesses and leaders increase visibility, engagement, and public presence. 
Contact: 9000304025</td><td>2026-07-22 00:27:40</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='251'>Delete</button></td></tr><tr><td>252</td><td>Mahesh Bhatta</td><td>Maheshbhatta177@gmail.com</td><td class='message-cell'>I m a  vet technician i have experience in 5 years at veterinary field</td><td>2026-07-22 13:26:09</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='252'>Delete</button></td></tr><tr><td>253</td><td>WilliambIg</td><td>collinedwards15@gmail.com</td><td class='message-cell'>THE $27,000,000 JACKPOT IS AN EXPLOSION OF EXTRA CASH https://come.ac/K_3Iv</td><td>2026-07-23 06:48:04</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='253'>Delete</button></td></tr><tr><td>254</td><td>Michell Layden</td><td>layden.michell@gmail.com</td><td class='message-cell'>Quick question, is this your company&#039;s directory profile?
https://url-scan.data-analyzer79.workers.dev/jminternationalspc.com
Just dropping this in your lap in case it helps.</td><td>2026-07-25 09:41:43</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='254'>Delete</button></td></tr><tr><td>255</td><td>WilliambIg</td><td>helena.jaltborn@telia.com</td><td class='message-cell'>Instagram Crypto Collaborations Paying $1,500 per day or more https://telegra.ph/Collect-cryptocurrency-automatically-every-day-over-1500-Message-ID-581705-07-23</td><td>2026-07-25 15:41:01</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='255'>Delete</button></td></tr><tr><td>256</td><td>Max Kent</td><td>max.kent@outlook.com</td><td class='message-cell'>Quick question, is this your business info on this page?
https://url-scan.data-analyzer79.workers.dev/jminternationalspc.com
Thought you might want to check this out for yourself.</td><td>2026-07-25 17:52:54</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='256'>Delete</button></td></tr><tr><td>257</td><td>Fahad Al zadjali</td><td>alzadjalifahad977@gmail.com</td><td class='message-cell'>job application for ( journey manager coordinator )
CV

NAME : FAHAD SIDDIQ MOHAMMED AL ZADJALI

NATIONALITY : OMANI

PLACE OF BIRTH : SULTANATE OF OMAN

ADDRES : MUSCAT – AL SEEB

EDUCATION : SECONDARY DIPLOMA

LANGUAGES : ARABIC – ENGLISH

EXPERIENCE: RADIO OPERATOR – JOURNEY MANAGER FROM 1999 TO 2012. ( Carried out the duties of the Journey Manager who plans monitors and close out journeys of vehicles to carry out company operation`s day to day business through out the country . Also initiates any relevant accident or man -lost procedures or accident procedures in the event of an accident or a vehicle becoming overdue ).
Printing in Arabic and English.
Computer basics and application.

HOBBIES : Foot Ball – Running

TELEPHONE : 92699686 – 92609988

E MAILL : z_fsm@yahoo.co.uk

COURSES ATTENDE : Journey Management Course
                                     Tetra Radio Operator Course
                                     Printing in Arabic and English
                                    Computer basic and application
                                    Vehicle truking system Course – H2s Course</td><td>2026-07-25 22:48:08</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='257'>Delete</button></td></tr><tr><td>258</td><td>Cary Braley</td><td>cary.braley@outlook.com</td><td class='message-cell'>Hello, a free profile page for your company was just set up here:https://directory-verify-2.vercel.app/acme.com/jminternationalspc.com
Check it out real quick to see if you want to update the profile.</td><td>2026-07-26 09:27:34</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='258'>Delete</button></td></tr><tr><td>259</td><td>Jenifer Tye</td><td>tye.jenifer16@yahoo.com</td><td class='message-cell'>Hi, we just got your free business profile published on this page:https://directory-verify-2.vercel.app/acme.com/jminternationalspc.com
Take a quick look to verify that no further edits are required.</td><td>2026-07-26 22:02:29</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='259'>Delete</button></td></tr><tr><td>260</td><td>WilliambIg</td><td>tebogo.motimelec@gmail.com</td><td class='message-cell'>Protocol Labs Internships Paying $1,500 per day or more https://telegra.ph/Collect-cryptocurrency-automatically-every-day-over-1500-Message-ID-279353-07-23</td><td>2026-07-29 08:44:13</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='260'>Delete</button></td></tr><tr><td>261</td><td>Raina Kirkland</td><td>kirkland.raina69@gmail.com</td><td class='message-cell'>Quick question, is this your company data on this site?
https://check.yoururl.workers.dev/jminternationalspc.com</td><td>2026-07-29 15:21:25</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='261'>Delete</button></td></tr><tr><td>262</td><td>MOHAMED SAID TAWFIK</td><td>msthan132@gmail.com</td><td class='message-cell'>I am Mohamed Said Tawfik,
 A Ceramic Technical Director and Plant Manager with over 25 years ‎of international experience in ceramic tiles and porcelain manufacturing.‎
I have led plant operations, R&amp;D, and quality control across multiple countries including Egypt, ‎Saudi Arabia, Spain, and Algeria, achieving measurable improvements in production efficiency ‎and defect reduction.‎
I am currently seeking a senior role where I can contribute my expertise in process optimization, ‎glaze technology, and factory management.‎
I would welcome the opportunity to discuss how I can add value to your organization.‎
Best regards, 
Mohamed Said Tawfik
WhatsApp ( +201005248562)‎</td><td>2026-07-29 15:34:11</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='262'>Delete</button></td></tr><tr><td>263</td><td>Kraig Paramor</td><td>kraig.paramor37@yahoo.com</td><td class='message-cell'>Good morning/afternoon,

I assist local businesses and figured you&#039;d get value from this.

You can use a free tool to advertise your business across hundreds of classified boards with zero hassle.

For immediate exposure, go to this link:
https://free-listing.netlify.app/jminternationalspc.com

It is 100% free with no catches and finishes in way less time than traditional posting.

Let me know if you&#039;d like some help setting it up.</td><td>2026-07-30 00:45:34</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='263'>Delete</button></td></tr><tr><td>264</td><td>WilliambIg</td><td>charlenes74@icloud.com</td><td class='message-cell'>A $25,000 promo code to flip the script https://m.clickto.cc/UcyXR</td><td>2026-08-01 18:21:36</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='264'>Delete</button></td></tr><tr><td>265</td><td>WilliambIg</td><td>eazyhunter@bigpond.com</td><td class='message-cell'>YOUR ADVENTURE BEGINS WITH A $25,000 PROMO CODE https://alstr.in/khFVvOm</td><td>2026-08-03 10:38:15</td><td><button type='button' class='btn btn-sm btn-danger delete-btn' data-id='265'>Delete</button></td></tr>                        </tbody>
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
        var table = $('#messagesTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true
        });

        // This is the fix - delegated event
        $('#messagesTable tbody').on('click', '.delete-btn', function() {
            var messageId = $(this).data('id');
            if (confirm('Are you sure you want to delete this message? This cannot be undone.')) {
                window.location.href = 'messages.php?delete_id=' + messageId;
            }
        });
        $('#deleteAllBtn').click(function(){
        
            if(!$('#confirmDeleteAll').is(':checked')){
                alert("Please tick the checkbox to confirm deleting all messages.");
                return;
            }
        
            if(confirm("⚠️ Do you want to delete ALL messages? This cannot be undone.")){
                $('#deleteAllForm').submit();
            }
        
        });
    });
</script>
</body>
</html>