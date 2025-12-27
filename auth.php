<?php
session_start();
require_once 'db.php';

$action = $_POST['action'] ?? '';

if ($action === 'register') {
    $phone = $_POST['phone'] ?? '';
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';
    $policy = isset($_POST['policy']);

    // 1. Empty fields
    if (empty($phone) || empty($password) || empty($password_confirm)) {
        $_SESSION['register_error'] = "заполните пустые поля";
        header("Location: register.php");
        exit;
    }

    // 4. Policy checkbox
    if (!$policy) {
        $_SESSION['register_error'] = "необходимо согласиться с нашей политикой";
        header("Location: register.php");
        exit;
    }

    // 2. Passwords mismatch
    if ($password !== $password_confirm) {
        $_SESSION['register_error'] = "пароли не совпадают";
        header("Location: register.php");
        exit;
    }

    // 3. Phone exists
    $stmt = $pdo->prepare("SELECT id FROM ivanov_231 WHERE phone = ?");
    $stmt->execute([$phone]);
    if ($stmt->fetch()) {
        $_SESSION['register_error'] = "этот номер телефона уже занят";
        header("Location: register.php");
        exit;
    }

    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // SQLite uses CURRENT_TIMESTAMP or datetime('now')
    $stmt = $pdo->prepare("INSERT INTO users (phone, password, created_at) VALUES (?, ?, datetime('now'))");
    if ($stmt->execute([$phone, $hashed_password])) {
        // Redirect to animation
        header("Location: animation.php");
        exit;
    } else {
        $_SESSION['register_error'] = "Ошибка базы данных";
        header("Location: register.php");
        exit;
    }

} elseif ($action === 'login') {
    $phone = $_POST['phone'] ?? '';
    $password = $_POST['password'] ?? '';

    // 6. Empty fields
    if (empty($phone) || empty($password)) {
        $_SESSION['login_error'] = "заполните пустые поля";
        header("Location: index.php"); // or login.php
        exit;
    }

    // 7. Phone not found & 8. Wrong password
    $stmt = $pdo->prepare("SELECT * FROM users WHERE phone = ?");
    $stmt->execute([$phone]);
    $user = $stmt->fetch();

    if (!$user) {
        $_SESSION['login_error'] = "номер телефона не зарегистрирован";
        header("Location: index.php");
        exit;
    }

    if (!password_verify($password, $user['password'])) {
        $_SESSION['login_error'] = "неверно введён пароль";
        header("Location: index.php");
        exit;
    }

    // 9. Success
    $_SESSION['user_id'] = $user['id'];
    header("Location: animation.php");
    exit;
} else {
    header("Location: index.php");
    exit;
}
