<?php
// Database connection
$conn = mysqli_connect("localhost","root","","ChatAppProj");

if (!$conn) {
    echo "Database connection failed..." . mysqli_connect_error();
}

?>