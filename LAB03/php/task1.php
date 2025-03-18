<?php
$num = 5;
$numbers = range(1, 10);
foreach ($numbers as $number)
echo "$num × $number = " . strval($num * $number) . "<br>";
?>