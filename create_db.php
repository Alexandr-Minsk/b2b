<?php

require_once ('ConnectionDB.php');

$conn = new mysqli(ConnectionDB::$server_name, ConnectionDB::$user, ConnectionDB::$password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DROP DATABASE IF EXISTS ".ConnectionDB::$db_name;
if ($conn->query($sql) === TRUE) {
    error_log("Database Dropped successfully");
} else {
    error_log("Error creating database: " . $conn->error);
}

$sql = "CREATE DATABASE IF NOT EXISTS ".ConnectionDB::$db_name." COLLATE utf8mb4_general_ci	" ;
if ($conn->query($sql) === TRUE) {
    error_log("Database created successfully");
} else {
    error_log("Error creating database: " . $conn->error);
}