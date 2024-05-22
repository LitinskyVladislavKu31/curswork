<?php
// Підключення до бази даних
$connection = mysqli_connect('localhost', 'root', '', 'airport');

// Перевірка підключення
if ($connection->connect_error) {
    die("Помилка з'єднання: " . $connection->connect_error);
}

// Встановлення часової зони на UTC
$connection->query("SET time_zone = '+00:00'");

// SQL запит для видалення білетів, пов'язаних з рейсами, дата прибуття яких була раніше поточної дати
$sql_delete_tickets = "DELETE FROM ticket WHERE ID_flight IN 
                        (SELECT ID_flight FROM flight WHERE InputDate < CURDATE())";

// Виконання SQL запиту для видалення білетів
if ($connection->query($sql_delete_tickets) === TRUE) {
    // SQL запит для видалення рейсів, дата прибуття яких була раніше поточної дати
    $sql_delete_flights = "DELETE FROM flight WHERE InputDate < CURDATE()";

    // Виконання SQL запиту для видалення рейсів
    if ($connection->query($sql_delete_flights) === TRUE) {
        echo "Рейси, дата прибуття яких була раніше поточної дати, успішно видалено";
    } else {
        echo "Помилка при видаленні рейсів: " . $connection->error;
    }
} else {
    echo "Помилка при видаленні білетів: " . $connection->error;
}

// Закриття підключення до бази даних
$connection->close();
?>