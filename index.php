<?php
$insert = false;

if (isset($_POST['name'])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "trip1";

    $con = mysqli_connect($server, $username, $password, $database);

    if (!$con) {
        echo "Connection to this database failed due to " . mysqli_connect_error();
    }

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

    $query = "SELECT * FROM trip WHERE email = '$email'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('This email address is already registered. Please use a different email address.');</script>";
    } else {
        if ($password != $confirm_password) {
            echo "<script>alert('Passwords do not match!!!');</script>";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $con->prepare("INSERT INTO `trip` (`name`, `email`, `password`) VALUES (?,?,?)");
            $stmt->bind_param("sss", $name, $email, $hashed_password);
            if ($stmt->execute()) {
                $insert = true;
                echo "<p class='submitMsg'>Registration successful! You can now access the music library.</p>";
                header("Location: home.html");
                exit; 
            } else {
                echo "<script>alert('Error: " . $stmt->error . "');</script>";
            }
            $stmt->close();
        }
    }
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Library</title>
    <link rel="stylesheet" href="style1.css" />
</head>

<body>
    <img class="bg" src="images/bge.jpg" alt="Music Background"> 
    <div class="container">
    <h1>Unlock the Melodies of Your Soul</h1>
        <p>Register now and embark on a symphonic journey where every note tells a story, and every rhythm sets your spirit free.</p>

        <form action="index.php" method="post" id="registrationForm">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="password" name="password" id="password" placeholder="Enter your password">
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm your password">
            <button class="btn">Register</button>
        </form>

        <p>Already have an account? <a href="login.php" class="login-link">Click here to login</a></p>
        <div class="social-btn">
            <div class="social-icon"><i class="fa-brands fa-instagram"></i></i></div>
            <div class="social-icon"><i class="fa-brands fa-twitter"></i></i></div>
            <div class="social-icon"><i class="fa-brands fa-facebook"></i></i></div>
            <div class="social-icon"><i class="fa-brands fa-youtube"></i></i></div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/52e6bd4774.js" crossorigin="anonymous"></script>
    <script src="script1.js"></script>
</body>
</html> 