<?php
// install.php - Скрипт установки базы данных (SQLite версия)
// Этот скрипт автоматически создаст файл базы данных, если его нет

require_once 'db.php';

echo "<!DOCTYPE html>
<html lang='ru'>
<head>
    <meta charset='UTF-8'>
    <title>Установка базы данных</title>
    <style>
        body { font-family: sans-serif; padding: 40px; background: #f4f4f4; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .success { color: green; }
        .error { color: red; }
        .step { margin-bottom: 15px; padding: 10px; background: #f9f9f9; border-left: 4px solid #ddd; }
        .step.done { border-left-color: green; }
        .btn { display: inline-block; padding: 10px 20px; background: #FF6B35; color: white; text-decoration: none; border-radius: 4px; margin-top: 20px; }
    </style>
</head>
<body>
<div class='container'>
    <h1>🚀 Установка базы данных (SQLite)</h1>";

try {
    echo "<div class='step done'>✅ Подключение к файлу базы данных успешно</div>";
    echo "<div class='step done'>📂 Файл: " . htmlspecialchars($db_file) . "</div>";

    // Создание таблицы users
    $sql_users = "CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        phone TEXT NOT NULL UNIQUE,
        password TEXT NOT NULL,
        name TEXT,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );";
    $pdo->exec($sql_users);
    echo "<div class='step done'>✅ Таблица 'users' готова</div>";

    // Создание таблицы products
    $sql_products = "CREATE TABLE IF NOT EXISTS products (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        description TEXT,
        price REAL NOT NULL,
        image TEXT,
        category_id INTEGER
    );";
    $pdo->exec($sql_products);
    echo "<div class='step done'>✅ Таблица 'products' готова</div>";

    // Создание таблицы orders
    $sql_orders = "CREATE TABLE IF NOT EXISTS orders (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        user_id INTEGER NOT NULL,
        total_amount REAL NOT NULL,
        status TEXT DEFAULT 'new',
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE
    );";
    $pdo->exec($sql_orders);
    echo "<div class='step done'>✅ Таблица 'orders' готова</div>";

    // Проверка, есть ли уже товары
    $stmt = $pdo->query("SELECT COUNT(*) FROM products");
    if ($stmt->fetchColumn() == 0) {
        // Добавляем тестовые товары
        $menu_items = [
            ['Паста Карбонара', 'Классическая итальянская паста с беконом, сливками и пармезаном', 450, 'Паста_карбонара.jpg'],
            ['Пицца Маргарита', 'Традиционная пицца с помидорами, моцареллой и базиликом', 380, 'Пицца Маргарита.jpg'],
            ['Бургер Де Люкс', 'Сочный бургер с премиум-говядиной, беконом и овощами', 320, 'Бургер Де Люкс.jpg'],
            ['Суши сет "Токио"', 'Набор свежих суши с лососем, авокадо и огурцом', 550, 'Суши сет_Токио.jpg'],
            ['Куриный кебаб', 'Ароматный кебаб из куриного филе с овощами', 290, 'Куриный кебаб.jpg'],
            ['Салат "Цезарь"', 'Свежий салат с курицей, сухариками и соусом Цезарь', 280, 'Салат_Цезарь.jpg'],
        ];

        $insert = $pdo->prepare("INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)");
        foreach ($menu_items as $item) {
            $insert->execute($item);
        }
        echo "<div class='step done'>✅ Добавлены начальные товары в меню</div>";
    }

    echo "<h2 class='success'>🎉 Установка успешно завершена!</h2>";
    echo "<p>Теперь сайт работает на локальной базе данных. XAMPP MySQL больше не нужен.</p>";
    echo "<a href='index.php' class='btn'>Перейти на главную</a>";

} catch (PDOException $e) {
    echo "<div class='step error'>❌ Ошибка: " . htmlspecialchars($e->getMessage()) . "</div>";
}

echo "</div></body></html>";
?>