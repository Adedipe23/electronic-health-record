<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Services - MedConnectPro</title>
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
        <h1 class="text-center section-heading mb-4">Our Services</h1>
        <p class="text-center mb-5">
            At MedConnectPro, we are committed to revolutionizing healthcare through
            our wide range of services.
        </p>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100">
                    <img src="img/telemedicine.jpg" class="card-img-top" alt="Telemedicine Service" />
                    <div class="card-body">
                        <h5 class="card-title section-heading">Telemedicine</h5>
                        <p class="card-text">
                            Connect with certified healthcare providers from the comfort of
                            your home. Schedule virtual consultations with ease.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100">
                    <img src="img/ehr.jpg" class="card-img-top" alt="Electronic Health Records" />
                    <div class="card-body">
                        <h5 class="card-title section-heading">Electronic Health Records</h5>
                        <p class="card-text">
                            Access, manage, and share patient data securely and efficiently
                            with our advanced EHR solutions.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100">
                    <img src="img/ai_diagnosis.jpg" class="card-img-top" alt="AI Diagnosis Tools" />
                    <div class="card-body">
                        <h5 class="card-title section-heading">AI Diagnosis Tools</h5>
                        <p class="card-text">
                            Leverage cutting-edge AI technologies for accurate diagnosis and
                            predictive analytics in healthcare.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-4">
            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100">
                    <img src="img/health_analytics.jpg" class="card-img-top" alt="Health Analytics" />
                    <div class="card-body">
                        <h5 class="card-title section-heading">Health Analytics</h5>
                        <p class="card-text">
                            Gain insights into healthcare trends and patient outcomes with
                            our robust analytics tools.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100">
                    <img src="img/remote_monitoring.jpg" class="card-img-top" alt="Remote Patient Monitoring" />
                    <div class="card-body">
                        <h5 class="card-title section-heading">Remote Patient Monitoring</h5>
                        <p class="card-text">
                            Monitor patients' health remotely with real-time data tracking
                            and reporting for proactive care.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100">
                    <img src="img/pharmacy.jpg" class="card-img-top" alt="Pharmacy Integration" />
                    <div class="card-body">
                        <h5 class="card-title section-heading">Pharmacy Integration</h5>
                        <p class="card-text">
                            Simplify prescription management and enhance pharmacy
                            collaboration with our integrated systems.
                        </p>
                    </div>
                </div>
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