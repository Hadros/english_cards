<?php
require_once 'vendor/autoload.php';
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

echo "page: Add card <br /><br />";

$loader = new FilesystemLoader('templates');
$view = new Environment($loader);

$add_card_form = $view->render('add-card-form.html');
echo $add_card_form;
