document.addEventListener("DOMContentLoaded", function () {
    const passwordField = document.getElementById("password");
    const confirmPasswordField = document.getElementById("confirmPassword");
    const submitButton = document.querySelector("button[type='submit']");

    
    passwordField.addEventListener("input", function () {
        const password = passwordField.value;
        const uppercaseRegex = /[A-Z]/;
        const specialCharRegex = /[!@#$%^&*(),.?":{}|<>]/;

        let errorMessage = "";

        if (!uppercaseRegex.test(password)) {
            errorMessage += "Password must contain at least one uppercase letter. ";
        }
        if (!specialCharRegex.test(password)) {
            errorMessage += "Password must contain at least one special character. ";
        }

        const errorDiv = passwordField.nextElementSibling;
        if (errorMessage) {
            if (!errorDiv || !errorDiv.classList.contains("error-message")) {
                const errorElement = document.createElement("div");
                errorElement.className = "text-danger mt-1 error-message";
                errorElement.textContent = errorMessage;
                passwordField.insertAdjacentElement("afterend", errorElement);
            } else {
                errorDiv.textContent = errorMessage;
            }
            submitButton.disabled = true; 
        } else {
            if (errorDiv && errorDiv.classList.contains("error-message")) {
                errorDiv.remove(); 
            submitButton.disabled = false; 
        }
    }
    });

    confirmPasswordField.addEventListener("input", function () {
        const confirmPassword = confirmPasswordField.value;
        const password = passwordField.value;

        const errorDiv = confirmPasswordField.nextElementSibling;
        if (password !== confirmPassword) {
            if (!errorDiv || !errorDiv.classList.contains("error-message")) {
                const errorElement = document.createElement("div");
                errorElement.className = "text-danger mt-1 error-message";
                errorElement.textContent = "Passwords do not match.";
                confirmPasswordField.insertAdjacentElement("afterend", errorElement);
            } else {
                errorDiv.textContent = "Passwords do not match.";
            }
            submitButton.disabled = true;
        } else {
            if (errorDiv && errorDiv.classList.contains("error-message")) {
                errorDiv.remove(); 
            submitButton.disabled = false;
            }
        }
    });
});
