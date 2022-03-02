<?php
header("Content-Type: text/plain");
$text = trim($_GET['text']);
while (strripos($text, '  '))
{
    $text = str_replace('  ', ' ', $text);
}
echo $text
?>