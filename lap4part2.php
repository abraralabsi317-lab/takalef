<?php
session_start();


$conn = new mysqli("localhost", "root", "", "test_db");
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات");
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email']   = $user['email'];
            $message = "✅ تم تسجيل الدخول بنجاح";
        } else {
            $message = "❌ كلمة المرور غير صحيحة";
        }
    } else {
        $message = "❌ البريد الإلكتروني غير موجود";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول</title>
</head>
<body>

<h2>تسجيل الدخول</h2>

<?php if ($message != "") echo "<p>$message</p>"; ?>

<form method="POST">
    <label>البريد الإلكتروني:</label><br>
    <input type="email" name="email" required><br><br>

    <label>كلمة المرور:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">دخول</button>
</form>

</body>
</html>






/***** هذول الي بنضيفهم في قاعده البيانات*****/

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100),
    password VARCHAR(255)
);


INSERT INTO users (email, password)
VALUES (
 'test@gmail.com',
 '$2y$10$exampleHashedPasswordHere'
);
