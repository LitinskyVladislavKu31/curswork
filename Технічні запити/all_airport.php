<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результати пошуку рейсів</title>
    <link rel="stylesheet" href="../Стилі/style2.css">

    </style>
</head>
<body>

<?php
$connection = mysqli_connect('localhost', 'root', '', 'airport');
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$sql = "SELECT * FROM airport";

$result = $connection->query($sql);


// Вивід результатів
echo "<table class='table-style'>"; // Додали клас для таблиці
echo "<tr><th>ID aеропорту</th><th>Назва аеропорту</th><th>Місто</th><th>Країна</th></tr>";
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["ID_airport"] . "</td>";
        echo "<td>" . $row["Name"] . "</td>";
        echo "<td>" . $row["City"] . "</td>";
        echo "<td>" . $row["Country"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<tr><td colspan='4'>Аеропортів не знайдено</td></tr>";
}

$connection->close();
?>


</body>
</html>