<?php
require_once 'db.php';
if (isset($_GET['id'])) {
    $pdo->prepare("DELETE FROM pets WHERE id = ?")->execute([$_GET['id']]);
}
header("Location: admin.php");