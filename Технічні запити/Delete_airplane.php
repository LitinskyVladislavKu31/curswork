<?php 
$mysqli = mysqli_connect("127.0.0.1", "root", "", "airport");
if ($mysqli->connect_errno) {
    die("Error:" . $mysqli->connect_error);
}

if (isset($_POST['delete_airplane'])) {
    $Plane = $_POST['delete_airplane'];

    // Перевірка наявності прив'язаних записів у таблиці рейсів
    $stmt_check_flights = $mysqli->prepare("SELECT COUNT(*) FROM flight WHERE ID_airplane = ?");
    $stmt_check_flights->bind_param("i", $Plane);
    $stmt_check_flights->execute();
    $stmt_check_flights->bind_result($flight_count);
    $stmt_check_flights->fetch();
    $stmt_check_flights->close();

    // Якщо є прив'язані записи, виводимо повідомлення про помилку
    if ($flight_count > 0) {
        echo "Літак приймає участь в рейсі";
    } else {
        // Видалення літака, якщо немає прив'язаних записів
        $stmt_delete_airplane = $mysqli->prepare("DELETE FROM airplane WHERE ID_airplane = ?");
        $stmt_delete_airplane->bind_param("i", $Plane);
        $stmt_delete_airplane->execute();
        $stmt_delete_airplane->close();

        // Скидання автоінкременту на 1
        $reset_auto_increment_query = "ALTER TABLE airplane AUTO_INCREMENT = 1";
        $mysqli->query($reset_auto_increment_query);

        echo "Літак видалений";
    }
} else {
    echo "Помилка: не передано значення delete_airplane";
}

mysqli_close($mysqli);
?>
