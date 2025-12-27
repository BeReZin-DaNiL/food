<?php
session_start();
require_once 'header.php';
?>

<!-- Подключение CSS -->
<link rel="stylesheet" href="style.css">

<!-- Hero Section -->
<div style="background: linear-gradient(135deg, var(--secondary) 0%, #003a6b 50%, var(--primary) 100%); color: white; padding: 80px 40px; text-align: center; margin-top: -20px;">
    <div style="max-width: 800px; margin: 0 auto;">
        <h1 style="font-size: 4rem; font-family: 'Poppins', sans-serif; margin-bottom: 20px; font-weight: 800; color: white;">🍕 FoodDelivery</h1>
        <p style="font-size: 1.4rem; margin-bottom: 30px; font-weight: 300; line-height: 1.6; color: white;">Быстрая доставка вкусной еды прямо к вашему дому. Закажите сейчас и получите скидку 20%!</p>
        <div style="display: flex; gap: 15px; justify-content: center;">
            <a href="products.php" class="btn btn-register" style="display: inline-block; font-size: 16px;">🛒 Смотреть меню</a>
            <a href="register.php" class="btn btn-login" style="display: inline-block; font-size: 16px;">📝 Зарегистрироваться</a>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="container">
    <h2 style="text-align: center; margin-bottom: 50px;">Почему выбирают нас?</h2>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; margin-bottom: 50px;">
        <!-- Feature 1 -->
        <div style="text-align: center; padding: 30px; background: linear-gradient(135deg, rgba(255,107,53,0.1) 0%, rgba(255,107,53,0.05) 100%); border-radius: 16px; border: 1px solid rgba(255,107,53,0.2); transition: all 0.3s ease;" class="feature-card">
            <div style="font-size: 3rem; margin-bottom: 15px;">⚡</div>
            <h3 style="color: var(--primary); margin-bottom: 10px; font-size: 1.3rem;">Быстрая доставка</h3>
            <p style="color: #666;">Доставляем ваш заказ за 30-45 минут</p>
        </div>

        <!-- Feature 2 -->
        <div style="text-align: center; padding: 30px; background: linear-gradient(135deg, rgba(0,78,137,0.1) 0%, rgba(0,78,137,0.05) 100%); border-radius: 16px; border: 1px solid rgba(0,78,137,0.2); transition: all 0.3s ease;" class="feature-card">
            <div style="font-size: 3rem; margin-bottom: 15px;">👨‍🍳</div>
            <h3 style="color: var(--secondary); margin-bottom: 10px; font-size: 1.3rem;">Свежие ингредиенты</h3>
            <p style="color: #666;">Только лучшее качество и свежесть</p>
        </div>

        <!-- Feature 3 -->
        <div style="text-align: center; padding: 30px; background: linear-gradient(135deg, rgba(76,175,80,0.1) 0%, rgba(76,175,80,0.05) 100%); border-radius: 16px; border: 1px solid rgba(76,175,80,0.2); transition: all 0.3s ease;" class="feature-card">
            <div style="font-size: 3rem; margin-bottom: 15px;">💰</div>
            <h3 style="color: var(--success); margin-bottom: 10px; font-size: 1.3rem;">Выгодные цены</h3>
            <p style="color: #666;">Лучшие предложения и постоянные скидки</p>
        </div>

        <!-- Feature 4 -->
        <div style="text-align: center; padding: 30px; background: linear-gradient(135deg, rgba(247,147,30,0.1) 0%, rgba(247,147,30,0.05) 100%); border-radius: 16px; border: 1px solid rgba(247,147,30,0.2); transition: all 0.3s ease;" class="feature-card">
            <div style="font-size: 3rem; margin-bottom: 15px;">🛡️</div>
            <h3 style="color: var(--accent); margin-bottom: 10px; font-size: 1.3rem;">Безопасность</h3>
            <p style="color: #666;">Защита ваших данных гарантирована</p>
        </div>
    </div>

    <h2 style="text-align: center; margin-bottom: 50px; margin-top: 50px;">Как это работает?</h2>
    
    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 50px;">
        <div style="text-align: center; position: relative;">
            <div style="width: 60px; height: 60px; background: linear-gradient(135deg, var(--primary) 0%, #FF5722 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #000; font-size: 24px; font-weight: bold; margin: 0 auto 15px;">1</div>
            <h4 style="color: var(--secondary); margin-bottom: 10px;">Регистрация</h4>
            <p style="color: #666; font-size: 14px;">Создайте аккаунт за 2 минуты</p>
        </div>

        <div style="text-align: center; position: relative;">
            <div style="width: 60px; height: 60px; background: linear-gradient(135deg, var(--secondary) 0%, #003a6b 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #000; font-size: 24px; font-weight: bold; margin: 0 auto 15px;">2</div>
            <h4 style="color: var(--secondary); margin-bottom: 10px;">Выбор блюд</h4>
            <p style="color: #666; font-size: 14px;">Выберите из большого меню</p>
        </div>

        <div style="text-align: center; position: relative;">
            <div style="width: 60px; height: 60px; background: linear-gradient(135deg, var(--success) 0%, #45a049 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #000; font-size: 24px; font-weight: bold; margin: 0 auto 15px;">3</div>
            <h4 style="color: var(--secondary); margin-bottom: 10px;">Оплата</h4>
            <p style="color: #666; font-size: 14px;">Безопасные методы оплаты</p>
        </div>

        <div style="text-align: center; position: relative;">
            <div style="width: 60px; height: 60px; background: linear-gradient(135deg, var(--accent) 0%, #F7931E 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #000; font-size: 24px; font-weight: bold; margin: 0 auto 15px;">4</div>
            <h4 style="color: var(--secondary); margin-bottom: 10px;">Доставка</h4>
            <p style="color: #666; font-size: 14px;">Получите заказ вовремя</p>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div style="background: linear-gradient(135deg, var(--secondary) 0%, #003a6b 100%); color: white; padding: 60px 40px; text-align: center; margin-top: 40px;">
    <h2 style="font-size: 2.5rem; margin-bottom: 20px; font-family: 'Poppins', sans-serif; color: #000;">Готовы к заказу?</h2>
    <p style="font-size: 1.1rem; margin-bottom: 30px; color: #000;">Присоединяйтесь к тысячам довольных клиентов</p>
    <a href="register.php" class="btn btn-register" style="display: inline-block; font-size: 16px;">🎉 Начать сейчас</a>
</div>

<!-- Styles for hover effect -->
<style>
    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1) !important;
    }

    @media (max-width: 768px) {
        h1 {
            font-size: 2.5rem !important;
        }
        
        [style*="grid-template-columns: repeat(4"] {
            grid-template-columns: repeat(2, 1fr) !important;
        }

        [style*="grid-template-columns: repeat(auto-fit"] {
            grid-template-columns: 1fr !important;
        }
    }
</style>

</body>
</html>
