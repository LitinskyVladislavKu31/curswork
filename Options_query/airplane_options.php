<?php
$connection = mysqli_connect('localhost', 'root', '', 'airport');
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$sql = "SELECT ID_airplane, Model FROM airplane";
$result = $connection->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<option value='". $row["ID_airplane"] ."'>". $row["Model"] ."</option>";
    }
} else {
    echo "<option value=''>No Airplanes Available</option>";
}
$connection->close();
?>
