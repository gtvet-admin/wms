<?php

    //Declare Variable
    $servername = "localhost";
    $username = "gtvet-flexi-mou";
    $password = "GTVET@2022";
    $dbname = "gtvet-flexi-mou";

    // Connect to MySQL
    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
