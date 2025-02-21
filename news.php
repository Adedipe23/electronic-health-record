<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>News - MedConnectPro</title>
    <link rel="icon" href="img/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <div>
                <a class="navbar-brand" href="index.php">
                    <img src="img/logo_main.png" alt="MedConnectPro Logo" />
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
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
                            <a class="btn btn-secondary-theme" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary-theme" href="register.php">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <h1 class="text-center mb-4 section-heading">Latest News</h1>
        <div class="card mb-4">
            <img src="img/doctor_thumbs_up.jpg" class="card-img-top" alt="Exciting Updates" />
            <div class="card-body">
                <h2 class="card-title section-heading">Exciting Updates</h2>
                <p class="card-text">
                    MedConnectPro is thrilled to announce a series of updates aimed at improving user experience and
                    accessibility.
                    With a revamped interface, new integrations for seamless patient-doctor interactions, and enhanced
                    security features,
                    MedConnectPro is setting a new standard in digital healthcare.
                </p>
                <p class="card-text">
                    Stay tuned as we continue to bring cutting-edge features designed to meet the evolving needs of
                    healthcare professionals and their patients.
                </p>
            </div>
        </div>

        <div class="card mb-4">
            <img src="img/doctors.png" class="card-img-top" alt="Healthcare Innovations" />
            <div class="card-body">
                <h2 class="card-title section-heading">Healthcare Innovations</h2>
                <p class="card-text">
                    At MedConnectPro, we are committed to advancing healthcare solutions globally.
                    Our latest innovations include AI-powered diagnostics, telemedicine solutions, and real-time patient
                    monitoring systems.
                    These advancements aim to bridge the gap between patients and providers, making healthcare more
                    accessible and efficient.
                </p>
                <p class="card-text">
                    Join us in embracing the future of healthcare with technologies that empower providers and patients
                    alike.
                </p>
            </div>
        </div>

        <div class="card mb-4">
            <img src="img/doctor_spine.jpg" class="card-img-top" alt="Our Milestones" />
            <div class="card-body">
                <h2 class="card-title section-heading">Our Milestones</h2>
                <p class="card-text">
                    MedConnectPro has reached significant milestones that highlight our commitment to innovation and
                    excellence.
                    From onboarding over 10,000 healthcare professionals to expanding our reach across 20+ countries,
                    our journey has been nothing short of inspiring.
                </p>
                <p class="card-text">
                    These achievements are a testament to our mission of enhancing healthcare delivery globally. Thank
                    you for being part of our story.
                </p>
            </div>
        </div>
    </div>

    <footer class="footbar text-white text-center py-3">
        <p>&copy; 2024 MedConnectPro. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>