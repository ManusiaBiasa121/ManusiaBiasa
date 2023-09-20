function validateLogin() {
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const errorMessage = document.getElementById("error-message");
  
    // Replace the example username and password with the correct ones
    const correctUsername = "111";
    const correctPassword = "111";
  
    if (username === correctUsername && password === correctPassword) {
      // Redirect to the success page
      window.location.href = "admin.php";
      return false;
    } else {
      errorMessage.textContent = "Invalid username or password. Please try again.";
      return false;
    }
  }
  