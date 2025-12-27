<?php
// Get the current file name
$current_page = basename($_SERVER['PHP_SELF']);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Служба доставки еды - Вкусная и быстрая доставка</title>
    <link rel="stylesheet" href="style.css">
    <meta name="description" content="Лучший сервис доставки еды с быстрой и качественной доставкой">
    <meta name="theme-color" content="#004E89">
</head>
<body>

<header>
    <nav>
        <div class="logo-container">
            <a href="index.php" title="На главную">
                <img src="images/logo/logo.jpg" alt="FoodDelivery Logo" class="logo">
            </a>
        </div>
        
        <div class="nav-links">
            <a href="about.php">О нас</a>
            <a href="products.php">Меню</a>
            <a href="contacts.php">Контакты</a>
        </div>

        <div class="auth-buttons">
            <?php if (isset($_SESSION['user_id'])): ?>
                <!-- User is logged in -->
                <a href="cart.php" class="btn" style="background: linear-gradient(135deg, var(--accent) 0%, #F7931E 100%); box-shadow: 0 4px 15px rgba(247, 147, 30, 0.4);">🛒 Корзина</a>
                <a href="profile.php" class="btn btn-register">👤 Профиль</a>
            <?php else: ?>
                <!-- User is not logged in -->
                <?php if ($current_page !== 'login.php' && $current_page !== 'auth.php'): ?>
                    <a href="login.php" class="btn btn-login">Вход</a>
                <?php endif; ?>

                <?php if ($current_page !== 'register.php'): ?>
                    <a href="register.php" class="btn btn-register">Регистрация</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </nav>
</header>
