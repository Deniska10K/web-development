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
    $symbol_count > 1 ? $duplicate_symbols += $symbol_count : null; // duplicate symbols
}


foreach (str_split($password , 1 ) as $symbol)
{
    ctype_digit($symbol) ? $digits_count++ : null; // digits count
    ctype_upper($symbol) ? $uppers_count++ : null; // uppers count
    ctype_lower($symbol) ? $lowers_count++ : null; // lowers count
}


// Calculate
$strength = 0; // basic
$strength += $password_len * 4; // password_len
$strength += ($password_len - $uppers_count) * 2; // uppers count
$strength += ($password_len - $lowers_count) * 2; // lowers count
ctype_alpha($password) ? $strength -= $password_len : null; // only letters
ctype_digit($password) ? $strength -= $password_len : null; // only digits
$strength -= $duplicate_symbols; // duplicate symbols


// Output
echo "password= $password\nstrength= $strength"
?>
