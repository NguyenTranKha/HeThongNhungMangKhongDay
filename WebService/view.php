<?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "ENVIRONMENT";
                                $ArrNhietDo;
                                $ArrDoAm;
                                $ArrKhiGas;
                                $Arrtime;
                                $t = 0;

                                // Create connection
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                // Check connection
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                $sql = "SELECT thoigian, nhietdo, doam, co FROM ESP8266 WHERE (SELECT MAX(thoigian) FROM ESP8266) = thoigian;";

                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while(
                                        $row = $result->fetch_assoc()) {
                                        $nhietdo = $row["nhietdo"];
                                        $doam = $row["doam"];
                                        $khigas = $row["co"];
                                    }
                                } else {
                                    echo "0 results";
                                }

                                $sql = "SELECT thoigian, nhietdo, doam, co FROM ESP8266";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while(
                                        $row = $result->fetch_assoc()) {
                                        $ArrNhietDo[$t] = $row["nhietdo"];
                                        $ArrDoAm[$t] = $row["doam"];
                                        $ArrKhiGas[$t] = $row["co"];
                                        $Arrtime[$t] = $row["thoigian"];
                                        $t = $t + 1;
                                    }
                                } else {
                                    echo "0 results";
                                }
                                $conn->close();
                        ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GREEN HOME</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
        <title>Chart.js demo</title>
        
        
        
</head>
<style>
* {
    box-sizing: border-box;
}

body {
    font-family: Arial, Helvetica, sans-serif;
    margin: auto;
}

/* Style the header */
header {
    background-color: #4CAF50;
    padding: 30px;
    font-size: 30px;
    color: white;
    font-weight: 500px;
}

/* Container for flexboxes */
section{
    display: -webkit-flex;
    display: flex;
    margin-top: 10px;
}

#nv1{background-color: #f1f1f1;}

#khung{
    -moz-border-radius-topright:20px;
    -webkit-border-top-right-radius:20px;

    -moz-border-radius-bottomleft:20px;
    -webkit-border-bottom-left-radius:20px;
    background-color: #f1f1f1;
}

#thanhvien{
    background: #4CAF50;
    color: white;
    margin-left: 30px;
    -moz-border-radius: 20px;
    -webkit-border-radius: 20px;

}

/* Style the navigation menu */ 
nav {
    flex: 1;
    background: white;
    padding: 20px;
    text-align: left;
}

/* Style the list inside the menu */
nav ul {
    list-style-type: none;
    padding: 0;
}

/* Style the content */
article {
    -webkit-flex: 3;
    -ms-flex: 3;
    flex: 3;
    background-color: white;
    padding: 10px;
    text-align: Left;
    margin-right: 30px;
}

/* Style the footer */
footer {
    background-color: #4CAF50;
    padding: 10px;
    text-align: center;
    color: white;
    position: absolute;
    right: 0;
    bottom: 0;
    left: 0;
}

.Logo{
    float: left;
    font-style: Georgia, serif;
    text-align: Left;
    text-shadow: 5px 3px green;
}

.Til{
    text-align: right;
    font-style: italic;  
    text-shadow: 5px 3px green; 
}

.text{
    margin-bottom: 5px;

}

.boder{
    
}

.texthead{
    text-align: center;
    font-size: 30px;
    font-weight: 10px;
    font-style: italic;
    margin-bottom: 10px;
    color: #4CAF50
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 500px;
}

button:hover {
    opacity: 0.8;
}

</style>
<body>
    <header>
        <div class="Logo">
            <b>UIT</b>
        </div>
        <div class="Til">
            <b class="Til">THỐNG KÊ SỐ LIỆU MÔI TRƯỜNG</b>
        </div>  
    </header>
    <div class = "boder">
        <section>
            <article id = thanhvien>
                <u>
                    <h3 class = "text">Thành Viên</h3>
                </u>
                <div class="text">Nguyễn Trần Kha</div>
                <div class="text">Phan Văn Phú</div>
                <div class="text">Nguyễn Tuấn Khôi</div>
            </article>

            <article id = khung>
                <b>
                    <div class="texthead">Nhiệt Độ</div>
                </b>
                    <div class="texthead">
                        <?php echo $nhietdo?> &#8451;
                    </div>
            </article>

            <article id = khung>
                <b>
                    <div class="texthead">Độ Ẩm</div>
                </b>
                    <div class="texthead"><?php echo $doam?>%</div>
            </article>

            <article id = khung>
                <b>
                    <div class="texthead">Nồng Độ khí CO</div>
                </b>
                    <div class="texthead"><?php echo $khigas?>%</div>
            </article>

        </section>
        <section>
            <nav>
                    <h3 class = "text">Dự Báo</h3>
                    <div class = "text">
                        Trời nóng ẩm mưa nhiều đôi lúc có mưa nhưng rất ít, khá khô và ẩm chiều mưa có mưa hoặc không hoặc vừa mưa vừa không, bla, bla,..
                    </div>
                    
            </nav>

            <article>
                    <div class ="texthead">
                        BIỂU ĐỒ HIỆN TẠI
                    </div>
                    <div>
                        <script src='Chart.min.js'> </script>
                        <canvas id="income" width="1000" height="200"></canvas>
                        <script>
                       // bar chart data
                            var barData = {
                            labels : ["<?php echo $Arrtime[$t-2]; ?>","<?php echo $Arrtime[$t-3]; ?>","<?php echo $Arrtime[$t-4]; ?>","<?php echo $Arrtime[$t-5]; ?>"],
                                datasets : [
                                    {
                                        fillColor : "#48A497",
                                        strokeColor : "#48A4D1",
                                        data : [<?php echo $ArrNhietDo[$t-2]; ?>,<?php echo $ArrNhietDo[$t-3]; ?>,<?php echo $ArrNhietDo[$t-4]; ?>,<?php echo $ArrNhietDo[$t-5]; ?>]
                                    },
                                    {
                                        fillColor : "rgba(73,188,170,0.4)",
                                        strokeColor : "rgba(72,174,209,0.4)",
                                        data : [<?php echo $ArrDoAm[$t-2]; ?>,<?php echo $ArrDoAm[$t-3]; ?>,<?php echo $ArrDoAm[$t-4]; ?>,<?php echo $ArrDoAm[$t-5]; ?>]
                                    },
                                    {
                                        fillColor : "rgba(70,128,107,0.3)",
                                        strokeColor : "rgba(12,14,29,0.4)",
                                        data : [<?php echo $ArrKhiGas[$t-2]; ?>,<?php echo $ArrKhiGas[$t-3]; ?>,<?php echo $ArrKhiGas[$t-4]; ?>,<?php echo $ArrKhiGas[$t-5]; ?>]
                                    }
                                    ]
                                }
                            // get bar chart canvas
                            var income = document.getElementById("income").getContext("2d");
                        
                            // draw bar chart
                            new Chart(income).Bar(barData);
                        </script>
                    </div>
                    <div style="background-color:#48A497; weight = 20dp; height = 20dp;">
                        
                    </div>
                    
            </article>
        </section>
    </div>
    <footer>
        ĐỒ ÁN HỆ THỐNG NHÚNG VÀ MẠNG KHÔNG DÂY
    </footer>
</body>
</html>