<?php
session_start();
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    header("Location: login.php");
    exit;
}
require 'db_connection.php';

$doctorId = $_SESSION['doctorId'];

$stmt = $conn->prepare("SELECT ehr_id, patient_name, dob, gender, country FROM patient_ehr WHERE doctor_id = ?");
$stmt->bind_param("i", $doctorId);
$stmt->execute();
$result = $stmt->get_result();
$patientList = [];
while ($row = $result->fetch_assoc()) {
    $dob = $row['dob'];
    if ($dob && $dob !== '0000-00-00') {
        $dateParts = explode('-', $dob);
        $formattedDob = $dateParts[2] . '-' . $dateParts[1] . '-' . $dateParts[0];
    } else {
        $formattedDob = '';
    }

    $nameParts = explode(' ', $row['patient_name'], 2);
    $firstName = $nameParts[0];
    $lastName = isset($nameParts[1]) ? $nameParts[1] : '';

    $patientList[] = [
        'ehr_id' => $row['ehr_id'],
        'firstName' => $firstName,
        'lastName' => $lastName,
        'dob' => $formattedDob,
        'gender' => $row['gender'],
        'country' => $row['country']
    ];
}
$patientListJson = json_encode($patientList);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Patient List - MedConnectPro</title>
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
                    <li class="nav-item"><a class="nav-link" href="doctor-dashboard.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="ehr.php">New Patient</a></li>
                </ul>
                <a href="logout.php" class="btn btn-danger ms-auto">Logout</a>
            </div>
        </div>
    </nav>

    <script>
    var patientData = <?php echo $patientListJson; ?>;
    </script>

    <div class="container mt-4">
        <h2>Patient List</h2>

        <div class="mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Search for patients..."
                oninput="filterPatients()" />
        </div>

        <div class="d-flex justify-content-end mb-3">
            <button class="btn btn-secondary sort-btn" onclick="sortPatients('asc')">Sort A-Z</button>
            <button class="btn btn-secondary sort-btn" onclick="sortPatients('desc')">Sort Z-A</button>
        </div>

        <table class="patient-info-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Country of Origin</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="patientList"></tbody>
        </table>

        <a href="ehr.php" class="btn btn-gradient-purple mt-3">Add New Patient</a>
    </div>

    <footer class="footbar text-white text-center py-3">
        <p>&copy; 2024 MedConnectPro. All rights reserved.</p>
    </footer>

    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/patient-list.js"></script>
</body>

</html>