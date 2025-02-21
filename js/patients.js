function loadPatients() {
  const patientList = document.getElementById("patientList");
  const patients = patientsData || [];

  if (patients.length === 0) {
    patientList.innerHTML = "<tr><td colspan='5'>No patients found.</td></tr>";
  } else {
    displayPatients(patients);
  }
}

function displayPatients(patients) {
  const patientList = document.getElementById("patientList");
  patientList.innerHTML = "";

  patients.forEach((patient) => {
    const row = document.createElement("tr");
    const age = calculateAge(patient.dob);

    row.innerHTML = `
      <td>${patient.firstName} ${patient.lastName}</td>
      <td>${age} years</td>
      <td>${patient.gender}</td>
      <td>${patient.country || "N/A"}</td>
      <td>
        <a href="ehr-details.php?ehr_id=${
          patient.ehr_id
        }" class="btn btn-gradient-purple">View EHR</a>
      </td>
    `;

    patientList.appendChild(row);
  });

  window.currentPatients = patients;
}

function calculateAge(dob) {
  if (!dob) return "N/A";
  const [dd, mm, yyyy] = dob.split("-");
  const birthDate = new Date(yyyy, mm - 1, dd);
  const ageDiffMs = Date.now() - birthDate.getTime();
  const ageDate = new Date(ageDiffMs);
  return Math.abs(ageDate.getUTCFullYear() - 1970);
}

function sortPatients(order) {
  const patients = window.currentPatients || [];
  patients.sort((a, b) => {
    const nameA = (a.firstName + " " + a.lastName).toLowerCase();
    const nameB = (b.firstName + " " + b.lastName).toLowerCase();
    return order === "asc"
      ? nameA.localeCompare(nameB)
      : nameB.localeCompare(nameA);
  });
  displayPatients(patients);
}

function searchPatients() {
  const searchInput = document
    .getElementById("searchInput")
    .value.toLowerCase();
  const patients = patientsData || [];
  const filteredPatients = patients.filter((patient) => {
    const fullName = (patient.firstName + " " + patient.lastName).toLowerCase();
    return fullName.includes(searchInput);
  });
  displayPatients(filteredPatients);
}

window.onload = loadPatients;
