<?php
require_once 'header.php';
?>

<div class="container">
    <h1>О нас</h1>
    
    <div style="text-align: center; margin-top: 50px; margin-bottom: 50px;">
        <h2 style="font-size: 3rem; margin-bottom: 15px; background: linear-gradient(135deg, #004E89 0%, #FF6B35 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">FoodDelivery</h2>
        <p style="font-size: 1.3rem; font-style: italic; color: #666; margin-bottom: 30px; font-weight: 500;">⚡ Быстро • 😋 Вкусно • ✨ Надежно</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-top: 50px;">
        <div style="padding: 30px; background: linear-gradient(135deg, rgba(255,107,53,0.1) 0%, rgba(0,78,137,0.1) 100%); border-radius: 16px; border-left: 4px solid #FF6B35;">
            <h3 style="font-size: 1.5rem; color: #FF6B35; margin-bottom: 15px; font-family: 'Poppins', sans-serif;">🚀 Быстрая доставка</h3>
            <p style="color: #555; line-height: 1.8;">Мы доставляем ваш заказ в самые кратчайшие сроки. Каждый час важен для вашего удовольствия.</p>
        </div>

        <div style="padding: 30px; background: linear-gradient(135deg, rgba(76,175,80,0.1) 0%, rgba(0,78,137,0.1) 100%); border-radius: 16px; border-left: 4px solid #4CAF50;">
            <h3 style="font-size: 1.5rem; color: #4CAF50; margin-bottom: 15px; font-family: 'Poppins', sans-serif;">👨‍🍳 Качественная еда</h3>
            <p style="color: #555; line-height: 1.8;">Только лучшие ингредиенты и опытные повара. Каждое блюдо готовится с любовью.</p>
        </div>

        <div style="padding: 30px; background: linear-gradient(135deg, rgba(247,147,30,0.1) 0%, rgba(0,78,137,0.1) 100%); border-radius: 16px; border-left: 4px solid #F7931E;">
            <h3 style="font-size: 1.5rem; color: #F7931E; margin-bottom: 15px; font-family: 'Poppins', sans-serif;">💯 100% гарантия</h3>
            <p style="color: #555; line-height: 1.8;">Полная гарантия качества. Если что-то не понравится, мы всегда найдем решение.</p>
        </div>
    </div>

    <div style="background: linear-gradient(135deg, #004E89 0%, #003a6b 100%); color: white; padding: 50px; border-radius: 16px; margin-top: 50px; text-align: center;">
        <h2 style="font-size: 2rem; margin-bottom: 20px; font-family: 'Poppins', sans-serif;">Присоединяйтесь к нам!</h2>
        <p style="font-size: 1.1rem; margin-bottom: 30px; line-height: 1.8;">Получайте быструю доставку, специальные предложения и эксклюзивные скидки.</p>
        <a href="register.php" class="btn btn-register" style="display: inline-block;">Начать прямо сейчас</a>
    </div>
</div>

</body>
</html>
