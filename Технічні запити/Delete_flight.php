<?php
$connection = mysqli_connect('localhost', 'root', '', 'airport');
if ($connection->connect_error) {
    die("Помилка з'єднання: " . $connection->connect_error);
}

$flight_number = mysqli_real_escape_string($connection, $_POST['flight_number']);

$sql_delete_tickets = "DELETE FROM ticket WHERE ID_flight = (SELECT ID_flight FROM flight WHERE Number_flight = '$flight_number')";

if ($connection->query($sql_delete_tickets) === TRUE) {
    $sql_delete_flight = "DELETE FROM flight WHERE Number_flight = '$flight_number'";
    if ($connection->query($sql_delete_flight) === TRUE) {
        echo "Рейс та всі пов'язані з ним білети успішно видалено";
    } else {
        echo "Помилка при видаленні рейсу: " . $connection->error;
    }
} else {
    echo "Помилка при видаленні білетів: " . $connection->error;
}

$connection->close();
?>
