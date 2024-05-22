<?php
// Створення з'єднання
$connection = mysqli_connect('localhost', 'root', '', 'airport');

// Перевірка з'єднання
if ($connection->connect_error) {
    die("помилка з'єднання: " . $connection->connect_error);
}

// Отримання даних з форми
$status = $_POST['status'];

// Підготовка SQL-запиту для вставки даних
$sql = "INSERT INTO status (status) VALUES ('$status')";

// Виконання запиту
if ($connection->query($sql) === TRUE) {
    echo "Новий статус успішно створено";
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

// Закриття з'єднання
$connection->close();
?>
