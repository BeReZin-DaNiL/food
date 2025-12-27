<?php
session_start();
require_once 'header.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Initialize cart if not exists
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle add to cart
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'] ?? '';
    $product_name = $_POST['product_name'] ?? '';
    $product_price = floatval($_POST['product_price'] ?? 0);
    
    if ($product_id && $product_name && $product_price > 0) {
        $key = 'product_' . $product_id;
        
        if (isset($_SESSION['cart'][$key])) {
            $_SESSION['cart'][$key]['quantity']++;
        } else {
            $_SESSION['cart'][$key] = [
                'id' => $product_id,
                'name' => $product_name,
                'price' => $product_price,
                'quantity' => 1
            ];
        }
    }
}

// Handle remove from cart
if (isset($_POST['remove_from_cart'])) {
    $key = $_POST['remove_from_cart'];
    unset($_SESSION['cart'][$key]);
}

// Calculate total
$total = 0;
$item_count = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
    $item_count += $item['quantity'];
}
?>

<div class="container">
    <h1 style="text-align: center; margin-bottom: 30px;">🛒 Моя корзина</h1>
    
    <?php if (empty($_SESSION['cart'])): ?>
        <div style="text-align: center; padding: 60px 20px;">
            <div style="font-size: 3rem; margin-bottom: 20px;">📭</div>
            <h2 style="color: #666; margin-bottom: 20px;">Корзина пуста</h2>
            <p style="color: #999; margin-bottom: 30px; font-size: 1.1rem;">Добавьте блюда из меню, чтобы начать заказ</p>
            <a href="products.php" class="btn btn-register" style="display: inline-block;">🛒 Перейти в меню</a>
        </div>
    <?php else: ?>
        <div style="display: grid; grid-template-columns: 1fr 350px; gap: 30px; margin-bottom: 30px;">
            <!-- Cart items -->
            <div>
                <?php foreach ($_SESSION['cart'] as $key => $item): ?>
                    <div style="padding: 20px; background: white; border-radius: 12px; margin-bottom: 15px; border-left: 4px solid var(--primary); display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <h3 style="color: var(--secondary); margin-bottom: 5px;"><?php echo htmlspecialchars($item['name']); ?></h3>
                            <p style="color: #666; margin-bottom: 10px;">Цена: <strong><?php echo number_format($item['price'], 0, ',', ' '); ?> ₽</strong></p>
                            <p style="color: #999;">Количество: <strong><?php echo $item['quantity']; ?></strong></p>
                            <p style="color: var(--primary); font-weight: 600; margin-top: 10px;">Итого: <?php echo number_format($item['price'] * $item['quantity'], 0, ',', ' '); ?> ₽</p>
                        </div>
                        <form method="POST" style="display: inline;">
                            <input type="hidden" name="remove_from_cart" value="<?php echo $key; ?>">
                            <button type="submit" class="btn btn-login" style="padding: 10px 15px; font-size: 14px;">✕ Удалить</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Cart summary -->
            <div style="position: sticky; top: 100px;">
                <div style="padding: 25px; background: linear-gradient(135deg, var(--secondary) 0%, #003a6b 100%); border-radius: 16px; color: white; box-shadow: var(--shadow);">
                    <h2 style="margin-bottom: 20px; font-size: 1.5rem;">Итого заказа</h2>
                    
                    <div style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid rgba(255,255,255,0.2);">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span>Товары (<?php echo $item_count; ?>):</span>
                            <span><?php echo number_format($total, 0, ',', ' '); ?> ₽</span>
                        </div>
                    </div>

                    <div style="display: flex; justify-content: space-between; margin-bottom: 20px; font-size: 1.2rem; font-weight: 700;">
                        <span>Итого:</span>
                        <span><?php echo number_format($total, 0, ',', ' '); ?> ₽</span>
                    </div>

                    <button class="btn btn-register" style="width: 100%; margin-bottom: 10px; padding: 15px;">✓ Оформить заказ</button>
                    <a href="products.php" class="btn" style="display: block; text-align: center; background: rgba(255,255,255,0.2); padding: 12px; border-radius: 8px; text-decoration: none; color: white; transition: all 0.3s ease;">← Продолжить покупки</a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
