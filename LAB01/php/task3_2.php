<?php
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Число</th><th>Квадрат</th></tr>";
for ($i = 1; $i <= 5; $i++) {
    echo "<tr><td>$i</td><td>" . ($i * $i) . "</td></tr>";
}
echo "</table>";
?>