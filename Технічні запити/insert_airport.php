
<?php


// Створення з'єднання
$connection = mysqli_connect('localhost', 'root', '', 'airport');

// Перевірка з'єднання
if ($connection->connect_error) {
    die("помилка з'єднання: " . $conn->connect_error);
}

// Отримання даних з форми
$name = $_POST['name'];
$city = $_POST['city'];
$country = $_POST['country'];

// Підготовка SQL-запиту для вставки даних
$sql = "INSERT INTO airport (Name, City, Country) VALUES ('$name', '$city', '$country')";

// Виконання запиту
if ($connection->query($sql) === TRUE) {
    echo "Новий аеропорт успішно створено";
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

// Закриття з'єднання
$connection->close();
?>
