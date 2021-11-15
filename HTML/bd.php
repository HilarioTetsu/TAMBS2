<?php

try {
    $conn=mysqli_connect("localhost","root","","tambs_db");
} catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
}


?>