<?php
header("Content-Type: text/plain");
$text = isset($_GET['text']) ? $_GET['text'] : null;
if ($text !== null)
{
    while (strripos($text, '  '))   
    {
        $text = str_replace('  ', ' ', $text);
    }
}
echo $text
?>