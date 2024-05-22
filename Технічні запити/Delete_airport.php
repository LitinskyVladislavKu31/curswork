<?php 
$mysqli = mysqli_connect("127.0.0.1", "root", "", "airport");
if ($mysqli->connect_errno) {
    die("Error:" . $mysqli->connect_error);
}

if (isset($_POST['delete_airport'])) {
    $Airport = $_POST['delete_airport'];

    // Перевірка наявності прив'язаних записів у таблиці рейсів
    $stmt_check_flights = $mysqli->prepare("SELECT COUNT(*) FROM flight WHERE IDinAirport=?");
    $stmt_check_flights->bind_param("i", $Airport);
    $stmt_check_flights->execute();
    $stmt_check_flights->bind_result($flight_count);
    $stmt_check_flights->fetch();
    $stmt_check_flights->close();

    // Якщо є прив'язані записи, виводимо повідомлення про помилку
    if ($flight_count > 0) {
        echo "Помилка: Аеропорт вказано у рейсі";
    } else {
        // Якщо немає прив'язаних записів, видаляємо аеропорт
        $stmt_delete_airport = $mysqli->prepare("DELETE FROM airport WHERE ID_airport=?");
        $stmt_delete_airport->bind_param("i", $Airport);
        $stmt_delete_airport->execute();
        $stmt_delete_airport->close();

        // Скидання автоінкременту на 1
        $reset_auto_increment_query = "ALTER TABLE airport AUTO_INCREMENT = 1";
        $mysqli->query($reset_auto_increment_query);

        echo "Аеропорт видалений";
    }
} else {
    echo "Помилка: не передано значення delete_airport";
}

mysqli_close($mysqli);
?>
