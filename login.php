<?php
session_start();
require_once 'header.php';
?>

<div class="container">
    <div class="form-container">
        <h2>Вход в аккаунт</h2>
        <?php
        if (isset($_SESSION['login_error'])) {
            echo '<div class="error-message">' . $_SESSION['login_error'] . '</div>';
            unset($_SESSION['login_error']);
        }
        if (isset($_SESSION['success_message'])) {
            echo '<div class="success-message">' . $_SESSION['success_message'] . '</div>';
            unset($_SESSION['success_message']);
        }
        ?>
        <form action="auth.php" method="POST">
            <input type="hidden" name="action" value="login">
            <div class="form-group">
                <label for="phone">📱 Номер телефона</label>
                <input type="text" id="phone" name="phone" placeholder="+7 (999) 123-45-67" required>
            </div>
            <div class="form-group">
                <label for="password">🔑 Пароль</label>
                <input type="password" id="password" name="password" placeholder="Введите пароль" required>
            </div>
            <button type="submit" class="btn btn-register" style="width: 100%; margin-top: 20px;">Войти</button>
        </form>
        <p style="text-align: center; margin-top: 20px; color: #666;">
            Нет аккаунта? <a href="register.php" style="color: var(--primary); text-decoration: none; font-weight: 600;">Зарегистрируйтесь</a>
        </p>
    </div>
</div>

</body>
</html>
