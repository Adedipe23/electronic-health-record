window.addEventListener("DOMContentLoaded", function () {
  handleLoginLogoutButton();
});

function handleLoginLogoutButton() {
  const loginLogoutButton = document.getElementById("loginLogoutButton");
  const navbarLinks = document.getElementById("navbarLinks");

  if (!loginLogoutButton || !navbarLinks) return;

  fetch("login.php")
    .then((response) => response.json())
    .then((data) => {
      if (data.loggedIn && data.loggedInDoctor) {
        loginLogoutButton.innerText = "Logout";
        loginLogoutButton.classList.replace("btn-theme-primary", "btn-danger");
        loginLogoutButton.addEventListener("click", handleLogout);

        if (!document.getElementById("dashboardLink")) {
          const dashboardLink = document.createElement("li");
          dashboardLink.classList.add("nav-item");
          dashboardLink.id = "dashboardLink";
          dashboardLink.innerHTML =
            '<a class="nav-link" href="doctor-dashboard.php">Dashboard</a>';
          navbarLinks.appendChild(dashboardLink);
        }

        if (!document.getElementById("yourPatientsLink")) {
          const yourPatientsLink = document.createElement("li");
          yourPatientsLink.classList.add("nav-item");
          yourPatientsLink.id = "yourPatientsLink";
          yourPatientsLink.innerHTML =
            '<a class="nav-link" href="patients.php">Your Patients</a>';
          navbarLinks.appendChild(yourPatientsLink);
        }

        if (!document.getElementById("newPatientLink")) {
          const newPatientLink = document.createElement("li");
          newPatientLink.classList.add("nav-item");
          newPatientLink.id = "newPatientLink";
          newPatientLink.innerHTML =
            '<a class="nav-link" href="ehr.php">New Patient</a>';
          navbarLinks.appendChild(newPatientLink);
        }
      } else {
        loginLogoutButton.innerText = "Login";
        loginLogoutButton.classList.replace("btn-danger", "btn-theme-primary");
        loginLogoutButton.href = "login.php";

        ["dashboardLink", "yourPatientsLink", "newPatientLink"].forEach(
          (linkId) => {
            const link = document.getElementById(linkId);
            if (link) link.remove();
          }
        );
      }
    })
    .catch((error) => console.error("Error fetching login status:", error));
}
