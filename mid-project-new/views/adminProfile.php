<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //echo "running...";

    $targetDir = "../assets/";
    $fileName = basename($_FILES["myfile"]["name"]);
    $targetFilePath = $targetDir . $fileName;


    if (!empty($_FILES["myfile"]["name"])) {
        //echo "File not empty!";
        move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetFilePath);
        $_SESSION['profile'] = $_FILES['myfile']['name'];
        //$_SESSION['profile'] = "something";
        //echo "File name:".$_SESSION['profile'];
        //header('location: ../views/doctorProfile.php');
    } else {
        echo "InValid file type";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Profile</title>
</head>

<body>
    <form>
        <center>
            <h2>Manage Profile</h2>
            <table cellspacing="2" bgcolor="#000000">
                <tr bgcolor="#ffffff">
                    <th>Name</th>
                    <th>ID</th>
                    <th>Password</th>
                    <th>field</th>
                    <th>Picture</th>
                </tr>
                <tr bgcolor="#ffffff">
                    <td>XYZ</td>
                    <td>SA3421</td>
                    <td><a href="../controller/changePassword.php">Edit Password</a></td>
                    <td >ADMIN</td>
                    <td>
                        <form method="POST" action="../controller/fileCheck.php" enctype="multipart/form-data">
                           Select image to upload:
                          <input type="file" name="fileToUpload" id="fileToUpload">
                          <img src="../assets/admin.png" width="150px" height="150px">
                          <input type="submit" value="Upload Image" name="submit">
                        </form>
                    </td>
                </tr><br>
        </center>
        </table><br><br>


        <h4><a href=" ../views/adminHome.html">Go Back to Dashboard</a></h4><br><br>
    </form>
    <footer>
        <h4 align="center">All Copyright to University HUB</h4>
    </footer>
</body>
</htmlupload>