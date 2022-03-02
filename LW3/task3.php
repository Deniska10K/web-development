<?php
header("Content-Type: text/plain");
$password = $_GET['password'];
$password_len = strlen($password);
$digits_count = 0;
$uppers_count = 0;
$lowers_count = 0;
$duplicate_symbols = 0;


foreach (count_chars($password) as $symbol_count)
{
    $symbol_count > 1 ? $duplicate_symbols += $symbol_count : null; // duplicate_symbols
}


foreach (str_split($password , 1 ) as $symbol)
{
    ctype_digit($symbol) ? $digits_count++ : null; // digits_count
    ctype_upper($symbol) ? $uppers_count++ : null; // uppers_count
    ctype_lower($symbol) ? $lowers_count++ : null; // lowers_count
}


// Calculate
$strength = 0; // basic
$strength += $password_len * 4; // password_len
$strength += ($password_len - $uppers_count) * 2; // uppers_count
$strength += ($password_len - $lowers_count) * 2; // lowers_count
ctype_alpha($password) ? $strength -= $password_len : null; // only letters
ctype_digit($password) ? $strength -= $password_len : null; // only digits


// Output
echo "password= $password\nstrength= $strength"
?>
