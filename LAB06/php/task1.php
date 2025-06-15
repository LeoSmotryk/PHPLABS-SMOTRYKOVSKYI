<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee_management";
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
 die("Помилка з'єднання: " . $conn->connect_error);
}
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
 echo "База даних створена успішно<br>";
} else {
 echo "Помилка створення бази даних: " . $conn->error;
}
$conn->select_db($dbname);
$sql = "CREATE TABLE IF NOT EXISTS employees (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(50),
 position VARCHAR(30),
 salary FLOAT
)";
if ($conn->query($sql) === TRUE) {
 echo "Таблиця створена успішно<br>";
} else {
 echo "Помилка створення таблиці: " . $conn->error;
}
$sql = "INSERT INTO employees (name, position, salary) VALUES
 ('Бах Микола Іванович', 'Старший лаборант', 8900.00),
 ('Миколайчук Петро Сергійович', 'Асистент', 11800.00),
 ('Клен Оксана Василівна', 'Старший викладач', 13400.00)";
if ($conn->query($sql) === TRUE) {
 echo "Дані успішно додані<br>";
} else {
 echo "Помилка додавання даних: " . $conn->error;
}
$conn->close();
?>