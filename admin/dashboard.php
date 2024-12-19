<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!--============================== Required meta tags ===========================-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--============================= Fonts =======================================-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100i,300,300i,400,700" rel="stylesheet">

    <!--============================= CSS =======================================-->
    <link rel="stylesheet" href="build/css/bootstrap.min.css">
    <link rel="stylesheet" href="build/css/font-awesome.min.css">
    <link rel="stylesheet" href="build/css/style.css">

    <script src="assets/js/jquery-3.2.1.slim.min.js"></script>

    <title>Admission Management System</title>
    <link rel="shourtcut icon" type="image/png" href="assets/img/favicon.png">

    <style>
        * {
            margin: 0 auto;
        }
        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            transition: all 1s ease-in-out;
            opacity: 1;
            position: relative;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
        .slide-out {
            opacity: 0;
            transform: translateY(-20px);
        }
        a:hover {
            text-decoration: none;
        }

        body {
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #305074;
            text-transform: capitalize;
            margin-bottom: 10px;
        }

        section.section-padding {
            padding: 80px 0;
        }

        .header-area {
            background-color: #563D7C;
            padding: 10px;
        }

        .header-absoulate {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 9;
            width: 100%;
            background: none;
            color: #563D7C;
            margin-bottom: 30px;
            margin-top: 6px;
        }

        .logo a i.fa.fa-home {
            color: #563D7C;
            font-size: 30px;
            margin-right: 6px;
        }

        .logo span {
            display: inline-block;
            color: #563D7C;
            margin-left: 10px;
            text-transform: uppercase;
            margin: 0;
            font-size: 24px;
            font-weight: 700;

        }

        .main-menu ul {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .main-menu ul li {
            display: inline-block;
        }

        .main-menu ul li a {
            display: block;
            padding: 5px 10px;
            color: #305074;
            text-transform: uppercase;
            text-align: center;
            font-weight: 600;
            transition: .4s;
        }

        .main-menu ul li a:hover {
            background: #305074;
            color: #fff;
        }

        span.social-icon a {
            color: #563D7C;
            font-size: 18px;
            margin: 2px 5px;
            display: inline-block;
        }

        span#na {
            font-weight: 300;
        }

        /* .slider-bg-1 {
    background-image: url(assets/img/student-bg-1.jpg);
}

.slider-bg-2 {
    background-image: url(assets/img/student-bg-2.jpg);
} */

        /* Slider container styles */
        .slider-container {
            margin-top: 80px;
            position: relative;
            width: 100%;
            height: 400px;
            /* Adjust as needed */
            overflow: hidden;
        }

        /* Slide images */
        .slider-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 100%;
            transition: transform 1s ease, left 1s ease;
        }

        .slider-container img.active {
            left: 0;
            transform: translateX(0);
        }

        .slider-container img.prev {
            left: -100%;
        }

        .slider-container img.next {
            left: 100%;
        }

        /* Navigation dots */
        .slider-dots {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .slider-dots span {
            width: 12px;
            height: 12px;
            margin: 0 5px;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 50%;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .slider-dots span.active {
            background: #563D7C;
        }

        /* programs section */

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .programs-section {
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);

        }

        .programs-section .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .programs-section h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #000;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .course-card {
            background-image: url(../admin/inc/bg_cards.jpg);
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            width: 300px;
        }

        .course-card:hover {
            /*  background-color: brown;
    color: #fff;*/
            transform: scale(1.05);

        }

        .course-card h3 {
            font-size: 20px;
            color: #305074;
        }

        /* details */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .dashboard {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f4f4f9;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .tabs {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }

        .tab {
            padding: 10px 20px;
            background-color: #f4f4f9;
            border: none;
            cursor: pointer;
            font-weight: bold;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        .tab.active,
        .tab:hover {
            background-color: #4a76a8;
            color: #fff;
        }

        .content h2 {
            color: #000;
            text-align: center;
            margin-bottom: 10px;
        }

        .description {
            color: #000;
            text-align: justify;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .guidelines {
            color: #000;
            list-style-type: none;
            padding: 0;
            margin-bottom: 20px;
        }

        .guidelines li {
            padding: 5px;
            font-size: 16px;
        }

        .info-cards {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .card {
            background-image: url(../admin/inc/bg_cards.jpg);
            padding: 20px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
            cursor: pointer;
        }

        .card:hover {
            background-color: #4a76a8;
            color: #fff;
            transform: scale(1.05);
        }

        .card .icon {
            font-size: 40px;
            margin-bottom: 10px;
        }

        /*===============================
Footer CSS
=================================*/
        footer {
            background-color: #f4f4f9;
            padding: 50px 0;
        }

        .widget p {
            color: #333;
            margin-right: 20px;
            margin-top: 20px;
            line-height: 1.8;
        }

        footer h3 {
            color: #563D7C;
            font-size: 25px;
            font-weight: 600;
            margin-bottom: 20px;
        }


        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            scroll-behavior: smooth;
            /* Smooth scrolling */
        }

        /* Navbar */
        nav {
            background-color: #000;
            padding: 10px 20px;
            text-align: right;
        }

        /* Contact Section */
        .contact-container {
            max-width: 600px;
            margin: 50px auto;
            background-image: url(../admin/inc/bg_cards.jpg);
            padding: 20px;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
        }

        .contact-container h3 {
            color: #000;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .contact-container p {
            margin-bottom: 15px;
            color: #000;
        }

        .contact-container form input,
        .contact-container form textarea {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .contact-container form textarea {
            resize: none;
            height: 100px;
        }

        .contact-container form button {
            background-color: #4a76a8;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .contact-container form button:hover {
            background-color: #305074;
        }


        .copy-right {
            border-top: 1px solid #999;
            width: 100%;
            text-align: center;
            padding-top: 6px;
            margin-top: 15px;
            color: #555;
        }

        .content-area {
            padding-bottom: 30px;
        }

        div#padding {
            padding: 0 60px;
        }
    </style>
</head>

<body>
<?php if (isset($_SESSION['success_message']) || isset($_SESSION['error_message'])): ?>
        <div class="alert <?= isset($_SESSION['success_message']) ? 'success' : 'error' ?>" id="messageBox">
            <?= $_SESSION['success_message'] ?? $_SESSION['error_message'] ?>
        </div>
        <?php
        // Clear messages after rendering them
        unset($_SESSION['success_message']);
        unset($_SESSION['error_message']);
        ?>
    <?php endif; ?>
    <!--================= Header-area ======================-->
    <div class="header-area header-absoulate">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="logo">
                        <img src="./inc/aitrlogo.png" width="200px">
                    </div>
                </div>
                <!--================== Main menu-area ====================-->
                <div class="col-md-7">
                    <div class="main-menu">
                        <ul>
                            <li><a href="?">Home</a></li>
                            <li><a href="index.php">Admin</a></li>
                            <li><a href="form.php">Students</a></li>
                            <li><a href="#contact" class="scroll-link">contact us</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-md-1 text-right">
                    <span class="social-icon">
                        <a href=""><i class="fa fa-facebook"></i></a>
                        <a href=""><i class="fa fa-google-plus"></i></a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!--======================= Slide-area =======================-->
    <div class="slider-container">
        <img src="https://collegegyan24.edugrown.in/wp-content/uploads/2021/01/AIRT1-1024x512.jpg" alt=" Quality Education" class="active">
        <img src="https://media.collegedekho.com/media/img/institute/crawled_images/acro_3.jpg" class="active">
        <img src="https://sccnhub.com/media/com_easysocial/photos/1135/1331/acropolis-indore-campus_large.png" alt=""> <!-- Add more images as needed -->
        <div class="slider-dots">
            <span class="active"></span>
            <span></span>
            <span></span>
            <!-- Add more dots corresponding to images -->
        </div>
    </div>

    <!--=========================== Content-area ============================-->

    <!-- programs section -->
    <section id="programs" class="programs-section">
        <div class="container">
            <h2>B.Tech Courses</h2>
            <div class="row">
                <!-- Cards for B.Tech -->
                <div class="course-card">
                    <h3>B.Tech - CSE</h3>
                </div>
                <div class="course-card">
                    <h3>B.Tech - CSIT</h3>
                </div>
                <div class="course-card">
                    <h3>B.Tech - IT</h3>
                </div>

                <!-- Cards for B.Tech CSE Specializations -->
                <div class="course-card">
                    <h3>B.Tech CSE - AIML</h3>
                </div>
                <div class="course-card">
                    <h3>B.Tech CSE - Data Science</h3>
                </div>
                <div class="course-card">
                    <h3>B.Tech CSE - Cyber Security</h3>
                </div>
                <div class="course-card">
                    <h3>B.Tech CSE - Indian Language</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- details -->
    <div class="dashboard">

        <div class="content">
            <h2>Admission to B Tech Courses</h2>
            <p class="description">
                Candidates interested in seeking admission in a 4-year full-time B.Tech course should have passed
                12th or equivalent from any recognized board or university with Mathematics as a compulsory subject
                and a minimum aggregate 45% marks in PCM collectively. Candidates having JEE scorecards will get
                preference. Admission to the B.Tech course is as per the guidelines laid down by the Government.
            </p>

            <ul class="guidelines">
                <li>General Category – 50%</li>
                <li>SC Category – 16%</li>
                <li>OBC Category – 14%</li>
                <li>ST Category – 20%</li>
                <li>EWS Category – 10%</li>
            </ul>

            <div class="info-cards">
                <div class="card">
                    <i class="icon">📊</i>
                    <h3>Eligibility Criteria</h3>
                    <p>10+2 or equivalent exam with Maths</p>
                </div>
                <div class="card">
                    <i class="icon">🎓</i>
                    <h3>Institute</h3>
                    <p>Acropolis Institute of Technology & Research</p>
                </div>
                <div class="card">
                    <i class="icon">🏢</i>
                    <h3>University</h3>
                    <p>Rajiv Gandhi Proudyogiki Vishwavidyalaya</p>
                </div>
                <div class="card">
                    <i class="icon">📞</i>
                    <h3>Help Line Number</h3>
                    <p>9630090037, 9630090038</p>
                </div>
            </div>
        </div>
    </div>

    <!--========================== Footer-area ===============================-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">



                    <!-- Contact Us Section -->
                    <section id="contact">
                        <div class="contact-container">
                            <h3>Get In Touch</h3>
                            <p>CONTACT</p>
                            <p><i class="fas fa-map-marker-alt"></i> Acropolis Institute of Technology & Research</p>
                            <p><i class="fas fa-envelope"></i> info@acropolis.in, admission@acropolis.in</p>
                            <p><i class="fas fa-phone"></i> 0731-4730000, 4730001</p>
        
                        </div>
                    </section>
                </div>

                <p class="copy-right">Copyright &copy; Shreya Chaturvedi & Shraddha Sharma</p>
            </div>
        </div>
    </footer>

    <script>
        // Add a delay to automatically hide the message
        const messageBox = document.getElementById('messageBox');
        if (messageBox) {
            setTimeout(() => {
                messageBox.classList.add('slide-out'); // Add slide-out animation
                setTimeout(() => messageBox.style.display = 'none', 1000); // Remove from view
            }, 3000); // Display message for 3 seconds before starting slide-out
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const slides = document.querySelectorAll(".slider-container img");
            const dots = document.querySelectorAll(".slider-dots span");
            let currentIndex = 0;

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.classList.remove("active", "prev", "next");
                    dots[i].classList.remove("active");
                    if (i === index) {
                        slide.classList.add("active");
                    } else if (i < index) {
                        slide.classList.add("prev");
                    } else {
                        slide.classList.add("next");
                    }
                });
                dots[index].classList.add("active");
            }

            function nextSlide() {
                currentIndex = (currentIndex + 1) % slides.length;
                showSlide(currentIndex);
            }

            // Auto-slide every 3 seconds
            let slideInterval = setInterval(nextSlide, 3000);

            // Pause on hover
            const sliderContainer = document.querySelector(".slider-container");
            sliderContainer.addEventListener("mouseenter", () => clearInterval(slideInterval));
            sliderContainer.addEventListener("mouseleave", () => slideInterval = setInterval(nextSlide, 3000));

            // Add dot navigation
            dots.forEach((dot, index) => {
                dot.addEventListener("click", () => {
                    currentIndex = index;
                    showSlide(index);
                });
            });

            showSlide(currentIndex);
        });
    </script>
    <script>
        document.querySelectorAll('.scroll-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault(); // Prevent default anchor behavior
                const targetId = this.getAttribute('href').slice(1); // Get the target ID
                const targetElement = document.getElementById(targetId);

                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 50, // Offset for navbar height
                        behavior: 'smooth' // Smooth scrolling
                    });
                }
            });
        });
    </script>

</body>

</html>