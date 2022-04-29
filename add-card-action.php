<?php
require_once("db/connect.php");

try {
    if (empty($_POST['word'])) exit("Не заполнено поле: eng word");
    if (empty($_POST['ru_sentence'])) exit("Не заполнено поле: ru sentence");
    if (empty($_POST['eng_sentence'])) exit("Не заполнено поле: eng sentence");

    $query = "INSERT INTO cards VALUES (NULL, :word, :ru_sentence, :eng_sentence, 0)";
    $entries = $pdo->prepare($query);
    $entries->execute([
        'word' => $_POST['word'],
        'ru_sentence' => $_POST['ru_sentence'],
        'eng_sentence' => $_POST['eng_sentence'],
    ]);

    echo "uspeshno! <br />";
    echo '<a href="/add-card.php">one more card</a>';
} catch (PDOException $e) {
    echo "Ошибка выполнения запроса: " . $e->getMessage();
}