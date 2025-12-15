<?php
$host = "localhost";
$username = "abrar";
$password = "a261433";
$dbname = "aa";

$conn = new mysqli($host, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال ❌: " . $conn->connect_error);
}

echo "تم الاتصال بقاعدة البيانات بنجاح ✅";
?>
