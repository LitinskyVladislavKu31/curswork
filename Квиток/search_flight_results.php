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
if(isset($_POST['search'])) {
    $IDinAirport = $_POST['IDinAirport'];
    $IDoutAirport = $_POST['IDoutAirport'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    $connection = mysqli_connect('localhost', 'root', '', 'Airport');

    if ($connection === false) {
        die("Помилка з'єднання: " . mysqli_connect_error());
    }

    $sql_search_flights = "SELECT f.*, a.capacity, COUNT(t.ID_ticket) AS occupied_seats
    FROM flight f
    JOIN airplane a ON f.ID_airplane = a.ID_airplane
    LEFT JOIN ticket t ON f.ID_flight = t.ID_flight
    WHERE f.IDinAirport = '$IDinAirport' 
    AND f.IDoutAirport = '$IDoutAirport' 
    AND f.OutputDate > NOW()
    GROUP BY f.ID_flight";

    $result_search_flights = mysqli_query($connection, $sql_search_flights);
    ?>
            <?php
            echo "<table class='table-style'>"; 
            echo "<tr><th>Номер рейсу</th><th>Дата прибуття</th><th>Дата вильоту</th><th>Ціна квитка</th><th>Кількість місць</th><th>Придбати</th></tr>";
            while ($row = mysqli_fetch_assoc($result_search_flights)) {
                $available_seats = $row['capacity'] - $row['occupied_seats'];
                echo "<tr>";
                echo "<td>" . $row['Number_flight'] . "</td>";
                echo "<td>" . $row['InputDate'] . "</td>";
                echo "<td>" . $row['OutputDate'] . "</td>";
                echo "<td>" . $row['Price'] . "</td>";
                echo "<td>" . $available_seats . "</td>";
                
                if($available_seats > 0) {
                    echo "<td><a href='purchase_ticket.php?flight=" . $row['ID_flight'] . "'>Купити квиток</a></td>";
                } else {
                    echo "<td>немає місць</td>";
                }
                
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <?php
    mysqli_close($connection);

} else {
    echo "Помилка";
}
?>
