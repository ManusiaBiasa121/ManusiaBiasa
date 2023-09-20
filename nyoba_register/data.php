<!DOCTYPE html>
<html>
<head>
    <title>Registered Users</title>
</head>
<body>
    <h2>Registered Users</h2>

    <?php
    // Database connection details
    $servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
    $username = "root"; // Change this to your MySQL username
    $password = ""; // Change this to your MySQL password
    $dbname = "db_sekolah7"; // Change this to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch registered users data
    $sql = "SELECT id, username, email, role FROM user";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th> <!-- Add the role header -->
                </tr>";

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["username"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["role"] . "</td> <!-- Display the role -->
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No registered users.";
    }

    $conn->close();
    ?>

</body>
</html>
