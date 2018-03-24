<?php
    require("config.php");
    $conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
    mysqli_set_charset($conn, "utf8");
    $uploads_dir = './uploads'; 
    $allowed_ext = array('jpg','jpeg','PNG','gif','GIF','JPG','JPEG','png');
    $desc = $_POST['desc'];

    // 변수 정리
    $error = $_FILES['file']['error'];
    $name = $_FILES['file']['name'];
    $ext = array_pop(explode('.', $name));
    if( !in_array($ext, $allowed_ext) ) {
        echo "허용되지 않는 확장자입니다.";
        exit;
    }
    move_uploaded_file( $_FILES['file']['tmp_name'], "$uploads_dir/$name");
    $sql = "INSERT into `file` (`name`, `desc`) VALUES('$name', '$desc')";
    mysqli_query($conn, $sql);
    header('Location: donate.php');
?>