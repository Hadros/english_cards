<?php
require_once 'config/global-const.php';
require_once 'functions/getPageTitle.php';

echo "Hello, world!";
echo "<br />";

echo '<a href="/add-card.php" target="_blank">'. getPageTitle(ADD_CARD_TITLE) .'</a>';