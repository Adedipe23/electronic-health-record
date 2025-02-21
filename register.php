<?php
require 'db_connection.php';

$errorMsg = "";
$successMsg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $doctorName = $conn->real_escape_string($_POST['doctorName']);
    $doctorEmail = $conn->real_escape_string($_POST['doctorEmail']);
    $doctorPassword = $_POST['doctorPassword'];
    $confirmDoctorPassword = $_POST['confirmDoctorPassword'];
    $doctorSpecialization = $conn->real_escape_string($_POST['doctorSpecialization']);

    if ($doctorPassword !== $confirmDoctorPassword) {
        $errorMsg = "Passwords do not match.";
    } else {
        $hashedPassword = password_hash($doctorPassword, PASSWORD_BCRYPT);

        $emailCheckQuery = "SELECT * FROM doctors WHERE email = '$doctorEmail'";
        $emailCheckResult = $conn->query($emailCheckQuery);

        if ($emailCheckResult->num_rows > 0) {
            $errorMsg = "Email is already registered.";
        } else {
            $insertQuery = "INSERT INTO doctors (full_name, email, specialization, password) 
                            VALUES ('$doctorName', '$doctorEmail', '$doctorSpecialization', '$hashedPassword')";

            if ($conn->query($insertQuery)) {
                header('Location: login.php');
                exit;
            } else {
                $errorMsg = "Error: " . $conn->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Registration - MedConnectPro</title>
    <link rel="icon" href="img/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo_main.png" alt="MedConnectPro Logo" />
            </a>
        </div>
    </nav>

    <div class="container form-container">
        <br />
        <h2 class="text-center mb-4">Register Here</h2>

        <?php if ($errorMsg): ?>
        <div class="alert alert-danger"><?php echo $errorMsg; ?></div>
        <?php endif; ?>

        <?php if ($successMsg): ?>
        <div class="alert alert-success"><?php echo $successMsg; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="mb-3">
                <label for="doctorName" class="form-label fw-bold">Full Name</label>
                <input type="text" class="form-control" id="doctorName" name="doctorName" required />
            </div>
            <div class="mb-3">
                <label for="doctorEmail" class="form-label fw-bold">Email address</label>
                <input type="email" class="form-control" id="doctorEmail" name="doctorEmail" required />
            </div>
            <div class="mb-3">
                <label for="doctorPassword" class="form-label fw-bold">Password</label>
                <input type="password" class="form-control" id="doctorPassword" name="doctorPassword" required
                    minlength="8" />
            </div>
            <div class="mb-3">
                <label for="confirmDoctorPassword" class="form-label fw-bold">Confirm Password</label>
                <input type="password" class="form-control" id="confirmDoctorPassword" name="confirmDoctorPassword"
                    required />
            </div>
            <div class="mb-3">
                <label for="doctorSpecialization" class="form-label fw-bold">Specialization</label>
                <input type="text" class="form-control" id="doctorSpecialization" name="doctorSpecialization" />
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="termsAgreement" required />
                <label class="form-check-label" for="termsAgreement">I agree to the terms and conditions</label>
            </div>
            <button type="submit" class="btn btn-gradient-purple w-100">Register</button>
        </form>
    </div>

    <div class="mt-4 text-center">
        <p>Already a registered doctor? Log in below:</p>
        <a href="login.php" class="btn btn-gradient-purple">Login</a>
    </div>
    <br><br><br>

    <footer class="footbar text-white text-center py-3">
        <p>&copy; 2024 MedConnectPro. All rights reserved.</p>
    </footer>

    <script src="js/script.js"></script>
    <script src="js/register.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>