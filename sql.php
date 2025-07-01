<?php  
error_reporting(E_ALL);
ini_set('display_errors', 1);

$insert = false;
$update = false;
$delete = false;

$servername = "localhost";
$username = "root";
$password = "";
$database = "music1";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `album` WHERE `sno` = $sno";
    $result = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['music_name'])) {

        $music_name = $_POST["music_name"];

        $sql_select = "SELECT `filepath`, `coverpath` FROM `music` WHERE `music_name` = '$music_name'";
        $result_select = mysqli_query($conn, $sql_select);

        $row = mysqli_fetch_assoc($result_select);

        $filepath = $row['filepath'];
        $coverpath = $row['coverpath'];

        $check_query = "SELECT * FROM `album` WHERE `music_name` = '$music_name'";
        $check_result = mysqli_query($conn, $check_query);
        
        if (mysqli_num_rows($check_result) > 0) {
            echo "This song is already in the album.";
        } else {

            $insert_query = "INSERT INTO `album` (`music_name`, `filepath`, `coverpath`) 
                            VALUES ('$music_name', '$filepath', '$coverpath')";
            $insert_result = mysqli_query($conn, $insert_query);
            
            if ($insert_result) {
                $insert = true;
            } else {
                echo "Error adding song: " . mysqli_error($conn);
            }
        }
    }

    if (isset($_POST['snoEdit']) && isset($_POST['music_nameEdit']) && isset($_POST['filepathEdit'])) {
        // Update the record
        $sno = $_POST["snoEdit"];
        $music_name = $_POST["music_nameEdit"];
        $filepath = $_POST["filepathEdit"];
        $coverpath = $_POST["coverpathEdit"];

        $sql = "UPDATE `album` SET `music_name` = '$music_name' , `filepath` = '$filepath', `coverpath` = '$coverpath' WHERE `album`.`sno` = $sno";
        $result = mysqli_query($conn, $sql);
        if($result){
            $update = true;
        } else {
            echo "We could not update the record successfully";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch Details</title>
    <link rel="stylesheet" href="style2.css" />
</head>
<body>
<?php
    if($insert){
        echo "<div><strong>Success!</strong> Your music details have been inserted successfully</div>";
    }
    ?>
    <?php
    if($delete){
        echo "<div><strong>Success!</strong> Your music details have been deleted successfully</div>";
    }
    ?>
    <?php
    if($update){
        echo "<div><strong>Success!</strong> Your music details have been updated successfully</div>";
    }
    ?>

    <nav>
        <ul>
        <li class="brand"><img src="images/music.jpg" alt="Music library - Vitasta"> Vitasta </li>
            <li><a href="home.html">Home</a></li>
            <li><a href="sql.php">Album</a></li>
            <li><a href="artist.html">Artist</a></li>
            <li><a href="help.html">Help</a></li>
            <li><a href="about.html">About</a></li>
        </ul>
    </nav>

    <!-- Update popup -->
    <div id="updatePopup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closeUpdatePopup()">&times;</span>
            <h2>Edit Song Details</h2>
            <form id="updateForm" action="sql.php" method="POST">
                <input type="hidden" name="snoEdit" id="snoEdit">
                <label for="music_nameEdit">Music Name:</label>
                <input type="text" id="music_nameEdit" name="music_nameEdit"><br><br>
                <label for="filepathEdit">Filepath:</label>
                <input type="text" id="filepathEdit" name="filepathEdit"><br><br>
                <label for="coverpathEdit">Coverpath:</label>
                <input type="text" id="coverpathEdit" name="coverpathEdit"><br><br>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
    <div class="container my-4">
        <h2>Let's Jam! Add or Edit Your Favorite Tunes on Vitasta</h2>
        <form action="sql.php" method="POST">
            <label for="music_name">Music Name:</label>
            <select name="music_name" id="music_name">
                <?php
                $sql = "SELECT `music_name` FROM `music`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row["music_name"] . "'>" . $row["music_name"] . "</option>";
                }
                ?>
            </select>
            <br><br>
            <input type="hidden" name="filepath" id="filepath">
            <input type="hidden" name="coverpath" id="coverpath">
            <button type="submit" class=".submitBtn">Add Song</button>
        </form>
    </div>

    <div class="container my-4" id="content ">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col" style="background-color: rgba(22, 0, 34, 0.7); color: white;">S.no</th>
                    <th scope="col" style="background-color: rgba(22, 0, 34, 0.7); color: white;">Music_Name</th>
                    <th scope="col" style="background-color: rgba(22, 0, 34, 0.7); color: white;">Filepath</th>
                    <th scope="col" style="background-color: rgba(22, 0, 34, 0.7); color: white;">Coverpath</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sql = "SELECT * FROM `album`";
                $result = mysqli_query($conn, $sql);
                $sno = 0;
                while($row = mysqli_fetch_assoc($result)){
                    $sno = $sno + 1;
                    echo "<tr>
                    <th scope='row' style='background-color: rgba(22, 0, 34, 0.7); color: white;'>". $sno . "</th>
                            <td>". $row['music_name'] . "</td>
                            <td>". $row['filepath'] . "</td>
                            <td>". $row['coverpath'] . "</td>
                            <td> 
                                <button class='edit btn btn-sm btn-primary' id='".$row['sno']."' onclick='editSong(".$row['sno'].")'>Update</button> 
                                <a href='sql.php?delete=".$row['sno']."' class='btn btn-sm btn-primary delete-btn'>Delete</a>
                            </td>
                        </tr>";
                } 
                ?>
            </tbody>
        </table>
    </div>

    <hr> 
    
    <script>
        function editSong(sno) {
            document.getElementById("snoEdit").value = sno;
            document.getElementById("updatePopup").style.display = "block";
        }
        function closeUpdatePopup() {
            document.getElementById("updatePopup").style.display = "none";
        }
    </script>
</body>
</html>