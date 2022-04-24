<?php
require_once 'vendor/autoload.php';
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

//require_once 'functions/getPageTitle.php';

function getPageTitle($txt = "Some page") 
{
    return $txt;
}

$loader = new FilesystemLoader('templates');
$view = new Environment($loader);

$add_card_form = $view->render('add-card-form.html', ['scope_title' => '(введите текст)']);

$page_title = getPageTitle('Add card');
echo "<h1> $page_title </h1><br /><br />";

echo $add_card_form;
