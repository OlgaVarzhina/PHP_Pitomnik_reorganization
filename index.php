<?php

require_once 'db.php'; 


try {

    $sql = "SELECT 
                p.id, 
                p.name, 
                p.age, 
                p.status, 
                p.description, 
                p.image_path,
                b.name as breed_name, 
                s.name as species_name 
            FROM pets p
            LEFT JOIN breeds b ON p.breed_id = b.id
            LEFT JOIN species s ON b.species_id = s.id
            ORDER BY p.id DESC";

    $stmt = $pdo->query($sql);
    $pets = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {

    $pets = [];
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Каталог питомцев</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <header class="main-header">
    <div class="container header-content">
        <a href="/" class="logo">
            <span class="logo-icon">🐾</span>
            <span class="logo-text">Лапоухий дом</span>
        </a>
        <nav class="main-nav">
            <a href="/">Каталог</a>
            <a href="stories.php">Истории</a>
            <a href="contacts.php">Контакты</a>
            <a href="adopt.php" class="btn-nav-cta">Взять друга</a>
        </nav>
    </div>
</header>
    <section class="main-slider" id="main-slider">
    <div class="slider-slides" id="slider-slides">
        <div class="slide">
            <img src="images/slider/slide1.jpg" alt="Помощь">
            <div class="slide-caption">
                <h2>Ищут любящее сердце</h2>
            </div>
        </div>
        <div class="slide">
            <img src="images/slider/slide2.jpg" alt="Волонтерство">
            <div class="slide-caption">
                <h2>Найдите друга!</h2>
            </div>
        </div>
    </div>
    <button class="slider-btn prev-btn" id="prev-btn">❮</button>
    <button class="slider-btn next-btn" id="next-btn">❯</button>
    </section>
    <div class="filter-container">
        <button class="filter-btn active" data-filter="all">Все лапки</button>
        <button class="filter-btn" data-filter="Собаки">Собаки</button>
        <button class="filter-btn" data-filter="Кошки">Кошки</button>
        <button class="filter-btn" data-filter="Грызуны">Грызуны</button>
    </div>

    <main class="catalog">
        <?php if (!empty($pets)): ?>
            <?php foreach ($pets as $pet): ?>
                <div class="pet-card" data-category="<?= htmlspecialchars($pet['species_name']) ?>">
                    
                    <div class="pet-image-container">
                        <?php $img = !empty($pet['image_path']) ? $pet['image_path'] : 'images/no-photo.jpg'; ?>
                        <img src="<?= $img ?>" alt="<?= htmlspecialchars($pet['name']) ?>" loading="lazy">
                        
                        <?php if ($pet['status'] !== 'available'): ?>
                            <div class="status-overlay">На лечении</div>
                        <?php endif; ?>
                    </div>

                    <div class="pet-info">
                        <span class="pet-species"><?= htmlspecialchars($pet['species_name']) ?></span>
                        <h3><?= htmlspecialchars($pet['name']) ?></h3>
                        <p class="pet-breed"><?= htmlspecialchars($pet['breed_name']) ?></p>
                        
                        <div class="pet-meta">
                            <span>Возраст: <?= (int)$pet['age'] ?> г.</span>
                        </div>

                        <a href="pet_card.php?id=<?= $pet['id'] ?>" class="adopt-btn">
    Познакомиться поближе
</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="empty-state">
                <p>В данный момент в каталоге нет животных. Загляните позже!</p>
            </div>
        <?php endif; ?>
    </main>

    <footer class="main-footer">
    <div class="container footer-grid">
        <div class="footer-info">
            <h4>Приют «Лапоухий Дом»</h4>
            <p>Мы помогаем найти дом тем, кто не может попросить об этом сам. Каждый день мы заботимся о 150+ животных.</p>
            <div class="social-links">
                <a href="#">VK</a>
                <a href="#">Telegram</a>
            </div>
        </div>
        
        <div class="footer-nav">
            <h5>Навигация</h5>
            <a href="/">Найти друга</a>
            <a href="/staff">Наша команда</a>
            <a href="/docs">Документы</a>
        </div>

        <div class="footer-contacts">
            <h5>Связаться с нами</h5>
            <p>📍 г. Уютный, ул. Лесная, 12</p>
            <p>📞 +7 (999) 000-00-00</p>
            <p>✉️ help@pitomnik.ru</p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; <?= date('Y') ?> Все права защищены. Сделано с любовью к животным.</p>
    </div>
</footer>
<script src="/js/script.js"></script>
</body>
</html>

</body>
</html>