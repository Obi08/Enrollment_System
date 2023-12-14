<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your School Website Description">
    <meta name="keywords" content="university, education, Caloocan City">
    <meta name="author" content="Your Name">
    <title>Your School Name</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Your custom CSS (if any) -->
    <style>
        @font-face {
            font-family: myFont;
            src: url(cavi.ttf);
        }

        body {
            margin: 0;
            padding-top: 56px; /* Adjust based on your fixed navbar height */
            position: relative;
            background-color: #f8f9fa; /* Set a light background color */
            font-family: 'Arial', sans-serif;
            color: #333; /* Set the text color */
        }

        .navbar {
            background-color: #ffffff; /* Set a white background color */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
        }

        .navbar-toggler-icon {
            background-color: #333; /* Set the color of the navbar toggler icon */
        }

        .navbar-light .navbar-nav .nav-link {
            color: #333; /* Set the color of the navbar links */
            cursor: pointer;
        }

        .navbar-light .navbar-toggler-icon {
            color: #333; /* Set the color of the navbar toggler icon in collapsed state */
        }

        .navbar-brand {
            font-family: myfont;
            font-size: 1.5rem;
        }

        .carousel {
            width: 100%;
            max-height: 700px; /* Adjust the max-height as needed */
            overflow: hidden;
            margin-top: 0px; /* Add some space between navbar and carousel */
        }

        .carousel-item {
            width: 100%;
            height: 100%;
        }

        .carousel-item img {
            width: 100%;
            height: 100%;
        }

        .carousel-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #fff; /* Text color */
            z-index: 1; /* Place text in front of the image */
        }

        .carousel-text h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .carousel-text p {
            font-size: 1.2rem;
        }

        @media (max-width: 768px) {
            .navbar {
                padding-left: 16px;
                padding-right: 16px;
            }
        }

        /* Add a margin to the sections for better visibility */
        section {
            margin-top: 50px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <img src="ucc.png" width="50" height="50" alt="Logo" class="logo">
        <a class="navbar-brand" href="#">University of Caloocan City</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <!-- Updated Home link with href="#home" -->
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#partners">Partners</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about-us">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary" href="login.php">Enroll Now!</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Home Section -->
    <section id="home">
        <div id="imageCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="ucc-3.jpg" class="d-block w-100" alt="Image 1">
                    <div class="carousel-text">
                        <h1>University of Caloocan City</h1>
                        <p>Congressional Campus</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="ucc-1.jpg" class="d-block w-100" alt="Image 2">
                    <div class="carousel-text">
                        <h1>University of Caloocan City</h1>
                        <p>Camarin Campus</p>
                    </div>
                </div>
                <!-- Add more carousel items as needed -->
            </div>

            <!-- Navigation Controls -->
            <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>

    <!-- Partners Section -->
    <section id="partners">
        <div class="container">
            <h2>Our Partners</h2>
            <p>Discover the organizations and institutions we collaborate with to provide the best education.</p>
            
            <div class="row">
                <div class="col-md-4">
                    <img src="cross.png" width="50" height="50" alt="Partner 1" class="img-fluid">
                    <h4>Philippine Red Cross</h4>
                    <p>Riot Games, Inc. is an American video game developer, publisher, and esports tournament organizer based in Los Angeles, California.</p>
                </div>
                <div class="col-md-4">
                    <img src="riot1.png" width="50" height="50" alt="Partner 2" class="img-fluid">
                    <h4>Riot Games</h4>
                    <p>Riot Games, Inc. is an American video game developer, publisher, and esports tournament organizer based in Los Angeles, California.</p>
                </div>
                <div class="col-md-4">
                    <img src="ched.png" width="50" height="50" alt="Partner 3" class="img-fluid">
                    <h4>Commission on Higher Education</h4>
                    <p>The Commission on Higher Education (CHED; Filipino: Komisyon sa Mas Mataas na Edukasyon or Komisyon sa Lalong Mataas na Edukasyon) is a government agency under the Office of the President of the Philippines. It is responsible for regulating and governing all higher education institutions and post-secondary educational programs in the country.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about-us">
        <div class="container">
            <h2>About Us</h2>
            <p>The University of Caloocan City (abbreviated as UCC) is a public-type local university established in 1971 and formerly called Caloocan City Community College and Caloocan City Polytechnic College. Its south campus is located at Biglang Awa St., Grace Park East, 12th Avenue, Caloocan, Metro Manila, Philippines (also known as EDSA/Biglang Awa Campus) and the north campuses are Camarin Business Campus, Congressional Campus, and TechVoc Campus (near Libis, Camarin).</p>
            
            <div class="row">
                <div class="col-md-6">
                    <h4>Our Mission</h4>
                    <p>To develop academically excellent, professionally progressive, industry sensitive, environmentally and technologically conscious, globally competitive and resilient graduates through quality instruction, functional co-curricular activities, responsive community immersion programs, intensive research and development and continually improved quality management system molding them to become effective social and cultural agent of change.</p>
                </div>
                <div class="col-md-6">
                    <h4>Our Vision</h4>
                    <p>A local government university with global quality of education imbued with desired knowledge, skills, and values for academic excellence, professional development, civic consciousness, resillient citizenry, technological advancement, ecological sustainability and continual improvement.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ... (Your existing HTML content) ... -->

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Activate Carousel and Smooth Scrolling -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Activate Bootstrap Carousel
            $('#imageCarousel').carousel({
                interval: 3000 // Adjust the interval as needed (in milliseconds)
            });

            // Smooth scrolling for navigation links
            document.querySelectorAll('a.nav-link').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();

                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
</body>
</html>
