<?php
$connection = mysqli_connect('localhost', 'root', '', 'airport');
if ($connection->connect_error) {
    die("помилка з'єднання: " . $connection->connect_error);
}
$input_date = mysqli_real_escape_string($connection, $_POST['input_date']);
$output_date = mysqli_real_escape_string($connection, $_POST['output_date']);
$id_in_airport = mysqli_real_escape_string($connection, $_POST['id_in_airport']);
$id_out_airport = mysqli_real_escape_string($connection, $_POST['id_out_airport']);
$id_airplane = mysqli_real_escape_string($connection, $_POST['id_airplane']);
$id_pilot1 = mysqli_real_escape_string($connection, $_POST['id_pilot1']);
$id_pilot2 = mysqli_real_escape_string($connection, $_POST['id_pilot2']);
$Price = mysqli_real_escape_string($connection, $_POST['Price']);

if ($output_date > $input_date) {
    die("Помилка: Дата прибуття не може бути раніше дати вильоту");
}

if ($id_in_airport == $id_out_airport) {
    die("Помилка: аеропорт вильоту та аеропорт прильоту не можуть збігатися");
}
if ($id_pilot1 == $id_pilot2) {
    die("Помилка: Пілот 1 і Пілот 2 не можуть бути однією і тією ж особою");
}
$current_date = date("dmY");
$sql_count = "SELECT COUNT(*) AS count FROM flight WHERE DATE(FlightDate) = CURDATE()";
$result_count = $connection->query($sql_count);

$sql_check_airplane = "SELECT Status_airplane FROM airplane WHERE ID_airplane = '$id_airplane'";
$result_airplane = $connection->query($sql_check_airplane);

if ($result_airplane->num_rows > 0) {
    $row_airplane = $result_airplane->fetch_assoc();
    if ($row_airplane['Status_airplane'] != 'готовий') {
        die("Помилка: Цей літак не може використовуватися у рейсі, його статус не 'готовий'");
    }
} else {
    die("Помилка: літак з таким ID не знайдено");
}

if ($result_count->num_rows > 0) {
    $row = $result_count->fetch_assoc();
    $count_today = $row["count"] + 1;
} else {
    $count_today = 1; 
}
$flight_number = (int)($current_date . str_pad($count_today, 2, "0", STR_PAD_LEFT));
$sql_insert = "INSERT INTO flight (Number_flight, InputDate, OutputDate, FlightDate, IDinAirport, IDoutAirport, ID_airplane, ID_pilot1, ID_pilot2, Price)
VALUES ('$flight_number', '$input_date', '$output_date', CURDATE(), '$id_in_airport', '$id_out_airport', '$id_airplane', '$id_pilot1', '$id_pilot2', '$Price')";
if ($connection->query($sql_insert) === TRUE) {
    echo "Новий рейс успішно створено";
} else {
    echo "Error: " . $sql_insert . "<br>" . $connection->error;
}
$connection->close();
?>

