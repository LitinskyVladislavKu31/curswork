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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airport";

$connection = mysqli_connect($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$currentDateTime = date('Y-m-d H:i:s');

if (isset($_POST['future'])) {
    $sql = "SELECT 
            flight.Number_flight,
            flight.InputDate,
            flight.OutputDate,
            a1.Name AS 'InputAirport',
            a2.Name AS 'OutputAirport',
            airplane.Model AS 'AirplaneModel',
            pilot1.NameP AS 'Pilot1Name',
            pilot1.SurnameP AS 'Pilot1Surname',
            pilot2.NameP AS 'Pilot2Name',
            pilot2.SurnameP AS 'Pilot2Surname'
        FROM 
            flight
        INNER JOIN 
            airport AS a1 ON flight.IDinAirport = a1.ID_airport
        INNER JOIN 
            airport AS a2 ON flight.IDoutAirport = a2.ID_airport
        INNER JOIN 
            airplane ON flight.ID_airplane = airplane.ID_airplane
        INNER JOIN 
            pilot AS pilot1 ON flight.ID_pilot1 = pilot1.ID_Pilot
        INNER JOIN 
            pilot AS pilot2 ON flight.ID_pilot2 = pilot2.ID_Pilot
        WHERE 
        InputDate > '$currentDateTime' AND OutputDate > '$currentDateTime' 
        ORDER BY InputDate";
}
if (isset($_POST['past'])) {
    $sql = "SELECT 
            flight.Number_flight,
            flight.InputDate,
            flight.OutputDate,
            a1.Name AS 'InputAirport',
            a2.Name AS 'OutputAirport',
            airplane.Model AS 'AirplaneModel',
            pilot1.NameP AS 'Pilot1Name',
            pilot1.SurnameP AS 'Pilot1Surname',
            pilot2.NameP AS 'Pilot2Name',
            pilot2.SurnameP AS 'Pilot2Surname'
        FROM 
            flight
        INNER JOIN 
            airport AS a1 ON flight.IDinAirport = a1.ID_airport
        INNER JOIN 
            airport AS a2 ON flight.IDoutAirport = a2.ID_airport
        INNER JOIN 
            airplane ON flight.ID_airplane = airplane.ID_airplane
        INNER JOIN 
            pilot AS pilot1 ON flight.ID_pilot1 = pilot1.ID_Pilot
        INNER JOIN 
            pilot AS pilot2 ON flight.ID_pilot2 = pilot2.ID_Pilot
        WHERE 
        InputDate < '$currentDateTime' AND OutputDate < '$currentDateTime'
        ORDER BY OutputDate";
}
if (isset($_POST['current'])) {
    $sql = "SELECT 
            flight.Number_flight,
            flight.InputDate,
            flight.OutputDate,
            a1.Name AS 'InputAirport',
            a2.Name AS 'OutputAirport',
            airplane.Model AS 'AirplaneModel',
            pilot1.NameP AS 'Pilot1Name',
            pilot1.SurnameP AS 'Pilot1Surname',
            pilot2.NameP AS 'Pilot2Name',
            pilot2.SurnameP AS 'Pilot2Surname'
        FROM 
            flight
        INNER JOIN 
            airport AS a1 ON flight.IDinAirport = a1.ID_airport
        INNER JOIN 
            airport AS a2 ON flight.IDoutAirport = a2.ID_airport
        INNER JOIN 
            airplane ON flight.ID_airplane = airplane.ID_airplane
        INNER JOIN 
            pilot AS pilot1 ON flight.ID_pilot1 = pilot1.ID_Pilot
        INNER JOIN 
            pilot AS pilot2 ON flight.ID_pilot2 = pilot2.ID_Pilot
        WHERE 
        InputDate >= '$currentDateTime' AND OutputDate <= '$currentDateTime'
        ORDER BY OutputDate";
}
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table-style'>"; 
    echo "<tr><th>Номер рейсу</th><th>Дата прибуття</th><th>Дата вильоту</th><th>Аеропорт прибуття</th><th>Аеропорт вильоту</th><th>Літак</th><th>Перший пілот</th><th>Другий пілот</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Number_flight"] . "</td>";
        echo "<td>" . $row["InputDate"] . "</td>";
        echo "<td>" . $row["OutputDate"] . "</td>";
        echo "<td>" . $row["InputAirport"] . "</td>";
        echo "<td>" . $row["OutputAirport"] . "</td>";
        echo "<td>" . $row["AirplaneModel"] . "</td>";
        echo "<td>" . $row["Pilot1Name"] . " " . $row["Pilot1Surname"] . "</td>";
        echo "<td>" . $row["Pilot2Name"] . " " . $row["Pilot2Surname"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Рейсів не знайдено";
}

$connection->close();
?>

</body>
</html>

