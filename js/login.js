function validateLogin() {
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const errorMessage = document.getElementById("error-message");
  
    // Replace the example username and password with the correct ones
    const correctUsername = "woicina";
    const correctPassword = "cindonibos";
  
    if (username === correctUsername && password === correctPassword) {
      // Redirect to the success page
      window.location.href = "success.html";
      return false;
    } else {
      errorMessage.textContent = "Invalid username or password. Please try again.";
      return false;
    }
  }
  