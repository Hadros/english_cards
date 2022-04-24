<?php
require_once("db/connect.php");

try {
    if (empty($_POST['text'])) exit("Не заполнено поле: Text");

    $query = "INSERT INTO cards VALUES (NULL, :text)";
    $entries = $pdo->prepare($query);
    $entries->execute(['text' => $_POST['text']]);

    echo "uspeshno!";
} catch (PDOException $e) {
    echo "Ошибка выполнения запроса: " . $e->getMessage();
}