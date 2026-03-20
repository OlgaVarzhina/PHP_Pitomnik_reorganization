<?php
require_once 'db.php';

$pet = [
    'id' => '',
    'name' => '',
    'age' => '',
    'description' => '',
    'breed_id' => 1,
    'status' => 'available',
    'image_path' => ''
];

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$breeds_stmt = $pdo->query("SELECT b.id, b.name as breed_name, s.name as species_name 
                            FROM breeds b 
                            JOIN species s ON b.species_id = s.id 
                            ORDER BY s.name, b.name");
$breeds = $breeds_stmt->fetchAll();

if ($id > 0) {
    $stmt = $pdo->prepare("SELECT * FROM pets WHERE id = ?");
    $stmt->execute([$id]);
    $db_pet = $stmt->fetch();
    if ($db_pet) {
        $pet = $db_pet;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $age = $_POST['age'] ?? 0;
    $desc = $_POST['description'] ?? '';
    $status = $_POST['status'] ?? 'available';
    $breed_id = $_POST['breed_id'] ?? 1;
    $img_path = $_POST['old_img'] ?? ''; 

    if (!empty($_FILES['photo']['name'])) {
        $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
        $newName = 'pet_' . time() . '.' . $ext;
        $target = 'images/pets/' . $newName;
        if (!is_dir('images/pets/')) mkdir('images/pets/', 0777, true);
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
            $img_path = $target;
        }
    }

    if ($id > 0) {
        $sql = "UPDATE pets SET name=?, age=?, description=?, status=?, image_path=?, breed_id=? WHERE id=?";
        $pdo->prepare($sql)->execute([$name, $age, $desc, $status, $img_path, $breed_id, $id]);
    } else {
        $sql = "INSERT INTO pets (name, age, description, status, image_path, breed_id) VALUES (?, ?, ?, ?, ?, ?)";
        $pdo->prepare($sql)->execute([$name, $age, $desc, $status, $img_path, $breed_id]);
    }
    header("Location: admin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Управление питомцем</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="container admin-container">

    <div class="admin-form-card">
        <h2><?= $id > 0 ? '📝 Редактировать' : '✨ Добавить' ?> питомца</h2>
        
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="old_img" value="<?= htmlspecialchars($pet['image_path']) ?>">

            <div class="form-group">
                <label>Кличка</label>
                <input type="text" name="name" value="<?= htmlspecialchars($pet['name']) ?>" required>
            </div>

            <div class="form-group">
                <label>Порода и вид</label>
                <select name="breed_id" required>
                    <?php foreach ($breeds as $breed): ?>
                        <option value="<?= $breed['id'] ?>" <?= ($breed['id'] == $pet['breed_id']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($breed['species_name']) ?> — <?= htmlspecialchars($breed['breed_name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Статус</label>
                <select name="status">
                    <option value="available" <?= ($pet['status'] == 'available') ? 'selected' : '' ?>>Ищет дом</option>
                    <option value="unavailable" <?= ($pet['status'] == 'unavailable') ? 'selected' : '' ?>>В приюте</option>
                </select>
            </div>

            <div class="form-group">
                <label>Возраст</label>
                <input type="number" name="age" value="<?= htmlspecialchars($pet['age']) ?>">
            </div>

            <div class="form-group">
                <label>Описание</label>
                <textarea name="description"><?= htmlspecialchars($pet['description']) ?></textarea>
            </div>

            <div class="form-group">
                <label>Фотография</label>
                <input type="file" name="photo" accept="image/*">
                <?php if(!empty($pet['image_path'])): ?>
                    <img src="<?= htmlspecialchars($pet['image_path']) ?>" class="img-edit-preview">
                <?php endif; ?>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-save">Сохранить</button>
                <a href="admin.php" class="link-cancel">Отмена</a>
            </div>
        </form>
    </div>

</body>
</html>