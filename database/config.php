<?php

$db = mysqli_connect('localhost', 'root', '', 'musily');

$error = array();

// Uploads files
if (isset($_POST['upload'])) { // if submit button in the form is clicked

    // Call Global variables
    global $db, $error;

    // Fetch data from FORM
    $title = $_POST['title'];
    $album = $_POST['album'];
    $artist = $_POST['artist'];
    $lyrics1 = $_POST['lyrics'];

    // Fetch the line breaker and simbolics
    $lyrics = nl2br(htmlentities($lyrics1, ENT_QUOTES, 'UTF-8'));

    // Name of the uploaded file
    $filename1 = $_FILES['image']['name'];
    $filename2 = $_FILES['audio']['name'];

    // Destination of the file on the server
    $destination1 = '../upload/images/' . $filename1;
    $destination2 = '../upload/audios/' . $filename2;

    // Get the file extension
    $extension1 = pathinfo($filename1, PATHINFO_EXTENSION);
    $extension2 = pathinfo($filename2, PATHINFO_EXTENSION);

    // The physical file on a temporary uploads directory on the server
    $file1 = $_FILES['image']['tmp_name'];
    $size1 = $_FILES['image']['size'];
    $file2 = $_FILES['audio']['tmp_name'];
    $size2 = $_FILES['audio']['size'];

    // Check the extention file for image
    if (!in_array($extension1, ['png', 'jpg', 'jpeg'])) {
        array_push($errors,  "You file extension must be .png, or .jpg");
    } elseif ($_FILES['image']['size'] > 5250000) { // file shouldn't be larger than 5 Megabyte
        array_push($errors, "File too large!");
    }

    // Check the extention file for audio
    if (!in_array($extension2, ['mp3', 'm4a'])) {
        array_push($errors,  "You file extension must be .MP3, or .M4A");
    } else if ($_FILES['audio']['size'] > 15800000) { // file shouldn't be larger than 15 Megabyte
        array_push($errors, "File too large!");
    }

    if (count($error) == 0) {
        // Move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file1, $destination1)) {
            if (move_uploaded_file($file2, $destination2)) {
                $sql = "INSERT INTO music (title, album, artist, lyrics, image, audio) VALUES ('$title','$album','$artist','$lyrics','$filename1', '$filename2')";
                $result = mysqli_query($db, $sql);

                header("refresh:0; url=./upload.php");
                echo "<script type='text/javascript'>alert('The new song has been successfully uploaded!')</script>";
            }
        } else {
            header("refresh:100; url=./upload.php");
            echo "<script type='text/javascript'>alert('Some error has been occured, please try again!')</script>";
        }
    }
}
