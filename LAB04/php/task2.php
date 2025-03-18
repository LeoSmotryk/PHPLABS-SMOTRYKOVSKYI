<?php
function sumArray($array) {
    return array_sum($array);
}
$numbers = range(1, 20);
echo "Сума чисел від 1 до 20: " . sumArray($numbers);
?>