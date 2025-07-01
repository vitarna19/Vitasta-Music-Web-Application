<?php
session_start();
$_SESSION['loggedin'] = false;
$showError = false; 
if (isset($_POST['email']) && isset($_POST['password'])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "trip1";
    $con = mysqli_connect($server, $username, $password, $database);
    if (!$con) {
        echo "Connection to the database failed: " . mysqli_connect_error();
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `trip` WHERE `email` = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        if (password_verify($password, $hashed_password)) {
            $_SESSION['loggedin'] = true;
            echo '<script>
                    setTimeout(function() {
                        window.location.href = "home.html";
                    }, 2000);
                  </script>';
            exit; 
        } else {
            $showError = true; 
        }
    } else {
        $showError = true; 
    }

    $stmt->close();
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css" />
    <title>Login</title>
  </head>
  <body>
    
    <img class="bg" src="images/bge.jpg" alt="Music Background"> 
    <div class="container">
    <h1>Embrace the Rhythm of Your Heart</h1>
        <p>Login to your account and immerse yourself in a world of captivating melodies and soulful harmonies.</p>

        <?php
        if($showError){
            echo '<script>alert("Invalid email or password. Please try again.");</script>';
        }
        ?>

        <form action="login.php" method="post">
            <input type="email" name="email" id="email" placeholder="Enter your email"> 
            <input type="password" name="password" id="password" placeholder="Enter your password">
            <button class="btn">Login</button>
        </form>

        <p>Don't have an account? <a href="index.php" class="login-link">Click here to register</a></p>
        <div class="social-btn">
            <div class="social-icon"><i class="fa-brands fa-instagram"></i></i></div>
            <div class="social-icon"><i class="fa-brands fa-twitter"></i></i></div>
            <div class="social-icon"><i class="fa-brands fa-facebook"></i></i></div>
            <div class="social-icon"><i class="fa-brands fa-youtube"></i></i></div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/52e6bd4774.js" crossorigin="anonymous"></script>
</body>
</html>
