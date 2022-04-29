<?php
require_once("db/connect.php");
require_once("functions.php");

try {
    if (empty($_POST['eng_sentence'])) exit("Не заполнено поле: eng_sentence");
    if (empty($_POST['card_id'])) exit("Не получено значение card_id");

    $sql = "SELECT * FROM cards WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['card_id']]);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //$entries = $pdo->query($query);
    //$cards_arr = $entries->fetchAll(PDO::FETCH_ASSOC);

    //echo "uspeshno! <br />";
    //vd($_POST['card_id']);
    //vd($_POST['eng_sentence']);

    $item_score = (int)$data[0]['score'];
    $string_post = '';

    if ($_POST['eng_sentence'] !== '' && $_POST['eng_sentence'] === $data[0]['eng_sentence']) {
        $item_score++;
        $string_post = 'y';
    } else {
        $item_score--;
        $string_post = 'n';
    }

    //vd($item_score, 'item score');
    try {

        $sql = "UPDATE cards SET score = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$item_score, $_POST['card_id']]);
    
        //echo "uspeshno! <br />";
        //echo '<a href="/add-card.php">one more card</a>';
        if ($string_post === 'y') {
            echo 'everything is right! <br /> Current score: '.$item_score.'<br /><a href="/ru_eng.php">one more word</a>';
        } else if ($string_post === 'n') {
            echo 'wrong! <br /> 
            <p>'.$data[0]["ru_sentence"].'</p>
            <p>'.$data[0]["eng_sentence"].'</p>
            Current score: '.$item_score.'<br /><a href="/ru_eng.php">one more word</a>';
        }
    } catch (PDOException $e) {
        echo "Ошибка выполнения запроса: " . $e->getMessage();
    }

} catch (PDOException $e) {
    echo "Ошибка выполнения запроса: " . $e->getMessage();
}