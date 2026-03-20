<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Счастливые истории — Лапоухий дом</title>
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

<main class="container page-content" style="margin-top: 40px;">
    <h1>Счастливые истории</h1>
    <p class="subtitle">Те, кто уже нашел свой теплый дом</p>

    <div class="stories-list">
        <article class="story-card">
            <img src="images/story1.jpg" alt="Рекс дома">
            <div class="story-text">
                <h3>Рекс: из пугливого щенка в верного охранника</h3>
                <p>Рекс прожил у нас полгода. Теперь он живет в большой семье в загородном доме и обожает играть с детьми...</p>
                <span class="story-date">12 мая 2025</span>
            </div>
        </article>

        <article class="story-card">
            <img src="images/story2.jpg" alt="Мурка дома">
            <div class="story-text">
                <h3>Мурка и её новое кресло</h3>
                <p>Мурку забрали в первый же день после выставки. Сейчас её любимое занятие — спать на солнечном подоконнике.</p>
                <span class="story-date">01 июня 2025</span>
            </div>
        </article>
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