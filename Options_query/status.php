<?php
 $connection = mysqli_connect('localhost', 'root', '', 'airport');                    // Підключення до бази даних
 if ($connection->connect_error) {
   die("Connection failed: " . $connection->connect_error);                         // Перевірка з'єднання
   }
  $sql = "SELECT status FROM status";                                                  // Отримання всіх статусів з таблиці status
  $result = $connection->query($sql);
if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
echo "<option value='". $row["status"] ."'>". $row["status"] ."</option>";        // Виведення опцій випадаючого списку
}
} else {
echo "<option value=''>No Status Available</option>";
}
$connection->close();                                                               // Закриття з'єднання
 ?>
 