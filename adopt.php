<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Как взять друга — Лапоухий дом</title>
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
            <a href="adopt.php" class="btn-nav-cta">Взять друга</a>
        </nav>
    </div>
</header>

<main class="container page-content" style="margin-top: 40px; margin-bottom: 60px;">
    <h1 style="text-align: center; margin-bottom: 40px;">Как забрать питомца домой</h1>
    
    <div class="guide-steps">
        <div class="step">
            <div class="step-num">1</div>
            <h4>Выбор друга</h4>
            <p>Посмотрите наш каталог и выберите того, кто вам приглянулся. Учтите темперамент и потребности животного.</p>
        </div>
        <div class="step">
            <div class="step-num">2</div>
            <h4>Знакомство</h4>
            <p>Приезжайте в приют, пообщайтесь с хвостиком, погуляйте с ним на нашей площадке.</p>
        </div>
        <div class="step">
            <div class="step-num">3</div>
            <h4>Анкета и договор</h4>
            <p>Мы попросим вас заполнить небольшую анкету и подписать договор об ответственном содержании.</p>
        </div>
        <div class="step">
            <div class="step-num">4</div>
            <h4>Счастливая жизнь</h4>
            <p>Забирайте нового члена семьи домой! Мы всегда остаемся на связи и готовы помочь советом.</p>
        </div>
    </div>

    <div style="text-align: center; margin-top: 50px; background: #fff; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
        <h3>Готовы сделать первый шаг?</h3>
        <p style="color: #636e72; margin-bottom: 25px;">Вы можете связаться с нами по телефону или приехать лично.</p>
        <a href="contacts.php" class="btn-nav-cta" style="display: inline-block; padding: 15px 40px;">Перейти к контактам</a>
    </div>
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

</body>
</html>