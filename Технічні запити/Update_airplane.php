<?php 
$mysqli = mysqli_connect("127.0.0.1", "root", "", "airport");
if ($mysqli->connect_errno) {
    die("Error: " . $mysqli->connect_error);
}

// Перевірка наявності даних у POST-запиті
if (isset($_POST['Model+Number'],$_POST['NewModel'],$_POST['NewNumber'],$_POST['Newstatus'],$_POST['NewCapacity'])) {
    $oldModelNumber = $_POST['Model+Number'];  
    $NewModel = $_POST['NewModel'];
    $NewNumber = $_POST['NewNumber'];
    $NewStatus = $_POST['Newstatus'];
    $NewCapacity = $_POST['NewCapacity']; 

    // Підготовка і виконання запиту на оновлення даних
    $stmt = $mysqli->prepare("UPDATE airplane SET Model=?, Number=?, Status_airplane=?, Capacity=? WHERE ID_airplane=?");
    $stmt->bind_param("ssssi", $NewModel, $NewNumber, $NewStatus, $NewCapacity, $oldModelNumber);
    $stmt->execute();

    // Вивід повідомлення про успішне редагування
    echo "Літак відредаговано";

    // Закриття підготовленого запиту та з'єднання з базою даних
    $stmt->close();
}
mysqli_close($mysqli);
?>
