<?php 
require_once 'db.php'; 
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Админка — Лапоухий дом</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="container admin-container">

    <div class="admin-header-flex">
        <h1>Управление питомцами</h1>
        <a href="admin_edit.php" class="btn-save" style="text-decoration: none;">+ Добавить питомца</a>
    </div>

    <table class="admin-table">
        <thead>
            <tr>
                <th>Фото</th>
                <th>Кличка</th>
                <th>Статус</th> <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            // Получаем всех питомцев
            $stmt = $pdo->query("SELECT * FROM pets ORDER BY id DESC");
            while ($row = $stmt->fetch()): 
            ?>
            <tr>
                <td>
                    <?php if($row['image_path']): ?>
                        <img src="<?= htmlspecialchars($row['image_path']) ?>" class="img-prev">
                    <?php else: ?>
                        <div class="img-prev" style="background: #eee; display: flex; align-items: center; justify-content: center; font-size: 10px;">Нет фото</div>
                    <?php endif; ?>
                </td>
                <td><strong><?= htmlspecialchars($row['name']) ?></strong></td>
                <td>
                    <?php if($row['status'] === 'available'): ?>
                        <span style="color: #27ae60; font-weight: bold;">🐾 Ищет дом</span>
                    <?php else: ?>
                        <span style="color: #e67e22; font-weight: bold;">🏥 В приюте</span>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="admin_edit.php?id=<?= $row['id'] ?>" class="btn-edit">Изменить</a>
                    <a href="admin_delete.php?id=<?= $row['id'] ?>" class="btn-delete" onclick="return confirm('Удалить этого хвостика?')">Удалить</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>
</html>