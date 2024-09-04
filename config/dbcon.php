<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "serene";

    // $host = "localhost";
    // $username = "amzpnvbe_sereneYachts";
    // $password = "nT@S8miEYQUr6db";
    // $database = "amzpnvbe_sereneYachts";

    // Creating database connection
    $con = mysqli_connect($host, $username, $password, $database);

    // Checking Database connection
    if(!$con)
    {
        die("Connection Failed: ".mysqli_connect_error());
    }


?>