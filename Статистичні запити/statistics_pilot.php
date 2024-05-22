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

// ID пілота, за яким проводиться пошук рейсів
$selected_pilot_id = mysqli_real_escape_string($connection, $_POST['pilot']);

// Запит до бази даних для пошуку рейсів, в яких брав участь обраний пілот
$sql = "SELECT flight.ID_flight, flight.Number_flight, flight.InputDate, flight.OutputDate,
               departure.City AS DepartureCity, arrival.City AS ArrivalCity
        FROM flight
        INNER JOIN airport AS departure ON flight.IDinAirport = departure.ID_airport
        INNER JOIN airport AS arrival ON flight.IDoutAirport = arrival.ID_airport
        WHERE flight.ID_pilot1 = '$selected_pilot_id' OR flight.ID_pilot2 = '$selected_pilot_id'";

$result = $connection->query($sql);

// Вивід даних у вигляді таблиці
echo "<table class='table-style'>"; // Додали клас для таблиці
echo "<tr><th>ID рейсу</th><th>Номер рейсу</th><th>Дата вильоту</th><th>Дата прибуття</th><th>Місто вильоту</th><th>Місто прибуття</th></tr>";

// Обробка результатів запиту
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["ID_flight"] . "</td>";
        echo "<td>" . $row["Number_flight"] . "</td>";
        echo "<td>" . $row["InputDate"] . "</td>";
        echo "<td>" . $row["OutputDate"] . "</td>";
        echo "<td>" . $row["DepartureCity"] . "</td>";
        echo "<td>" . $row["ArrivalCity"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>Рейсів з вибраними аеропортами відправлення та прибуття не знайдено</td></tr>";
}

echo "</table>";

// Закриття з'єднання з базою даних
$connection->close();
?>

</body>
</html>




