<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us - MedConnectPro</title>
    <link rel="icon" href="img/logo.jpg" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
    <?php
    // Navigation bar
    $navigationBar = '
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <div>
                <a class="navbar-brand" href="index.php"><img src="img/logo_main.png" alt="Logo" /></a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="mx-auto">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="services.php">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="news.php">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                    </ul>
                </div>

                <div>
                    <ul class="navbar-nav ms-auto gap-1">
                        <li class="nav-item">
                            <a class="btn btn-theme-secondary" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-theme-primary" href="register.php">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>';
    echo $navigationBar;
    ?>

    <div class="container my-5">
        <h1 class="text-center hero-subheading mb-4">About MedConnectPro</h1>
        <p class="text-center lead mb-5">
            Redefining healthcare with cutting-edge Electronic Health Record (EHR) solutions designed for seamless
            integration and optimal patient care.
        </p>

        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <img src="img/ehr_intro.jpg" alt="EHR Overview" class="img-fluid rounded shadow">
            </div>
            <div class="col-md-6">
                <h3 class="hero-subheading mb-3">Our Mission</h3>
                <p class="text-muted">
                    At MedConnectPro, our mission is to empower healthcare providers with intuitive and reliable tools
                    to deliver exceptional care. We aim to simplify the complexities of managing patient records through
                    innovation, security, and efficiency.
                </p>
                <p class="text-muted">
                    From small clinics to large hospitals, our EHR platform ensures every patient interaction is backed
                    by accurate and accessible data.
                </p>
            </div>
        </div>

        <div class="py-5 bg-light rounded">
            <h2 class="text-center mb-4 hero-subheading">Our Features</h2>
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold hero-subheading">Unmatched Security</h5>
                    <p class="text-muted">Top-tier encryption to safeguard sensitive patient information.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold hero-subheading">Intuitive Interface</h5>
                    <p class="text-muted">Designed for ease of use, enabling smooth adoption by all healthcare staff.
                    </p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold hero-subheading">Reliable Performance</h5>
                    <p class="text-muted">24/7 availability with robust infrastructure for uninterrupted service.</p>
                </div>
            </div>
        </div>

        <div class="row align-items-center my-5">
            <div class="col-md-6 order-md-2">
                <img src="img/ehr_benefits.jpg" alt="Why Choose Us" class="img-fluid rounded shadow">
            </div>
            <div class="col-md-6">
                <h3 class="hero-subheading mb-3">Why Choose MedConnectPro?</h3>
                <ul class="list-unstyled text-muted">
                    <li class="mb-3">
                        <i class="bi bi-check-circle-fill hero-subheading"></i> Streamline patient record management for
                        improved efficiency.
                    </li>
                    <li class="mb-3">
                        <i class="bi bi-check-circle-fill hero-subheading"></i> Real-time access to critical patient
                        data for informed decisions.
                    </li>
                    <li class="mb-3">
                        <i class="bi bi-check-circle-fill hero-subheading"></i> Seamless integration with existing
                        healthcare systems.
                    </li>
                    <li class="mb-3">
                        <i class="bi bi-check-circle-fill hero-subheading"></i> Comprehensive support and training for a
                        smooth transition.
                    </li>
                </ul>
            </div>
        </div>

        <div class="py-5 bg-light rounded">
            <h2 class="text-center mb-4 hero-subheading">Meet Our Development Team</h2>
            <p class="text-center text-muted mb-5">
                Our team is composed of passionate professionals dedicated to enhancing healthcare using our
                modernized software.
            </p>
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <img src="img/Lucky.jpg" alt="Team Member" class="rounded-circle mb-3 shadow" style="width: 150px;">
                    <h5>Enechukwu Lucky</h5>
                    <p class="text-muted">Team Leader, Frontend Developer</p>
                </div>
                <div class="col-md-4 mb-4">
                    <img src="img/Ivie.jpg" alt="Team Member" class="rounded-circle mb-3 shadow" style="width: 150px;">
                    <h5>Udeh Adaeze</h5>
                    <p class="text-muted">Frontend Developer</p>
                </div>
                <div class="col-md-4 mb-4">
                    <img src="img/emma.jpg" alt="Team Member" class="rounded-circle mb-3 shadow" style="width: 150px;">
                    <h5>Adedipe Emmanuel</h5>
                    <p class="text-muted">Database Manager</p>
                </div>
                <div class="col-md-4 mb-4">
                    <img src="img/joke.jpg" alt="Team Member" class="rounded-circle mb-3 shadow" style="width: 150px;">
                    <h5>Onajokeoghene Piomoki Stevens</h5>
                    <p class="text-muted">Project Manager</p>
                </div>
                <div class="col-md-4 mb-4">
                    <img src="img/david.jpg" alt="Team Member" class="rounded-circle mb-3 shadow" style="width: 150px;">
                    <h5>Ogbonna David</h5>
                    <p class="text-muted">Backend Developer</p>
                </div>
            </div>
        </div>

        <div class="text-center py-5 rounded bg-primary text-white">
            <h3 class="mb-3">Join the Revolution in Healthcare</h3>
            <p class="lead">Discover the MedConnectPro difference and experience the future of healthcare today.</p>
            <a href="register.php" class="btn btn-light btn-lg">Get Started</a>
        </div>
    </div>

    <?php
    // Footer
    $footerSection = '
    <footer class="footbar text-white text-center py-3">
        <p>&copy; 2024 MedConnectPro. All rights reserved.</p>
    </footer>';
    echo $footerSection;
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>