<?php
require 'db_connection.php';

session_start();
$errorMsg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userEmail = $conn->real_escape_string($_POST['userEmail']);
    $userPassword = $_POST['userPassword'];

    $query = "SELECT * FROM doctors WHERE email = '$userEmail'";
    $result = $conn->query($query);

    if ($result && $result->num_rows === 1) {
        $doctor = $result->fetch_assoc();
        if (password_verify($userPassword, $doctor['password'])) {
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['doctorId'] = $doctor['id'];
            $_SESSION['doctorName'] = $doctor['full_name'];
            $_SESSION['doctorEmail'] = $doctor['email'];
            $_SESSION['specialization'] = $doctor['specialization'];

            header('Location: doctor-dashboard.php');
            exit;
        } else {
            $errorMsg = "Invalid email or password.";
        }
    } else {
        $errorMsg = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - MedConnectPro</title>
    <link rel="icon" href="img/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo_main.png" alt="MedConnectPro Logo" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container form-container">
        <br>
        <h2 class="text-center mb-4">Log in</h2>
        <?php if ($errorMsg): ?>
        <div class="alert alert-danger text-center">
            <?php echo htmlspecialchars($errorMsg); ?>
        </div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="userEmail" class="form-label fw-bold">Email address</label>
                <input type="email" name="userEmail" class="form-control" id="userEmail" required />
            </div>
            <div class="mb-3">
                <label for="userPassword" class="form-label fw-bold">Password</label>
                <input type="password" name="userPassword" class="form-control" id="userPassword" required />
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="showPassword" />
                <label for="showPassword" class="form-check-label">Show Password</label>
            </div>
            <button type="submit" class="btn btn-gradient-purple w-100">Login</button>
        </form>
        <a href="forgot-password.php" class="d-block text-center mt-2">Forgot password?</a>

        <div class="mt-4 text-center">
            <p>Register as a doctor using the link below:</p>
            <a href="register.php" class="btn btn-gradient-purple">Doctor Registration</a>
        </div>
    </div>

    <footer class="footbar text-white text-center py-3">
        <p>&copy; 2024 MedConnectPro. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/login.js"></script>
</body>

</html>