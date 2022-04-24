<?php
    try {
        $pdo = new PDO(
            'mysql:host=test.site;dbname=words',
            'root',
            'Id@h&x7T!%aL',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
    catch (PDOException $e) {
        echo "Ошибка выполнения запроса: " . $e->getMessage();
    }