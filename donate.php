<?php
    require("config.php");
    $conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
    mysqli_set_charset($conn, "utf8");
    $sql = "SELECT CURDATE()";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $curdate = $row['CURDATE()'];
    $limitdate = '2019-01-11'; 
    $sql = "SELECT TO_DAYS('$limitdate') - TO_DAYS('$curdate' ) AS CHA";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
?>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" href="test.css" />
        <script src="main.js"></script>
    </head>
    <body>
        <div class="dark-overay">
            <p class="donate-title">정재웅 선생님과의 추억이 담긴 사진을 공유하세요!</p>
            <p class="dayleft">D-<?=$row['CHA'];?></p>
            <hr class="chr">
            <div class="donate-description-div">
                <p class="description">사진은 D-1일째 되는 날 모두 확인이 가능하며 그 전에는 관리자를 제외한 그 어느 누구도 사진을 열람할 수 없습니다.</p>
            </div>
            <div class="donate-file-div">
                <form enctype='multipart/form-data' action="donate-process.php" method="POST">
                    <input type="file" class="file-input" name="file">
                    <div style="width : 100%;">
                        <input type="text" class="file-name" placeholder="사진에 대한 한줄 설명을 적어주세요" name="desc">
                        <button type="submit" class="file-submit">기부!</button>
                    </div>
                </form>
            </div>
            <p class="gotomain" onclick="location.href='index.php'">메인으로</p>
            <p style="color : white; font-size : 20px; text-align : center; cursor : default;">CRJW X CCOMET</p>
        </div>
        <!--<embed name="GoodEnough" src="music/goodbye.mp3" loop="true" hidden="true" autostart="true">-->
    </body>
</html>