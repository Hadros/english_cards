<?php
function getPageTitle($txt = "Some page") 
{
    return $txt;
}

function vd($value='undefined', $a='undefined') {
    echo "<br />";
    echo $a.': ';
    echo "<pre>";
    var_dump($value);
    echo "</pre><br />";
}