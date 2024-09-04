<?php
// Database connection
include 'dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $boat_id = $_POST['boat_id'];
    $check_in = $_POST['check_in'];
    $time_from = $_POST['time_from'];
    $time_to = $_POST['time_to'];
    $guests = $_POST['guests'];

    $sql = "INSERT INTO reservations (boat, check_in, time_from, time_to, guests) VALUES (?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssss", $boat_id, $check_in, $time_from, $time_to, $guests);

    if ($stmt->execute()) {
        echo "Reservation successfully created.";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
