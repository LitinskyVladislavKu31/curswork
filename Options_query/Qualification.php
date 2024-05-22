<?php
$connection = mysqli_connect("localhost", "root", "", "airport");

if ($connection->connect_errno) {
    die("Помилка підключення до бази даних: " . $connection->connect_error);
}

$result = $connection->query("SELECT qualifications FROM qualification");

if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['qualifications'] . "'>" . $row['qualifications'] . "</option>";
    }
    $result->free();
}

$connection->close();
?>

    