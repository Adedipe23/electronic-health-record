<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact - MedConnectPro</title>
    <link rel="icon" href="img/logo.png" />
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
        <h1 class="text-center mb-4 hero-subheading">Contact Us</h1>
        <div class="row g-5">
            <div class="col-lg-5">
                <div class="bg-light p-4 shadow-sm rounded">
                    <h3 class="hero-subheading">Our Contact Details</h3>
                    <p class="mt-3">
                        <i class="bi bi-geo-alt-fill text-primary me-2"></i>
                        <strong>Address:</strong> Hauptstraße 123, 10115 Berlin, Germany
                    </p>
                    <p>
                        <i class="bi bi-envelope-fill text-primary me-2"></i>
                        <strong>Email:</strong>
                        <a href="mailto:support@medconnectpro.de" class="hero-subheading">
                            support@medconnectpro.de
                        </a>
                    </p>
                    <p>
                        <i class="bi bi-telephone-fill text-primary me-2"></i>
                        <strong>Phone:</strong> +49 30 12345678
                    </p>
                    <p>
                        <i class="bi bi-exclamation-circle-fill text-danger me-2"></i>
                        <strong>Emergency:</strong> +49 30 87654321
                    </p>
                    <h5 class="mt-4">We’re here to help!</h5>
                    <p>
                        Have questions or need assistance? Our team is ready to assist. Send us a
                        message or give us a call.
                    </p>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="bg-light p-4 shadow-sm rounded">
                    <h3 class="hero-subheading mb-4">Send Us a Message</h3>
                    <div class="mb-3">
                        <label for="fullName" class="form-label fw-bold">Full Name</label>
                        <input type="text" class="form-control" id="fullName" name="fullName"
                            placeholder="Enter your name" required />
                        <div class="invalid-feedback">Please provide your full name.</div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
                            required />
                        <div class="invalid-feedback">Please provide a valid email address.</div>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label fw-bold">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject"
                            placeholder="Enter the subject" required />
                        <div class="invalid-feedback">Please provide a subject.</div>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label fw-bold">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5"
                            placeholder="Write your message here" required></textarea>
                        <div class="invalid-feedback">Please write your message.</div>
                    </div>
                    <button type="submit" class="btn btn-gradient-purple w-100 fw-bold">Submit</button>
                </div>
            </div>
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