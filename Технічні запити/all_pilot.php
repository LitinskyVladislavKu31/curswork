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
$connection = mysqli_connect('localhost', 'root', '', 'airport');
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$sql = "SELECT * FROM pilot";
$result = $connection->query($sql);

echo "<table class='table-style'>"; // Додали клас для таблиці
    echo "<tr><th>ID пілота</th><th>Ім'я</th><th>Прізвище</th><th>Дата народження</th><th>Ліцензія</th><th>Кваліфікація</th><th>Контактні дані</th></tr>";
// Вивід результатів
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["ID_Pilot"] . "</td>";
        echo "<td>" . $row["NameP"] . "</td>";
        echo "<td>" . $row["SurnameP"] . "</td>";
        echo "<td>" . $row["BirthDate"]. "</td>";
        echo "<td>" . $row["License"]. "</td>";
        echo "<td>" . $row["Qualification"]. "</td>";
        echo "<td>" . $row["Contact_detals"]. "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<tr><td colspan='7'>Пілотів не знайдено</td></tr>";
}
$connection->close();
?>

</body>
</html>
