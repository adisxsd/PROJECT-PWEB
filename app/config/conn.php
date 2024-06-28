<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "homeofshoe";
session_start();
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}
$base_url = "PROJECT PWEB";
?>