<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home - MedConnectPro</title>
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

    <header class="text-center py-5 bg-light hero-section">
        <div class="container mt-5">
            <h1 class="display-4 hero-heading mb-2">
                <strong>Empowering Doctors, Supporting Patients</strong>
            </h1>
            <p class="lead hero-subheading">
                Bringing Simplicity to Complex Healthcare Needs
            </p>
            <a href="contact.php" class="btn btn-gradient-purple btn-lg mt-4 mb-5">Book an Appointment</a>
        </div>
    </header>

    <section class="container py-5">
        <div class="row text-center mt-5 mb-5">
            <h2 class="mb-5">Our Key Services</h2>

            <div class="col-md-4">
                <div class="card">
                    <img src="img/patient.jpg" class="card-img-top" alt="Patient Management" />
                    <div class="card-body">
                        <h5 class="card-title">Patient Management</h5>
                        <p class="card-text">
                            Easily view, update, and manage patient records securely in one
                            place.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="img/appointment.jpg" class="card-img-top" alt="Appointment Scheduling" />
                    <div class="card-body">
                        <h5 class="card-title">Appointment Scheduling</h5>
                        <p class="card-text">
                            Easy appointment booking and doctors can keep track of the
                            appointments with ease.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="img/security.jpg" class="card-img-top" alt="Data Security" />
                    <div class="card-body">
                        <h5 class="card-title">Data Security</h5>
                        <p class="card-text">
                            State-of-the-art security features to protect patient data and
                            ensure privacy.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light py-5">
        <div class="container text-center">
            <h2>Our Achievements</h2>
            <p class="lead mb-5">
                At MedConnectPro, we pride ourselves on providing exceptional
                healthcare solutions. Here’s what we’ve accomplished so far:
            </p>
            <div class="row">
                <div class="col-md-4">
                    <div class="achievement-card">
                        <h3 class="display-4 text-primary">10,000+</h3>
                        <p class="lead">Appointments Booked</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="achievement-card">
                        <h3 class="display-4 text-success">1,200+</h3>
                        <p class="lead">Doctors Registered</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="achievement-card">
                        <h3 class="display-4 text-warning">50+</h3>
                        <p class="lead">Specialties Offered</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-5">
        <div class="container mt-5">
            <h2 class="text-center mb-5">Latest News</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/doctor_thumbs_up.jpg" class="card-img-top" alt="News Image 1" />
                        <div class="card-body">
                            <h5 class="card-title">Exciting Updates</h5>
                            <p class="card-text">
                                Stay informed with the latest developments in MedConnectPro.
                            </p>
                            <a href="news.php" class="btn btn-gradient-purple">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/doctors.png" class="card-img-top" alt="News Image 2" />
                        <div class="card-body">
                            <h5 class="card-title">Healthcare Innovations</h5>
                            <p class="card-text">
                                Learn how we're advancing healthcare solutions globally.
                            </p>
                            <a href="news.php" class="btn btn-gradient-purple">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/doctor_spine.jpg" class="card-img-top" alt="News Image 3" />
                        <div class="card-body">
                            <h5 class="card-title">Our Milestones</h5>
                            <p class="card-text">
                                Explore key milestones that showcase our impact.
                            </p>
                            <a href="news.php" class="btn btn-gradient-purple">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-5">
        <div class="container text-center">
            <h2>Our Partners</h2>
            <div class="row align-items-center">
                <div class="col-md-2 col-4">
                    <img src="img/oscar-health.svg" alt="Partner 1 Logo" class="img-fluid" />
                </div>
                <div class="col-md-2 col-4 ms-5">
                    <img src="img/axa-health.svg" alt="Partner 2 Logo" class="img-fluid" />
                </div>
                <div class="col-md-2 col-4 ms-5">
                    <img src="img/christian-health.svg" alt="Partner 3 Logo" class="img-fluid" />
                </div>
                <div class="col-md-2 col-4 ms-5">
                    <img src="img/primary-health.svg" alt="Partner 4 Logo" class="img-fluid" />
                </div>
                <div class="col-md-2 col-4 ms-5">
                    <img src="img/united-health.svg" alt="Partner 5 Logo" class="img-fluid" />
                </div>
            </div>
        </div>
    </section>

    <footer class="footbar text-white text-center py-3">
        <p>&copy; 2024 MedConnectPro. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>