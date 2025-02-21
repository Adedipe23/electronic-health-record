document.addEventListener("DOMContentLoaded", function () {
  // Fetch patient count
  fetch("api.php")
      .then((response) => {
          if (!response.ok) {
              throw new Error("Failed to fetch patient count");
          }
          return response.json();
      })
      .then((data) => {
          const patientCountElement = document.getElementById("patientCount");
          patientCountElement.textContent =
              data.patientCount !== undefined ? data.patientCount : "Error fetching count";
      })
      .catch((error) => {
          console.error("Error fetching patient count:", error);
          document.getElementById("patientCount").textContent = "Error";
      });
});