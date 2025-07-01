document
  .getElementById("registrationForm")
  .addEventListener("submit", function (event) {
    var name = document.getElementById("name").value.trim();
    var email = document.getElementById("email").value.trim();
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm_password").value;

    var nameRegex = /^[a-zA-Z]+(\s[a-zA-Z]+)?$/;
    var passwordRegex =
      /^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var isValid = true;
    var errorMessages = [];

    // Check if fields are empty
    if (name === "") {
      isValid = false;
      errorMessages.push("Name is required.");
    }

    if (email === "") {
      isValid = false;
      errorMessages.push("Email is required.");
    }

    if (password === "") {
      isValid = false;
      errorMessages.push("Password is required.");
    }

    if (confirmPassword === "") {
      isValid = false;
      errorMessages.push("Please confirm your password.");
    }

    if (!nameRegex.test(name)) {
      isValid = false;
      errorMessages.push(
        "Please enter a valid name (only letters with an optional last name)."
      );
    }

    if (!emailRegex.test(email)) {
      isValid = false;
      errorMessages.push("Please enter a valid email address.");
    }

    if (!passwordRegex.test(password)) {
      isValid = false;
      errorMessages.push(
        "Password must be at least 8 characters long and contain at least one uppercase letter, one digit, and one special character."
      );
    }

    if (confirmPassword !== password) {
      isValid = false;
      errorMessages.push("Passwords do not match.");
    }

    if (!isValid) {
      event.preventDefault(); // Prevent form submission
      alert(errorMessages.join("\n"));
    } else {
      setTimeout(function () {
        window.location.href = "home.html";
      }, 1000);
    }
  });
