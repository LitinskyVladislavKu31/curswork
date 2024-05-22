<?php
$connection = mysqli_connect('localhost', 'root', '', 'airport');
if ($connection->connect_error) {
    die("помилка з'єднання: " . $connection->connect_error);
}
$sql = "SELECT ID_Pilot, CONCAT(NameP, ' ', SurnameP) AS FullName FROM pilot";
$result = $connection->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<option value='". $row["ID_Pilot"] ."'>". $row["FullName"] ."</option>";
    }
} else {
    echo "<option value=''>No Pilots Available</option>";
}
$connection->close();
?>

