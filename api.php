<?php

session_start();


if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    
    header("Content-Type: application/json");
    echo json_encode(['error' => 'Unauthorized access']);
    exit;
}


require 'database_connection.php';


$doctorId = $_SESSION['doctorId'];


$sqlQuery = $dbConnection->prepare("SELECT COUNT(*) AS patient_count FROM patient_ehr WHERE doctor_id = ?");
$sqlQuery->bind_param("i", $doctorId);
$sqlQuery->execute();


$resultSet = $sqlQuery->get_result();
$rowData = $resultSet->fetch_assoc();


$patientCount = $rowData['patient_count'] ?? 0;


header("Content-Type: application/json");
echo json_encode(['patientCount' => $patientCount]);