function validateForm() {
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    var error = document.getElementById("error");
    var successMessage = document.getElementById("successMessage");
    
    error.innerHTML = ""; // Clear previous error messages
    successMessage.innerHTML = ""; // Clear previous success messages
    
    if (!username.match(/\w+/)) {
        error.innerHTML += "Username should contain at least one word.<br>";
    }

    if (!email.includes('@') || !email.includes('.com')) {
        error.innerHTML += "Email is invalid. It should contain '@' and '.com'.<br>";
    }

    if (password.length < 8 || !password.match(/[A-Z]/) || !password.match(/[!@#$%^&*()_+]/)) {
        error.innerHTML += "Password should be at least 8 characters long and contain one capital letter and one special character.<br>";
    }

    if (password !== confirmPassword) {
        error.innerHTML += "Passwords do not match.<br>";
    }

    if (error.innerHTML !== "") {
        return false;
    }

    successMessage.innerHTML = "Registration successful! Redirecting....";
     // Redirect to another page after a brief delay (e.g., 2 seconds)
     setTimeout(function() {
        window.location.href = "index.html"; // Replace with the actual URL
    }, 2000); // 2000 milliseconds (2 seconds) delay
    return true;
    
}

document.addEventListener("input", function () {
    var registerBtn = document.getElementById("registerBtn");
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    
    if (username && email && password && confirmPassword) {
        registerBtn.disabled = false;
    } else {
        registerBtn.disabled = true;
    }
});

document.getElementById("registerBtn").addEventListener("click", function() {
    validateForm(); // Trigger validation on button click
});
