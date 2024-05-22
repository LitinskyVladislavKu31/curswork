<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Головна сторінка: розклад рейсів</title>
    <link rel="stylesheet" href="../Стилі/style.css">
    <style>
        .main-content {
            max-width: 1200px;
        }
        
    </style>
</head>

<body>
    <header>
    <h1 style="font-style: italic; font-family: 'Arial Black', Arial, sans-serif; font-size: 32px;">SKY TRACK</h1>
    </header>

    <nav>
        <ul>
            <li><a href="../Технічні запити/WWW.php">Технічні запити</a></li>
            <li><a href="../Квиток/WWW2.php">Квиток</a></li>
            <li><a href="../Статистичні запити/WWW3.php">Статистічні запити</a></li>
        </ul>
    </nav>

   
    <div class="main-content">
        <h1 style='text-align: center;'>Розклад рейсів</h1>
        <?php
// Підключення до бази даних
$connection = mysqli_connect('localhost', 'root', '', 'Airport');

// Перевірка підключення
if ($connection === false) {
    die("Помилка підключення: " . mysqli_connect_error());
}

// Формування дат на кожні 5 днів
$dates = array();
for ($i = 0; $i < 5; $i++) {
    $dates[] = date('Y-m-d', strtotime("+ $i days"));
}

// Запит до бази даних для вибірки рейсів на кожну з цих дат
$flight_results = array();
foreach ($dates as $date) {
    $sql = "SELECT flight.Number_flight, flight.InputDate, flight.OutputDate, 
                departure.Name AS OutputAirport, arrival.Name AS InputAirport
            FROM flight 
            INNER JOIN airport AS departure ON flight.IDoutAirport = departure.ID_airport
            INNER JOIN airport AS arrival ON flight.IDinAirport = arrival.ID_airport
            WHERE DATE_FORMAT(OutputDate, '%Y-%m-%d') = '$date' ORDER BY OutputDate";
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $flight_results[$date][] = $row;
        }
    }
}

// Перевірка наявності результатів
if (!empty($flight_results)) {
    // Виведення результатів
    echo "<div style='text-align: center;'>";
    foreach ($flight_results as $date => $flights) {
        echo "<h3>Рейси на дату: $date</h3>";
        echo "<table border='1'  >";
        echo "<tr><th style='width: 10%;'>Рейс</th><th style='width: 20%;'>Час вильоту</th><th style='width: 20%;'>Час прибуття</th><th style='width: 25%;'>Відправлення</th><th style='width: 25%;'>Прибуття</th></tr>";
        foreach ($flights as $flight) {
            // Форматируем только время для поля OutputDate
            $outputTime = date('H:i', strtotime($flight['OutputDate']));
            echo "<tr>";
            echo "<td>" . $flight['Number_flight'] . "</td>";
            echo "<td>" .  $outputTime . "</td>";
            echo "<td>" .  $flight['InputDate'] . "</td>";
            echo "<td>" .  $flight['OutputAirport'] . "</td>";
            echo "<td>" .  $flight['InputAirport'] . "</td>";
            echo "</tr>";
        }
        echo "</table><br>";
    }
    echo "</div>";
} else {
    echo "<p>На наступних 5 днів рейсів немає</p>";
}

// Закриття з'єднання
mysqli_close($connection);
?>
    </div>
    <footer><p> </p></footer>
</body>

</html>
