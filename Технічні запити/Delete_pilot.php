<?php 
$mysqli = mysqli_connect("localhost", "root", "", "airport");
if ($mysqli->connect_errno) {
    die("Error:" . $mysqli->connect_error);
}

if (isset($_POST['delete_pilot'])) {
    $Pilot = $_POST['delete_pilot'];

    $stmt_check_flights = $mysqli->prepare("SELECT COUNT(*) FROM flight WHERE ID_pilot2 = ?");
    $stmt_check_flights->bind_param("i", $Pilot);
    $stmt_check_flights->execute();
    $stmt_check_flights->bind_result($flight_count);
    $stmt_check_flights->fetch();
    $stmt_check_flights->close();

    if ($flight_count > 0) {
        echo "Пілот приймає участь в рейсі";
    } else {
        $stmt_delete_pilot = $mysqli->prepare("DELETE FROM pilot WHERE ID_Pilot = ?");
        $stmt_delete_pilot->bind_param("i", $Pilot);
        $stmt_delete_pilot->execute();
        $stmt_delete_pilot->close();

        $reset_auto_increment_query = "ALTER TABLE pilot AUTO_INCREMENT = 1";
        $mysqli->query($reset_auto_increment_query);

        echo "Пілот видалений";
    }
} else {
    echo "Помилка: не передано значення delete_pilot";
}

mysqli_close($mysqli);
?>

