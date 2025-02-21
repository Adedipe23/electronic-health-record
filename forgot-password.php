<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forgot Password - MedConnectPro</title>
    <link rel="icon" href="img/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="doctor-dashboard.php">
                <img src="img/logo_main.png" alt="MedConnectPro Logo" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav" id="navLinks">
                </ul>
                <a href="index.php" id="loginButton" class="btn btn-secondary-theme ms-auto">Login</a>
            </div>
        </div>
    </nav>

    <div class="container form-container">
        <br>
        <h2 class="text-center mb-4">Reset Your Password</h2>
        <form id="passwordResetForm">
            <div class="mb-3">
                <label for="userEmail" class="form-label fw-bold">Email address</label>
                <input type="email" class="form-control" id="userEmail" required />
                <div class="invalid-feedback">
                    Please enter a valid email address.
                </div>
            </div>
            <div class="mb-3">
                <label for="newPass" class="form-label fw-bold">New Password</label>
                <input type="password" class="form-control" id="newPass" required />
            </div>
            <div class="mb-3">
                <label for="confirmPass" class="form-label fw-bold">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPass" required />
                <div class="invalid-feedback">Passwords do not match.</div>
            </div>
            <button type="submit" class="btn btn-gradient-purple w-100">
                Confirm Password
            </button>
        </form>
    </div>

    <footer class="footbar text-white text-center py-3">
        <p>&copy; 2024 MedConnectPro. All rights reserved.</p>
    </footer>

    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/reset-password.js"></script>
</body>

</html>