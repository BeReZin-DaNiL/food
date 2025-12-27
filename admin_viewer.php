<?php
// admin_viewer.php - Простой просмотрщик базы данных
require_once 'db.php';

$tables = ['users', 'products', 'orders'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Админ-панель: Просмотр БД</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; padding: 20px; background: #f4f4f4; }
        .container { max-width: 1200px; margin: 0 auto; }
        h1 { color: #333; }
        h2 { color: #555; border-bottom: 2px solid #FF6B35; padding-bottom: 10px; margin-top: 40px; }
        table { width: 100%; border-collapse: collapse; background: white; margin-bottom: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background: #f8f9fa; font-weight: 600; color: #333; }
        tr:nth-child(even) { background: #f9f9f9; }
        .badge { padding: 5px 10px; border-radius: 4px; background: #eee; font-size: 12px; }
        .nav { margin-bottom: 20px; }
        .nav a { margin-right: 15px; text-decoration: none; color: #004E89; font-weight: 600; }
        .nav a:hover { text-decoration: underline; }
    </style>
</head>
<body>
<div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1>🗄️ Просмотр базы данных</h1>
        <div class="nav">
            <a href="index.php">← На главную</a>
            <a href="install.php">⚙️ Переустановить БД</a>
        </div>
    </div>
    
    <p>Здесь вы можете видеть содержимое всех таблиц базы данных SQLite (файл <code>database.sqlite</code>).</p>

    <?php foreach ($tables as $table): ?>
        <h2>Таблица: <?php echo ucfirst($table); ?></h2>
        <?php
        try {
            $stmt = $pdo->query("SELECT * FROM $table");
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if (empty($rows)) {
                echo "<p><em>Таблица пуста</em></p>";
            } else {
                echo "<table><thead><tr>";
                // Заголовки
                foreach (array_keys($rows[0]) as $col) {
                    echo "<th>" . htmlspecialchars($col) . "</th>";
                }
                echo "</tr></thead><tbody>";
                // Данные
                foreach ($rows as $row) {
                    echo "<tr>";
                    foreach ($row as $val) {
                        echo "<td>" . htmlspecialchars($val) . "</td>";
                    }
                    echo "</tr>";
                }
                echo "</tbody></table>";
            }
        } catch (PDOException $e) {
            echo "<p style='color:red'>Ошибка чтения таблицы: " . $e->getMessage() . "</p>";
        }
        ?>
    <?php endforeach; ?>

</div>
</body>
</html>
