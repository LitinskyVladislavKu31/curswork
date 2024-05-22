<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результати пошуку рейсів</title>
    <link rel="stylesheet" href="../Стилі/style2.css">
    
</head>
<body>


<?php
// Параметри підключення до бази даних
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airport";

// Створення підключення до бази даних
$connection = new mysqli($servername, $username, $password, $dbname);

// Перевірка підключення
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Якщо була натиснута кнопка "Показати рейси вибраного аеропорту виліту"
if (isset($_POST['departures'])) {
    // ID вибраного аеропорту відправлення
    $airport_id = mysqli_real_escape_string($connection, $_POST['airport_in']);
    // Запит до бази даних для пошуку рейсів з вибраного аеропорту відправлення
    $sql = "SELECT * FROM flight WHERE IDinAirport = '$airport_id'";
}
// Якщо була натиснута кнопка "Показати рейси вибраного аеропорту прибуття"
elseif (isset($_POST['arrivals'])) {
    // ID вибраного аеропорту прибуття
    $airport_id = mysqli_real_escape_string($connection, $_POST['airport_in']);
    // Запит до бази даних для пошуку рейсів з вибраного аеропорту прибуття
    $sql = "SELECT * FROM flight WHERE IDoutAirport = '$airport_id'";
}

// Виконання запиту до бази даних
$result = $connection->query($sql);

// Вивід результатів
if ($result->num_rows > 0) {
    echo "<table class='table-style'>"; // Додали клас для таблиці
    echo "<tr><th>ID рейсу</th><th>Номер рейсу</th><th>Дата вильоту</th><th>Дата прибуття</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["ID_flight"] . "</td>";
        echo "<td>" . $row["Number_flight"] . "</td>";
        echo "<td>" . $row["InputDate"] . "</td>";
        echo "<td>" . $row["OutputDate"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Рейсів не знайдено";
}

// Закриття з'єднання з базою даних
$connection->close();
?>

</body>
</html>


