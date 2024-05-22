<?php
// Створення з'єднання
$connection = mysqli_connect('localhost', 'root', '', 'airport');

// Перевірка з'єднання
if ($connection->connect_error) {
    die("помилка з'єднання: " . $connection->connect_error);
}

// Отримання даних з форми
$model = $_POST['model'];
$number = $_POST['number'];
$status = $_POST['status'];
$capacity = $_POST['capacity'];

// Підготовка SQL-запиту для вставки даних
$sql = "INSERT INTO airplane (Model, Number, Status_airplane, Capacity) VALUES ('$model', '$number', '$status', '$capacity')";

// Виконання запиту
if ($connection->query($sql) === TRUE) {
    echo "Новий літак успішно створено";
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

// Закриття з'єднання
$connection->close();
?>
