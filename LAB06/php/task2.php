<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee_management";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Помилка з'єднання: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_employee'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $position = $conn->real_escape_string($_POST['position']);
    $salary = floatval($_POST['salary']);
    $sql_insert = "INSERT INTO employees (name, position, salary) VALUES ('$name', '$position', $salary)";
    if ($conn->query($sql_insert) === TRUE) {
        echo "<p>Працівника додано успішно!</p>";
    } else {
        echo "<p>Помилка: " . $conn->error . "</p>";
    }
}
?>
<h2>Додати нового працівника</h2>
<form method="post">
    <label>ПІБ: <input type="text" name="name" required></label>
    <label>Посада: <input type="text" name="position" required></label>
    <label>Зарплата: <input type="number" name="salary" step="0.01" required></label>
    <input type="submit" name="add_employee" value="Додати">
</form>
<?php
$sql = "SELECT * FROM employees";
$result = $conn->query($sql);
echo "<h2>Список працівників</h2>";
if ($result && $result->num_rows > 0) {
    echo "<table border='1'>
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Position</th>
    <th>Salary</th>
    </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['position']}</td>
        <td>{$row['salary']}</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "Немає записів";
}
$conn->close();
?>