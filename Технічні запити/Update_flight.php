<?php
$connection = mysqli_connect('localhost', 'root', '', 'airport');
if ($connection->connect_error) {
    die("Помилка з'єднання: " . $connection->connect_error);
}
$flight_number = mysqli_real_escape_string($connection, $_POST['flight_number']);
$input_date = mysqli_real_escape_string($connection, $_POST['input_date']);
$output_date = mysqli_real_escape_string($connection, $_POST['output_date']);
$id_in_airport = mysqli_real_escape_string($connection, $_POST['id_in_airport']);
$id_out_airport = mysqli_real_escape_string($connection, $_POST['id_out_airport']);
$id_airplane = mysqli_real_escape_string($connection, $_POST['id_airplane']);
$id_pilot1 = mysqli_real_escape_string($connection, $_POST['id_pilot1']);
$id_pilot2 = mysqli_real_escape_string($connection, $_POST['id_pilot2']);
$Price = mysqli_real_escape_string($connection, $_POST['Price']);

if ($output_date < $input_date) {
    die("Помилка: Дата прибуття не може бути раніше дати вильоту");
}

if ($id_in_airport == $id_out_airport) {
    die("Помилка: аеропорт вильоту та аеропорт прильоту не можуть збігатися");
}
if ($id_pilot1 == $id_pilot2) {
    die("Помилка: Пілот 1 і Пілот 2 не можуть бути однією і тією ж особою");
}

$sql_check_airplane = "SELECT Status_airplane FROM airplane WHERE ID_airplane = '$id_airplane'";
$result_airplane = $connection->query($sql_check_airplane);

if ($result_airplane->num_rows > 0) {
    $row_airplane = $result_airplane->fetch_assoc();
    if ($row_airplane['Status_airplane'] != 'готовий') {
        die("Помилка: цей літак не може використовуватися у рейсі, оскільки його статус не 'готовий'");
    }
} else {
    die("Помилка: літак з таким ID не знайдено");
}

$sql_update = "UPDATE flight SET InputDate='$input_date', OutputDate='$output_date', IDinAirport='$id_in_airport', IDoutAirport='$id_out_airport', ID_airplane='$id_airplane', ID_pilot1='$id_pilot1', ID_pilot2='$id_pilot2', Price='$Price' WHERE Number_flight='$flight_number'";

if ($connection->query($sql_update) === TRUE) {
    echo "Рейс успішно оновлено";
} else {
    echo "Помилка при оновленні рейсу: " . $connection->error;
}

$connection->close();
?>
