<?php 
 session_start();
if($_POST) {
    // database connection
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'studentenhaus';
 
    $conn = mysqli_connect($server, $username, $password, $dbname);
 
    // check db connection
    if($conn->connect_error) {
        die("Connection Failed : " . $conn->connect_error);
    } 
    else {
        // echo "Successfully Connected";
    }
 
    $userid = $_SESSION['student_id'];
    $title = $_POST['title'];
 
    $uploaddir = 'images/';
    $filename = rand(1000,10000)."-".$_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    $targetfile = $uploaddir.$filename;

    $fileext = pathinfo($targetfile, PATHINFO_EXTENSION);
    $filesize = $_FILES["file"]['size'];
 
    if ($filesize>3000000) {
        echo 'Max 3MB';
        $error = 1;
    } else {
        $error = 0;
    }

    if ($error == 0) {
        if(move_uploaded_file($tempname, $targetfile)) {
            $sql = "INSERT into fileup(student_id,title,image) VALUES('$userid','$title','$filename')";
            if($conn->query($sql) === TRUE) {
                $valid['success'] = true;
                $valid['messages'] = "Successfully Uploaded";
            } 
            else {
                $valid['success'] = false;
                $valid['messages'] = "Error while uploading";
            }

            $conn->close();

        }
        else {
            $valid['success'] = false;
            $valid['messages'] = "Error while uploading";
        }
    }
    echo json_encode($valid);
}


        // upload the file 
