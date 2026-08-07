<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>JM International SPC</title>
    <link rel="shortcut icon" type="image/png" href="images/logo.png?v=2">
    <link rel="icon" type="image/png" href="images/logo.png?v=2">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/owl.css" rel="stylesheet">
    <link href="css/flaticon.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/jquery-ui.css" rel="stylesheet">
    <link href="css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="css/hover.css" rel="stylesheet">
    <link rel="stylesheet" href="css/jarallax.css">
    <link href="css/custom-animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <link href="css/rtl.css" rel="stylesheet">
    <link href="css/responsive.css?v=2" rel="stylesheet">

    <link rel="stylesheet" id="jssDefault" href="css/colors/color-default.css">

    <link rel="shortcut icon" href="images/favicon.png" id="fav-shortcut" type="image/x-icon">
    <link rel="icon" href="images/favicon.png" id="fav-icon" type="image/x-icon">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->

    <style>
        .sec-title .lower-text {
            padding-top: 10px;
        }

            .sec-title .lower-text p {
                line-height: 28px;
                text-align: justify;
            }
           .clients-list li {
                display: inline-block;
                background: linear-gradient(145deg, #d4af37, #ffd700, #b8860b, #ffcc00);
                color: #000;
                font-weight: bold;
                padding: 10px 22px;
                margin: 10px;
                border-radius: 12px;
                font-size: 18px;
                text-transform: uppercase;
                letter-spacing: 1px;
                /* Metallic 3D Effect */
                box-shadow: 
                    inset 2px 2px 6px rgba(255, 255, 255, 0.6),
                    inset -2px -2px 6px rgba(0, 0, 0, 0.4),
                    4px 6px 14px rgba(0, 0, 0, 0.5);
                text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.7),
                             -1px -1px 2px rgba(0, 0, 0, 0.8);
                transition: transform 0.3s, box-shadow 0.3s;
                position: relative;
                overflow: hidden;
            }
            
            /* Glossy Shine Animation */
            .clients-list li::before {
                content: "";
                position: absolute;
                top: 0;
                left: -100%;
                width: 50%;
                height: 100%;
                background: linear-gradient(120deg, rgba(255,255,255,0.7) 0%, rgba(255,255,255,0.1) 100%);
                transform: skewX(-25deg);
            }
            
            .clients-list li:hover::before {
                animation: shine 1s ease forwards;
            }
            
            @keyframes shine {
                100% { left: 150%; }
            }
            
            .clients-list li:hover {
                transform: translateY(-4px);
                box-shadow: 
                    inset 2px 2px 6px rgba(255, 255, 255, 0.6),
                    inset -2px -2px 6px rgba(0, 0, 0, 0.5),
                    7px 10px 20px rgba(0, 0, 0, 0.6);
            }



    </style>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1VLDL1LPPW"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-1VLDL1LPPW');
</script>    
</head>

<body class="body-dark">
    <div class="page-wrapper">
        <div class="preloader">
            <div class="icon"></div>
        </div>

        <header class="main-header header-style-one">
            <div class="header-upper">
                <div class="inner-container clearfix">
                    <div class="nav-outer clearfix">
                        <div class="mobile-nav-toggler">
                            <span class="icon flaticon-menu-2"></span><span class="txt">Menu</span>
                        </div>
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="clients.php">Our Clients</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="logo-box">
                        <div class="logo">
                            <a href="index.php" title="JM">
                                <img src="images/logo.png" id="thm-logo" alt="JM" title="JM">
                            </a>
                        </div>
                    </div>
                    <div class="nav-outer clearfix">
                        <div class="mobile-nav-toggler">
                            <span class="icon flaticon-menu-2"></span><span class="txt">Menu</span>
                        </div>
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li><a href="job-list.php">Apply For Jobs</a></li>
                                    <li><a href="events.php">Events</a></li>
                                    <li><a href="services.html">Services</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        <div class="side-menu__block">
            <div class="side-menu__block-overlay custom-cursor__overlay">
                <div class="cursor"></div>
                <div class="cursor-follower"></div>
            </div>
            <div class="side-menu__block-inner ">
                <div class="side-menu__top justify-content-end">
                    <a href="#" class="side-menu__toggler side-menu__close-btn">
                        <img src="images/icons/close-1-1.png"
                             alt="">
                    </a>
                </div>
                <nav class="mobile-nav__container">
                    <ul class="navigation clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li class="current"><a href="clients.php">Our Clients</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li><a href="job-list.php">Apply For Jobs</a></li>
                        <li><a href="events.php">Events</a></li>
                        <li><a href="services.html">Services</a></li>
                    </ul>
                </nav>
                <div class="side-menu__sep"></div>
                <div class="side-menu__content">
                    <p>JM International SPC is a dedicated job search platform that connects job seekers with top employers across a wide range of industries. Designed to simplify and enhance the hiring process, the platform offers personalized job recommendations, up-to-date listings, and valuable career resources such as resume tips and interview advice.</p>
                    <p>
                       <a href="mailto:jessymathewhr@gmail.com">jessymathewhr@gmail.com</a><br>
                       <a href="mailto:info@jminternationalspc.com">info@jminternationalspc.com</a><br> 
                        <a href="tel:+96897708198">+ 968 9770 8198</a>
                    </p>
                    <div class="side-menu__social">
                        <a href="https://www.facebook.com/jessy.mathew"><i class="fab fa-facebook-square"></i></a>
                        <a href="https://www.instagram.com/jm_international_spc?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/in/jessy-mathew-55318b99"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="search-popup">
            <div class="search-popup__overlay custom-cursor__overlay">
                <div class="cursor"></div>
                <div class="cursor-follower"></div>
            </div>
            <div class="search-popup__inner">
                <form action="#" class="search-popup__form">
                    <input type="text" name="search" placeholder="Type here to Search....">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>

        <section class="page-banner">
            <div class="image-layer" style="background-image: url(images/page-header.jpg);"></div>
            <div class="shape-1"></div>
            <div class="shape-2"></div>
            <div class="banner-inner">
                <div class="auto-container">
                    <div class="inner-container clearfix">
                        <h1>Clients</h1>
                        <div class="page-nav">
                            <ul class="bread-crumb clearfix">
                                <li><a href="index.php">Home</a></li>
                                <li class="active">Clients</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="page-clients">
            <div class="auto-container">
                <div class="clients-box">
                    <ul class="list-unstyled clients-list">
                                                                                    <li>Abu Dhabi National Oil Co.</li>
                                                            <li>Abu Hani Group</li>
                                                            <li>Addirham</li>
                                                            <li>Adlife Hospitals</li>
                                                            <li>Al Adrak Trading &amp; Contracting</li>
                                                            <li>Al Ghalbi Engineering &amp; Construction Co.</li>
                                                            <li>Al Haditha Petroleum Co SAOC</li>
                                                            <li>Al Hashar Group</li>
                                                            <li>Al Hayat International Hospital</li>
                                                            <li>Al Jassar Group</li>
                                                            <li>Al Khalili Group of Companies</li>
                                                            <li>Al Madina Takaful SAOG</li>
                                                            <li>Al Moosa Group</li>
                                                            <li>Al Naba Services</li>
                                                            <li>Al Nama Poultry</li>
                                                            <li>Al Rakaib Training LLC</li>
                                                            <li>Al Saffa Poultry</li>
                                                            <li>Al Shanfari Group</li>
                                                            <li>Al Siyabi Group of Companies</li>
                                                            <li>Al Tasnim Enterprises</li>
                                                            <li>Al Thabat Holding LLC</li>
                                                            <li>Alfellaj Hotel</li>
                                                            <li>Apollo Hospital Oman</li>
                                                            <li>Arabian Industries</li>
                                                            <li>Asia Express Exchange</li>
                                                            <li>Atyab Investments Group</li>
                                                            <li>Bahwan Engineering Group</li>
                                                            <li>Bahwan International Holding Group</li>
                                                            <li>Bank Beirut</li>
                                                            <li>Bank Muscat SAOG</li>
                                                            <li>Berkeley Al Ghrimeel Engineering Consultancy Co.</li>
                                                            <li>Bin Mirza Group</li>
                                                            <li>Capital Drilling Limited</li>
                                                            <li>Capital Drilling Limited (OMAN)</li>
                                                            <li>Centre for British Teachers LLC</li>
                                                            <li>CHIC by Sisters</li>
                                                            <li>Crowe Oman</li>
                                                            <li>Drake &amp; Scull International LLC (OHI Group)</li>
                                                            <li>Duqm SEZAD</li>
                                                            <li>Easa Al Saleh (AL GURG)</li>
                                                            <li>Easa Saleh Al Gurg Group of Companies</li>
                                                            <li>Enhance Oman</li>
                                                            <li>Eva Clinic</li>
                                                            <li>Farab-Nardis Co. FNC</li>
                                                            <li>Fisheries Development of Oman</li>
                                                            <li>Ghaida Al Mukhaini &amp; Her Partner Trading Co LLC</li>
                                                            <li>Grand Blue City Development (GBC)</li>
                                                            <li>Green Ferro Alloy FZC</li>
                                                            <li>Gulf Agency Company LLC</li>
                                                            <li>Gulf Mining Group</li>
                                                            <li>Haffa House Hotel (Shanfari Group)</li>
                                                            <li>Haya Water</li>
                                                            <li>Intech LLC</li>
                                                            <li>JGC Corporation - Japan (Bahwan Holding Group JV Company)</li>
                                                            <li>Kapico Group Kuwait</li>
                                                            <li>KOC Kuwait</li>
                                                            <li>KONE - Oman</li>
                                                            <li>KPMG</li>
                                                            <li>Kuwait Flour Mills</li>
                                                            <li>Landmark International LLC</li>
                                                            <li>Mazoon Dairy Co. SAOC</li>
                                                            <li>MHD AVON</li>
                                                            <li>Ministry of Defence</li>
                                                            <li>Ministry of Manpower</li>
                                                            <li>Ministry of Social Affairs</li>
                                                            <li>Moon Iron &amp; Steel Company SAOC</li>
                                                            <li>Moosa Abdul Rahman Hassan</li>
                                                            <li>Muscat BAY</li>
                                                            <li>Muscat Fertilizer Co. LLC</li>
                                                            <li>Muscat Finance SAOG</li>
                                                            <li>Muscat Media Group</li>
                                                            <li>Muscat Overseas Group</li>
                                                            <li>Mustafa Sultan Enterprises LLC</li>
                                                            <li>NABIL SAOG</li>
                                                            <li>Nakhal Ahlia Investment Company SAOC</li>
                                                            <li>National Drilling Co.</li>
                                                            <li>National Gas Co. SAOG</li>
                                                            <li>National Life &amp; General Insurance Co. SAOG</li>
                                                            <li>Nestle Oman LLC</li>
                                                            <li>NJS Consultants Oman LLC</li>
                                                            <li>Oasis Energy LLC</li>
                                                            <li>OHI Group of Companies</li>
                                                            <li>OIFC</li>
                                                            <li>Oman Data Park LLC</li>
                                                            <li>Oman Flour Mills Co. SAOG</li>
                                                            <li>Oman International Bank SAOG</li>
                                                            <li>Oman International Container Terminal LLC</li>
                                                            <li>Oman LNG</li>
                                                            <li>Oman National Engineering &amp; Investment Co. SAOG</li>
                                                            <li>Oman National Transport Co.</li>
                                                            <li>Oman Porcelain Co. SAOC</li>
                                                            <li>Oman Refreshment Co. SAOG</li>
                                                            <li>OmanExpo – SABCO</li>
                                                            <li>One Stop Solution</li>
                                                            <li>Osool Poultry Co. SAOC</li>
                                                            <li>PEC International LLC</li>
                                                            <li>Port of Duqm</li>
                                                            <li>Qatar Telecom (Q-Tel)</li>
                                                            <li>Redington Gulf FZC Middle East Region</li>
                                                            <li>REMAX LLC</li>
                                                            <li>Renaissance Services SAOG</li>
                                                            <li>Renna Mobile Oman</li>
                                                            <li>Sagar Polyclinic</li>
                                                            <li>Salam Stores</li>
                                                            <li>SANDAN</li>
                                                            <li>Saraya Bandar Al Jissah (Muscat Bay)</li>
                                                            <li>Sayyar Group</li>
                                                            <li>Scan Electromechanical Co. LLC</li>
                                                            <li>Semb Jinko Shine SAOC</li>
                                                            <li>Sharqiyah University</li>
                                                            <li>Smart Outsourcing Solutions Doha, Qatar</li>
                                                            <li>Spinneys Dubai LLC</li>
                                                            <li>Starcare Hospital Muscat</li>
                                                            <li>Suhail Bahwan Group</li>
                                                            <li>Sultan Qaboos Port Authority</li>
                                                            <li>Sultan Telecom Kuwait</li>
                                                            <li>Tageer Finance Oman</li>
                                                            <li>Takaful Insurance Co. SAOG Oman</li>
                                                            <li>Tatweer Duqm</li>
                                                            <li>Towell Group</li>
                                                            <li>Trust Travel &amp; Tourism Company</li>
                                                            <li>Voltamp Oman</li>
                                                            <li>Zubair Group of Companies</li>
                                                                        </ul>
                </div>
            </div>
        </section>

        <footer class="main-footer">
            <div class="auto-container">
                <div class="widgets-section">
                    <div class="row clearfix">
                        <div class="column col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget info-widget">
                                <div class="widget-content">
                                    <h6>Contact Us</h6>
                                    <ul class="contact-info">
                                         <li class="address">
                                            <span class="icon flaticon-pin-1"></span> JM International SPC,
                                            P O Box : 396 <br>Al Khuwair, Sultanate of Oman 
                                        </li>
                                        <li>
                                            <span class="icon flaticon-call"></span><a href="tel:+96897708198">+ 968 9770 8198</a>
                                        </li>
                                        <li>
                                            <span class="icon flaticon-email-2"></span><a href="mailto:jessymathewhr@gmail.com">jessymathewhr@gmail.com</a>
                                            <span class="icon flaticon-email-2"></span><a href="mailto:info@jminternationalspc.com">info@jminternationalspc.com</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="column col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget newsletter-widget">
                                <div class="widget-content">
                                    <h6>Location Map</h6>
                                    <div class="newsletter-form">
                                         <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3656.258895740186!2d58.54065358638762!3d23.595046255707448!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e91f706f00632c5%3A0xce740d3e991785f7!2sHaffa%20House%20Muscat!5e0!3m2!1sen!2sin!4v1761530357856!5m2!1sen!2sin" width="100%" height="180" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget logo-widget">
                                <div class="widget-content">
                                    <h6>Social Media</h6>
                                    <div class="text">
                                        Find your next big opportunity with JM International SPC — where top talent meets top employers!
                                    </div>
                                    <ul class="social-links clearfix">
                                        <li><a href="https://www.facebook.com/jessy.mathew"><span class="fab fa-facebook-square"></span></a></li>
                                        <li><a href="https://www.instagram.com/jm_international_spc?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><span class="fab fa-instagram"></span></a></li>
                                        <li><a href="https://www.linkedin.com/in/jessy-mathew-55318b99"><span class="fab fa-linkedin"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="inner clearfix">
                        <div class="copyright">&copy; Copyright 2025 by JM International</div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>

    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/TweenMax.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.fancybox.js"></script>
    <script src="js/owl.js"></script>
    <script src="js/mixitup.js"></script>
    <script src="js/appear.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/jQuery.style.switcher.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.2/js.cookie.min.js">
    </script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jarallax.min.js"></script>
    <script src="js/custom-script.js?v=1"></script>

</body>
</html>