<?php
$connection = mysqli_connect('localhost', 'root', '', 'airport');

if ($connection->connect_error) {
    die("Помилка з'єднання: " . $connection->connect_error);
}

$qualification = $_POST['qualification'];

$sql = "INSERT INTO qualification (qualifications) VALUES ('$qualification')";

if ($connection->query($sql) === TRUE) {
    echo "Нову кваліфікацію успішно додано";
} else {
    echo "Помилка: " . $sql . "<br>" . $connection->error;
}

$connection->close();
?>

