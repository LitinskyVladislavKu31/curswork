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
// Створення з'єднання
$connection = mysqli_connect('localhost', 'root', '', 'airport');

// Перевірка з'єднання
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// SQL-запит для вибору всіх записів з таблиці airplane
$sql = "SELECT * FROM airplane";
$result = $connection->query($sql);

echo "<table class='table-style'>"; // Додали клас для таблиці
echo "<tr><th>ID літака</th><th>Модель</th><th>Номер</th><th>Статус</th><th>Місткість</th></tr>";

// Вивід результатів
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["ID_airplane"] . "</td>";
        echo "<td>" . $row["Model"] . "</td>";
        echo "<td>" . $row["Number"] . "</td>";
        echo "<td>" . $row["Status_airplane"] . "</td>";
        echo "<td>" . $row["Capacity"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<tr><td colspan='5'>Літаків не знайдено</td></tr>";
}

// Закриття з'єднання
$connection->close();
?>

</body>
</html>
