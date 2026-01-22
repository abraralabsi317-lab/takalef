<?php
session_start();

$host = 'localhost';
$dbname = 'samah_aa';
$user = 'root';
$pass = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    echo "✅ تم الاتصال بقاعدة البيانات بنجاح<br>";
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
