<?php
include('includes/header.php');
// Database connection
$host = 'localhost';
$dbname = 'blog';
$username = 'root';
$password = '';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle registration
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = ($_POST['password']);
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $bio = $_POST['bio'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (username, name, email, password, gender, dob, bio) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $username, $name, $email, $password, $gender, $dob, $bio);

    // Execute the statement
    if ($stmt->execute()) {
        
       // echo "<div class='success'>Registration successful!</div>";
       header('Location: login.php');
    } else {
        echo "<div class='error'>Error: " . $stmt->error . "</div>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="includes/style.css">
</head>

    <div class="container2">
        <h2>Register</h2>
        <form method="POST" action="register.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" required>
            </div>
            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea id="bio" name="bio" rows="3"></textarea>
            </div>
            <input type="submit" value="Register"><br><br>
            
            <button><a href="login.php">login here</a></button><br><br>

           
            
        </form>
    </div>

</html>

<?php include('includes/footer.html'); ?>
