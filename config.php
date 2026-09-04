<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$db   = "lunar_lifestyle";

// Connect to MySQL
$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Create Database and Select it
$conn->query("CREATE DATABASE IF NOT EXISTS $db");
$conn->select_db($db);

// 1. Users Table
$conn->query("CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255)
)");

// 2. Admin Table
$conn->query("CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) UNIQUE,
    password VARCHAR(255)
)");
?>
