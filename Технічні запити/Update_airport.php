<?php 
$mysqli=mysqli_connect("127.0.0.1","root","","airport");
if ($mysqli->connect_errno){die( "Error:".$mysqli->connect_error);}

// Перевірка наявності даних у POST-запиті
if(isset($_POST['Old_airport'], $_POST['new_airport'], $_POST['new_city'], $_POST['new_country'])) {
    $oldAirport = $_POST['Old_airport']; 
    $NewAirport = $_POST['new_airport'];
    $NewCity = $_POST['new_city'];
    $NewCountry = $_POST['new_country'];

    // Підготовка і виконання запиту на оновлення даних
    $stmt = $mysqli->prepare("UPDATE airport SET Name=?, City=?, Country=? WHERE ID_airport=?");
    $stmt->bind_param("sssi", $NewAirport, $NewCity, $NewCountry, $oldAirport);
    $stmt->execute();

    // Вивід повідомлення про успішне редагування
    echo "Аєропорт відредоговано";

    // Закриття підготовленого запиту та з'єднання з базою даних
    $stmt->close();
}
mysqli_close($mysqli);
?>
