<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <script>
        function showPopup(message) {
            alert(message);
        }
    </script>
</head>
<body>
    <h2>Registration Form</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
        $username = "root"; // Change this to your MySQL username
        $password = ""; // Change this to your MySQL password
        $dbname = "db_sekolah7"; // Change this to your database name

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        $role = $_POST['role']; // Get the selected role

        if ($password !== $repassword) {
            echo "Error: Passwords do not match.";
        } else {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert data into the database
            $sql = "INSERT INTO user (username, email, password, role) VALUES ('$username', '$email', '$hashedPassword', '$role')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>showPopup('Registration successful!');</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        $conn->close();
    }
    ?>

    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        
        <label for="repassword">Reconfirm Password:</label>
        <input type="password" name="repassword" required><br><br>

        <label for="role">Choose Role:</label>
        <select name="role" required>
        <option value="">pilih disini:</option>
        <option value="operator">Operator</option>
        <option value="admin">Admin</option>
        </select><br><br>
        
        <input type="submit" value="Register">
    </form>
</body>
</html>
