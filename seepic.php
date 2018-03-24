<?php
    require("config.php");
    $conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
    mysqli_set_charset($conn, "utf8");
    $sql = "SELECT MAX(`id`) from `file`";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $maxKey = $row['MAX(`id`)'];
?>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" href="seepic.css" />
        <script src="main.js"></script>
    </head>
    <body>
        <p class="donate-title">정재웅 선생님과의 추억이 담긴 사진들..</p>
        <div class="seepic-description-div">
            <p class="description">이때까지 기부해 주신 모든 사진들이 모두가 볼 수 있도록 공유됩니다.</p>
        </div>
        <div class="donate-div">
            <?php
            for($i=1;$i<=$maxKey;$i++){
               /* $sql = "SELECT * from `file` WHERE id=$i";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $name = $row['name'];*/
                echo "<div class='imgdiv'>";
                //echo "<img src='uploads/$name' alt='img' class='images'>";
                echo "</div>";
            }
            ?>
        </div>
        <!--<embed name="GoodEnough" src="music/goodbye.mp3" loop="true" hidden="true" autostart="true">-->
    </body>
</html>