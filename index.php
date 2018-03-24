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
        <script>
            function gotodonate(){
                location.href='donate.php';
            }
            function gotosee(){
                location.href=' seepic.html';
            }
        </script>
    </head> 
    <body>
        <div class="dark-overay">
            <p class="title">안녕은 영원한 헤어짐은 아니겠지요</p>
            <p class="dayleft">D-<?=$row['CHA'];?></p>
            <hr class="chr">
            <div class="buttondiv">
                <?php
                if($row['CHA']>1){
                    echo "<div class='donate' onclick='gotodonate()'>";
                }
                else{
                    echo "<div class='donate' onclick='gotosee()'>";
                }
                ?>
                    <div class="outer">
                        <div class="inner">
                        <?php
                        if($row['CHA']>1){
                            echo "<p><strong>사진 기부</strong></p>";
                        }
                        else{
                            echo "<p><strong>사진 보기</strong></p>";
                        }
                        ?>
                        </div>
                    </div>
                </div>
                <div class="inform" onclick="location.href='inform.html'">
                    <div class="outer">
                        <div class="inner">
                            <p>우리 재웅쌤은요...</p>
                        </div>
                    </div>   
                </div>
            </div>
            <p style="color : white; font-size : 20px; text-align : center; cursor : default;">CRJW X CCOMET</p>
        </div>
        <!--<embed name="GoodEnough" src="music/goodbye.mp3" loop="true" hidden="true" autostart="true">-->
    </body>
</html>