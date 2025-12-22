<?php

$conn = new mysqli("localhost", "root", "", "database_name");
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات");
}


$limit = 20; 
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$offset = ($page - 1) * $limit;

$search = isset($_GET['search']) ? trim($_GET['search']) : '';

if ($search !== '') {
    $stmt = $conn->prepare("
        SELECT id, name, email
        FROM user
        WHERE name LIKE ?
        ORDER BY id
        LIMIT ? OFFSET ?
    ");
    $like = "%$search%";
    $stmt->bind_param("sii", $like, $limit, $offset);
} else {
    $stmt = $conn->prepare("
        SELECT id, name, email
        FROM user
        ORDER BY id
        LIMIT ? OFFSET ?
    ");
    $stmt->bind_param("ii", $limit, $offset);
}

$stmt->execute();
$result = $stmt->get_result();

if ($search !== '') {
    $stmt2 = $conn->prepare("
        SELECT COUNT(*) AS total
        FROM user
        WHERE name LIKE ?
    ");
    $stmt2->bind_param("s", $like);
} else {
    $stmt2 = $conn->prepare("
        SELECT COUNT(*) AS total
        FROM user
    ");
}

$stmt2->execute();
$total = $stmt2->get_result()->fetch_assoc()['total'];
$totalPages = ceil($total / $limit);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>المستخدمين</title>
</head>
<body>

<h2>قائمة المستخدمين</h2>


<form method="get">
    <input type="text" name="search" placeholder="ابحث بالاسم"
           value="<?= htmlspecialchars($search) ?>">
    <button type="submit">بحث</button>
</form>

<br>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>الاسم</th>
        <th>البريد</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
        </tr>
    <?php endwhile; ?>
</table>

<br>


<?php if ($totalPages > 1): ?>
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?= $i ?>&search=<?= urlencode($search) ?>">
            <?= $i ?>
        </a>
    <?php endfor; ?>
<?php endif; ?>

</body>
</html>
