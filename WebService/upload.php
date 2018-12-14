<?php
    $nhietdo = $_POST['nhietdo'];
    $doam = $_POST['doam'];
    $co = $_POST['co'];
    $date = new Datetime();
    echo $date->format('Y-m-d H:i:s') . "\n";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ENVIRONMENT";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    

    $sql = "INSERT INTO `esp8266` (`thoigian`, `nhietdo`, `doam`, `co`) VALUES (CURRENT_TIMESTAMP, $nhietdo, $doam, $co);";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>