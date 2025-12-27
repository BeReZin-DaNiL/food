<?php
// Используем SQLite для простоты и надежности (не требует настройки MySQL/XAMPP)
$db_file = __DIR__ . '/database.sqlite';
$dsn = "sqlite:$db_file";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, null, null, $options);
     
     // Включаем поддержку внешних ключей для SQLite
     $pdo->exec("PRAGMA foreign_keys = ON;");
     
} catch (\PDOException $e) {
     die("Ошибка подключения к базе данных SQLite: " . $e->getMessage());
}
?>
