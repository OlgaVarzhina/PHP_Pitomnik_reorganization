<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


require_once 'db.php';


if (!isset($_GET['id']) || empty($_GET['id'])) {
    exit("Ошибка: ID питомца не указан.");
}

$id = (int)$_GET['id'];

try {

    $sql = "SELECT p.*, b.name as breed_name, s.name as species_name 
            FROM pets p 
            LEFT JOIN breeds b ON p.breed_id = b.id 
            LEFT JOIN species s ON b.species_id = s.id 
            WHERE p.id = :id";
            
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $pet = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$pet) {
        exit("Питомец с ID $id не найден в базе данных.");
    }
} catch (PDOException $e) {
    exit("Ошибка БД: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pet['name']) ?> — Лапоухий дом</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<header class="main-header">
    <div class="container header-content">
        <a href="index.php" class="logo">
            <span class="logo-icon">🐾</span>
            <span class="logo-text">Лапоухий дом</span>
        </a>
        <nav class="main-nav">
            <a href="index.php">Каталог</a>
            <a href="stories.php">Истории</a>
            <a href="contacts.php">Контакты</a>
            <a href="adopt.php" class="btn-donate">Взять друга</a>
        </nav>
    </div>
</header>

<div class="pet-detail-wrapper">
    <div class="container">
        <a href="index.php" class="back-link">← Вернуться к списку</a>

        <article class="pet-detail-card">
            <div class="pet-detail-image">
                <img src="<?= htmlspecialchars($pet['image_path'] ?: 'images/no-photo.jpg') ?>" alt="">
                <div class="pet-status-badge">
                    <?= ($pet['status'] === 'available') ? '🐾 Ищет семью' : '🏥 На лечении' ?>
                </div>
            </div>

            <div class="pet-detail-info">
                <header class="detail-header">
                    <span class="species-tag"><?= htmlspecialchars($pet['species_name']) ?></span>
                    <h1><?= htmlspecialchars($pet['name']) ?></h1>
                    <p class="breed-text"><?= htmlspecialchars($pet['breed_name']) ?></p>
                </header>

                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-icon">🎂</div>
                        <div class="stat-content">
                            <span class="stat-label">Возраст</span>
                            <span class="stat-value"><?= (int)$pet['age'] ?> г.</span>
                        </div>
                    </div>
                </div>

                <div class="full-description">
                    <h3>История</h3>
                    <p><?= nl2br(htmlspecialchars($pet['description'])) ?></p>
                </div>

                <div class="detail-actions">
                    <button class="btn-cta" onclick="alert('Заявка отправлена!')">Стать семьей</button>
                </div>
            </div>
        </article>
    </div>
</div>

</body>
</html>