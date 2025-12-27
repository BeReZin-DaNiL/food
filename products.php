<?php
session_start();
require_once 'header.php';

// Sample menu items
$menu_items = [
    ['id' => 1, 'name' => 'Паста Карбонара', 'price' => 450, 'description' => 'Классическая итальянская паста с беконом, сливками и пармезаном', 'image' => 'Паста_карбонара.jpg'],
    ['id' => 2, 'name' => 'Пицца Маргарита', 'price' => 380, 'description' => 'Традиционная пицца с помидорами, моцареллой и базиликом', 'image' => 'Пицца Маргарита.jpg'],
    ['id' => 3, 'name' => 'Бургер Де Люкс', 'price' => 320, 'description' => 'Сочный бургер с премиум-говядиной, беконом и овощами', 'image' => 'Бургер Де Люкс.jpg'],
    ['id' => 4, 'name' => 'Суши сет "Токио"', 'price' => 550, 'description' => 'Набор свежих суши с лососем, авокадо и огурцом', 'image' => 'Суши сет_Токио.jpg'],
    ['id' => 5, 'name' => 'Куриный кебаб', 'price' => 290, 'description' => 'Ароматный кебаб из куриного филе с овощами', 'image' => 'Куриный кебаб.jpg'],
    ['id' => 6, 'name' => 'Салат "Цезарь"', 'price' => 280, 'description' => 'Свежий салат с курицей, сухариками и соусом Цезарь', 'image' => 'Салат_Цезарь.jpg'],
];
?>

<div class="container">
    <h1>🍽️ Наше меню</h1>
    <p style="color: #666; font-size: 1.1rem; margin-bottom: 30px; text-align: center;">Выберите ваше любимое блюдо</p>
    
    <div class="slider-container">
        <div class="slider">
            <div class="slide">
                <img src="images/Блюда/Паста_карбонара.jpg" alt="Паста Карбонара">
            </div>
            <div class="slide">
                <img src="images/Блюда/Пицца Маргарита.jpg" alt="Пицца Маргарита">
            </div>
            <div class="slide">
                <img src="images/Блюда/Бургер Де Люкс.jpg" alt="Бургер Де Люкс">
            </div>
            <div class="slide">
                <img src="images/Блюда/Суши сет_Токио.jpg" alt="Суши сет Токио">
            </div>
            <div class="slide">
                <img src="images/Блюда/Куриный кебаб.jpg" alt="Куриный кебаб">
            </div>
            <div class="slide">
                <img src="images/Блюда/Салат_Цезарь.jpg" alt="Салат Цезарь">
            </div>
        </div>
        <button class="slider-btn prev" onclick="moveSlide(-1)">❮</button>
        <button class="slider-btn next" onclick="moveSlide(1)">❯</button>
    </div>

    <!-- Menu items -->
    <h2 style="text-align: center; margin-top: 50px; margin-bottom: 30px;">Доступные блюда</h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px; margin-bottom: 40px;">
        <?php foreach ($menu_items as $item): ?>
            <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: var(--shadow); transition: all 0.3s ease;">
                <img src="images/Блюда/<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 20px;">
                    <h3 style="color: var(--secondary); margin-bottom: 10px; font-size: 1.2rem;"><?php echo htmlspecialchars($item['name']); ?></h3>
                    <p style="color: #666; font-size: 14px; margin-bottom: 15px; line-height: 1.6;"><?php echo htmlspecialchars($item['description']); ?></p>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span style="color: var(--primary); font-size: 1.5rem; font-weight: 700;"><?php echo number_format($item['price'], 0, ',', ' '); ?> ₽</span>
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <form method="POST" action="cart.php" style="display: inline;">
                                <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                                <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($item['name']); ?>">
                                <input type="hidden" name="product_price" value="<?php echo $item['price']; ?>">
                                <button type="submit" name="add_to_cart" class="btn btn-register" style="padding: 10px 15px; font-size: 14px;">+ В корзину</button>
                            </form>
                        <?php else: ?>
                            <a href="register.php" class="btn btn-register" style="padding: 10px 15px; font-size: 14px; display: inline-block;">+ В корзину</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="script.js"></script>
</body>
</html>
