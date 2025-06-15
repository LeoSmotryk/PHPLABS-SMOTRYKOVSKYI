<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee_management";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Помилка з'єднання: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $fields = [];
    $params = [];
    $types = '';

    if (!empty($_POST['name'])) {
        $fields[] = "name = ?";
        $params[] = $_POST['name'];
        $types .= 's';
    }
    if (!empty($_POST['position'])) {
        $fields[] = "position = ?";
        $params[] = $_POST['position'];
        $types .= 's';
    }
    if ($_POST['salary'] !== '' && $_POST['salary'] !== null) {
        $fields[] = "salary = ?";
        $params[] = floatval($_POST['salary']);
        $types .= 'd';
    }

    if ($id && count($fields) > 0) {
        $sql = "UPDATE employees SET " . implode(', ', $fields) . " WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $types .= 'i';
        $params[] = $id;
        $stmt->bind_param($types, ...$params);
        if ($stmt->execute()) {
            echo "Дані оновлені успішно";
        } else {
            echo "Помилка оновлення: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Вкажіть ID та хоча б одне поле для оновлення.";
    }
}
$conn->close();
?>
<form method="post">
    <label>ID:</label>
    <input type="number" name="id" required>
    <label>ПІБ:</label>
    <input type="text" name="name">
    <label>Посада:</label>
    <input type="text" name="position">
    <label>Зарплата:</label>
    <input type="number" step="0.01" name="salary">
    <button type="submit">Оновити дані</button>
</form>
