<?php
require_once 'vendor/autoload.php';
require_once 'functions.php';
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader('templates');
$view = new Environment($loader);



require_once("db/connect.php");
try {

    $query = "SELECT * FROM cards";
    $entries = $pdo->query($query);
    $cards_arr = $entries->fetchAll(PDO::FETCH_ASSOC);
    //$entries->fetchAll();
    //vd($entries->fetchAll(PDO::FETCH_ASSOC));
/*
    try {
        while($catalog = $entries->fetch(PDO::FETCH_ASSOC))
            vd($catalog)."<br />";
    } catch (PDOException $e) {
        echo "Ошибка выполнения запроса: " . $e->getMessage();
    }
*/
    //$qw = $entries->execute();


    //vd($entries->fetch());

    //$min_item = min($cards_arr);
    //vd($min_item);
    $score_arr = [];
    foreach($cards_arr as $card) {
        array_push($score_arr, (int)$card['score']);
    }
    
    $min_score = min($score_arr);
    $desired_item;

    foreach($cards_arr as $card) {
        //array_push($score_arr, (int)$card['score']);
        if ((int)$card['score'] === $min_score) {
            $desired_item = $card;
            break;
        }
    }

    //vd($desired_item);
    echo '<p>'.$desired_item['ru_sentence'].'</p>';
    $_POST['card_id'] = $desired_item['id'];
    
} catch (PDOException $e) {
    echo "Ошибка выполнения запроса: " . $e->getMessage();
}

$exam_form = $view->render('examination-form.html', ['card_id' => (int)$_POST['card_id']]);
echo $exam_form;