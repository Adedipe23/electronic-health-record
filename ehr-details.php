<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit;
}

// Include the database connection file
require 'db_connection.php';

// Retrieve the doctor's ID from the session
$doctorId = $_SESSION['doctorId'];

// Validate the EHR ID from the query string
$ehrId = isset($_GET['ehr_id']) ? filter_var($_GET['ehr_id'], FILTER_VALIDATE_INT) : 0;
if ($ehrId <= 0) {
    echo "Invalid EHR ID.";
    exit;
}

// Function to format date from 'dd-mm-yyyy' to 'yyyy-mm-dd'
function formatDate($date) {
    if (empty($date)) return null;
    $parts = explode('-', $date);
    if (count($parts) === 3) {
        return $parts[2] . '-' . $parts[1] . '-' . $parts[0];
    }
    return null;
}

// Function to validate date format
function isValidDate($date, $format = 'd-m-Y') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}

// Function to decode and sanitize text
function sanitizeText($text) {
    return htmlspecialchars(stripslashes($text), ENT_QUOTES);
}

// Handle form submission for saving patient data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save') {
    // Sanitize and validate form inputs
    $patientName = $conn->real_escape_string($_POST['patientName']);
    $dobInput = $_POST['dob'];
    $dobFormatted = isValidDate($dobInput) ? formatDate($dobInput) : null;
    $gender = $conn->real_escape_string($_POST['gender']);
    $country = $conn->real_escape_string($_POST['country']);
    $appointmentDateInput = $_POST['appointmentDate'];
    $appointmentDateFormatted = isValidDate($appointmentDateInput) ? formatDate($appointmentDateInput) : null;
    $appointmentNotes = str_replace("\r\n", "\n", $conn->real_escape_string($_POST['appointmentNotes']));
    $mobile = filter_var($_POST['mobile'], FILTER_SANITIZE_NUMBER_INT);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $otherPhone = filter_var($_POST['otherPhone'], FILTER_SANITIZE_NUMBER_INT);
    $insuranceNumber = $conn->real_escape_string($_POST['insuranceNumber']);
    $address = $conn->real_escape_string($_POST['address']);
    $postalCode = $conn->real_escape_string($_POST['postalCode']);
    $billingAddress = $conn->real_escape_string($_POST['billingAddress']);
    $amountToBePaid = floatval($_POST['amountToBePaid']);
    $symptoms = str_replace("\r\n", "\n", $conn->real_escape_string($_POST['symptoms']));
    $maritalStatus = $conn->real_escape_string($_POST['maritalStatus']);
    $diagnosis = str_replace("\r\n", "\n", $conn->real_escape_string($_POST['diagnosis']));
    $familyHistory = str_replace("\r\n", "\n", $conn->real_escape_string($_POST['familyHistory']));
    $scanTests = str_replace("\r\n", "\n", $conn->real_escape_string($_POST['scanTests']));
    $medications = str_replace("\r\n", "\n", $conn->real_escape_string($_POST['medications']));
    $labTests = str_replace("\r\n", "\n", $conn->real_escape_string($_POST['labTests']));
    $doctorNotes = str_replace("\r\n", "\n", $conn->real_escape_string($_POST['doctorNotes']));

    // Prepare the SQL query to update patient data
    $stmt = $conn->prepare("UPDATE patient_ehr SET 
        patient_name=?, dob=?, gender=?, country=?, appointment_date=?, appointment_notes=?, mobile=?, email=?, 
        other_phone=?, address=?, insurance_number=?, postal_code=?, billing_address=?, amount_to_be_paid=?, 
        symptoms=?, marital_status=?, diagnosis=?, family_history=?, scan_tests=?, medications=?, lab_tests=?, 
        doctor_notes=? WHERE ehr_id=? AND doctor_id=?");

    $stmt->bind_param(
        "sssssssssssssssssssssdii",
        $patientName, $dobFormatted, $gender, $country, $appointmentDateFormatted, $appointmentNotes,
        $mobile, $email, $otherPhone, $address, $insuranceNumber, $postalCode, $billingAddress, $amountToBePaid,
        $symptoms, $maritalStatus, $diagnosis, $familyHistory, $scanTests, $medications, $labTests, $doctorNotes,
        $ehrId, $doctorId
    );

    // Execute the query and handle success/error
    if ($stmt->execute()) {
        $successMessage = "Patient information updated successfully!";
    } else {
        error_log("Error updating patient record: " . $conn->error);
        $errorMessage = "An error occurred while updating the patient record. Please try again.";
    }
}

// Handle form submission for deleting patient data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
    $stmt = $conn->prepare("DELETE FROM patient_ehr WHERE ehr_id=? AND doctor_id=?");
    $stmt->bind_param("ii", $ehrId, $doctorId);
    if ($stmt->execute()) {
        header("Location: patients.php");
        exit;
    } else {
        error_log("Error deleting patient record: " . $conn->error);
        $errorMessage = "An error occurred while deleting the patient record.";
    }
}

// Fetch patient data from the database
$stmt = $conn->prepare("SELECT * FROM patient_ehr WHERE ehr_id=? AND doctor_id=?");
$stmt->bind_param("ii", $ehrId, $doctorId);
$stmt->execute();
$result = $stmt->get_result();
$patient = $result->fetch_assoc();

if (!$patient) {
    echo "No patient found or you do not have access to this patient.";
    exit;
}

// Decode and sanitize patient data for display
$decodedSymptoms = sanitizeText($patient['symptoms']);
$decodedFamilyHistory = sanitizeText($patient['family_history']);
$decodedScanTests = sanitizeText($patient['scan_tests']);
$decodedDiagnosis = sanitizeText($patient['diagnosis']);
$decodedMedications = sanitizeText($patient['medications']);
$decodedLabTests = sanitizeText($patient['lab_tests']);
$decodedDoctorNotes = sanitizeText($patient['doctor_notes']);

// Function to display date in 'dd-mm-yyyy' format
function displayDate($date) {
    if (empty($date) || $date === '0000-00-00') return '';
    $parts = explode('-', $date);
    return $parts[2] . '-' . $parts[1] . '-' . $parts[0];
}

$displayDob = displayDate($patient['dob']);
$displayAppointmentDate = displayDate($patient['appointment_date']);

// Fetch images associated with the EHR
$stmt = $conn->prepare("SELECT image_id, image_path, image_data FROM ehr_images WHERE ehr_id=? AND doctor_id=?");
$stmt->bind_param("ii", $ehrId, $doctorId);
$stmt->execute();
$imagesResult = $stmt->get_result();
$images = $imagesResult->fetch_all(MYSQLI_ASSOC);

// Handle image upload and deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'upload_image') {
        $uploadedFiles = $_FILES['images'];
        $success = true;
        $uploadedData = [];

        foreach ($uploadedFiles['tmp_name'] as $key => $tmpName) {
            $fileType = mime_content_type($tmpName);
            if (!in_array($fileType, ['image/jpeg', 'image/png'])) {
                echo json_encode(['success' => false, 'error' => 'Invalid file type.']);
                exit;
            }
            if ($uploadedFiles['size'][$key] > 2 * 1024 * 1024) {
                echo json_encode(['success' => false, 'error' => 'File size exceeds 2MB limit.']);
                exit;
            }

            $fileName = basename($uploadedFiles['name'][$key]);
            $fileData = @file_get_contents($tmpName);
            if ($fileData === false) {
                $success = false;
                break;
            }

            $stmt = $conn->prepare("
                INSERT INTO ehr_images (ehr_id, doctor_id, image_path, image_data)
                VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iisb", $ehrId, $doctorId, $fileName, $fileData);

            if (!$stmt->execute()) {
                $success = false;
                break;
            }

            $uploadedData[] = [
                'imageId' => $stmt->insert_id,
                'base64' => base64_encode($fileData),
                'fileName' => $fileName
            ];
        }

        echo json_encode(['success' => $success, 'uploadedData' => $uploadedData]);
        exit;
    }

    if ($_POST['action'] === 'delete_image') {
        $imageId = (int)$_POST['image_id'];
        $stmt = $conn->prepare("DELETE FROM ehr_images WHERE image_id=? AND doctor_id=?");
        $stmt->bind_param("ii", $imageId, $doctorId);
        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => $stmt->error]);
        }
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Patient Details - MedConnectPro</title>
    <link rel="icon" href="img/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="css/ehr-details.css" />
    <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="doctor-dashboard.php">
                <img src="img/logo_main.png" alt="MedConnectPro Logo" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="doctor-dashboard.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="patients.php">Your Patients</a></li>
                    <li class="nav-item"><a class="nav-link" href="ehr.php">New Patient</a></li>
                </ul>
                <a href="logout.php" class="btn btn-danger ms-auto">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <form id="patientInfoForm" method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="action" value="" id="formAction" />
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-3 patient-sidebar">
                    <?php if (!empty($errorMessage)): ?>
                    <div class="alert alert-danger"><?php echo htmlspecialchars($errorMessage); ?></div>
                    <?php endif; ?>
                    <?php if (!empty($successMessage)): ?>
                    <div class="alert alert-success"><?php echo htmlspecialchars($successMessage); ?></div>
                    <?php endif; ?>
                    <div class="mb-3">
                        <label for="editPatientName" class="form-label fw-bold"><strong>Name:</strong></label>
                        <input type="text" class="form-control" id="editPatientName" name="patientName"
                            value="<?php echo htmlspecialchars($patient['patient_name'], ENT_QUOTES); ?>" />
                    </div>
                    <div class="mb-3">
                        <label for="editAge" class="form-label fw-bold"><strong>Date of Birth:</strong></label>
                        <input type="text" class="form-control mb-2 datepicker" id="editAge" name="dob"
                            value="<?php echo htmlspecialchars($displayDob); ?>" placeholder="dd-mm-yyyy" />
                    </div>
                    <div class="mb-3">
                        <label for="editGender" class="form-label fw-bold"><strong>Gender:</strong></label>
                        <select class="form-select" id="editGender" name="gender">
                            <option value="Male" <?php if($patient['gender'] === 'Male') echo 'selected'; ?>>Male</option>
                            <option value="Female" <?php if($patient['gender'] === 'Female') echo 'selected'; ?>>Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editCountry" class="form-label fw-bold"><strong>Country of Origin:</strong></label>
                        <select class="form-select" id="editCountry" name="country">
                            <option value="" disabled>Select Country</option>
                            <?php
                            $countries = [
                                "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria",
                                "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan",
                                "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia",
                                "Cameroon", "Canada", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo (Congo-Brazzaville)", "Costa Rica",
                                "Croatia", "Cuba", "Cyprus", "Czechia (Czech Republic)", "Democratic Republic of the Congo", "Denmark", "Djibouti", "Dominica", "Dominican Republic",
                                "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini", "Ethiopia", "Fiji", "Finland",
                                "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea",
                                "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq",
                                "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Kuwait",
                                "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg",
                                "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico",
                                "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru",
                                "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Korea", "North Macedonia", "Norway", "Oman",
                                "Pakistan", "Palau", "Palestine State", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal",
                                "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe",
                                "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia",
                                "South Africa", "South Korea", "South Sudan", "Spain", "Sri Lanka", "Sudan", "Surin