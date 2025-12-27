<?php
session_start();
require_once 'header.php';
require_once 'db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Get user info
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

if (!$user) {
    session_destroy();
    header("Location: login.php");
    exit;
}

// Handle logout
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}
?>

<div class="container">
    <div style="max-width: 600px; margin: 0 auto;">
        <div style="text-align: center; padding: 40px 20px; background: white; border-radius: 16px; box-shadow: var(--shadow);">
            <div style="font-size: 4rem; margin-bottom: 20px;">👤</div>
            <h1 style="color: var(--secondary); margin-bottom: 10px;">Мой профиль</h1>
            
            <div style="text-align: left; margin-top: 30px; padding: 20px; background: #f8f9fa; border-radius: 12px; border-left: 4px solid var(--primary);">
                <div style="margin-bottom: 15px;">
                    <label style="font-weight: 600; color: var(--secondary);">📱 Номер телефона:</label>
                    <p style="color: #333; font-size: 1.1rem;"><?php echo htmlspecialchars($user['phone']); ?></p>
                </div>
                
                <div style="margin-bottom: 15px;">
                    <label style="font-weight: 600; color: var(--secondary);">📅 Дата регистрации:</label>
                    <p style="color: #333; font-size: 1.1rem;">
                        <?php 
                        if (!empty($user['created_at'])) {
                            // Преобразуем дату из PostgreSQL формата
                            $date = new DateTime($user['created_at']);
                            echo $date->format('d.m.Y в H:i');
                        } else {
                            echo 'Не указана';
                        }
                        ?>
                    </p>
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="font-weight: 600; color: var(--secondary);">🛍️ Статус:</label>
                    <p style="color: #333; font-size: 1.1rem;">Активный пользователь</p>
                </div>
            </div>

            <div style="margin-top: 30px; display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
                <a href="cart.php" class="btn btn-register" style="display: inline-block;">🛒 Перейти в корзину</a>
                <form method="POST" style="display: inline;">
                    <button type="submit" name="logout" class="btn btn-login" style="width: 100%;">🚪 Выйти из аккаунта</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
