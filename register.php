<?php
session_start();
require_once 'header.php';
?>

<div class="container">
    <div class="form-container">
        <h2>Присоединитесь к нам</h2>
        <?php
        if (isset($_SESSION['register_error'])) {
            echo '<div class="error-message">' . $_SESSION['register_error'] . '</div>';
            unset($_SESSION['register_error']);
        }
        if (isset($_SESSION['success_message'])) {
            echo '<div class="success-message">' . $_SESSION['success_message'] . '</div>';
            unset($_SESSION['success_message']);
        }
        ?>
        <form action="auth.php" method="POST">
            <input type="hidden" name="action" value="register">
            <div class="form-group">
                <label for="phone">📱 Номер телефона</label>
                <input type="text" id="phone" name="phone" placeholder="+7 (999) 123-45-67" required>
            </div>
            <div class="form-group">
                <label for="password">🔑 Пароль</label>
                <input type="password" id="password" name="password" placeholder="Минимум 6 символов" required>
            </div>
            <div class="form-group">
                <label for="password_confirm">🔑 Повторите пароль</label>
                <input type="password" id="password_confirm" name="password_confirm" placeholder="Повторите пароль" required>
            </div>
            <div class="form-group" style="display: flex; align-items: start; gap: 10px;">
                <input type="checkbox" id="policy" name="policy" required style="margin-top: 5px; cursor: pointer;">
                <label for="policy" style="font-size: 13px; display: inline; cursor: pointer;">
                    Я согласен(-а) с <a href="#" style="color: var(--primary); text-decoration: none;">политикой обработки данных</a>
                </label>
            </div>
            <button type="submit" class="btn btn-register" style="width: 100%; margin-top: 20px;">Зарегистрироваться</button>
        </form>
        <p style="text-align: center; margin-top: 20px; color: #666;">
            Уже есть аккаунт? <a href="login.php" style="color: var(--primary); text-decoration: none; font-weight: 600;">Войдите</a>
        </p>
    </div>
</div>

</body>
</html>
