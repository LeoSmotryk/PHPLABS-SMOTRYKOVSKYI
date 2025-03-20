<?php
$input_text = htmlspecialchars($_GET['input_text']);
$word = "spam";
echo (stripos($input_text, $word) !== false)? "Текст містить заборонене слово" : "Текст не містить заборонене слово";
?>