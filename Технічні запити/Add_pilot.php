<?php
$connection = mysqli_connect('localhost', 'root', '', 'airport');
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$Name_pilot=$_POST['nameP'];
$Surname_pilot=$_POST['surnameP'];
$DateB=$_POST['dateB'];
$License=$_POST['license'];
$Qualification = $_POST['qualification'];
$Contact_details=$_POST['contact'];
$sql = "INSERT INTO pilot (NameP,SurnameP,BirthDate,License,Qualification,Contact_detals) VALUES ('$Name_pilot','$Surname_pilot','$DateB','$License','$Qualification','$Contact_details')";
if ($connection->query($sql) === TRUE) {
    echo "Дані успішно додані до таблиці pilot";
} else {
    echo "Помилка: " . $sql . "<br>" . $connection->error;
}
$connection->close();
?>

