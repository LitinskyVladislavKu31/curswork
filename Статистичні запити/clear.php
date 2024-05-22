<?php
$connection = mysqli_connect('localhost', 'root', '', 'airport');

if ($connection === false) {
    die("Помилка підключення: " . mysqli_connect_error());
}

// Масив з назвами таблиць
$tables = ['ticket', 'flight', 'airport', 'pilot', 'airplane', 'qualification', 'status'];

// Виконання SQL запиту для видалення усіх записів з кожної таблиці та перезавантаження автоінкременту
foreach ($tables as $table) {
    $sql_delete = "DELETE FROM $table";
    $sql_reset_auto_increment = "ALTER TABLE $table AUTO_INCREMENT = 1";

    // Видалення усіх записів з таблиці
    if (mysqli_query($connection, $sql_delete)) {
        echo "Дані з таблиці '$table' видалено.<br>";
    } else {
        echo "Помилка при видаленні даних з таблиці '$table': " . mysqli_error($connection) . "<br>";
    }

    // Перезавантаження автоінкременту для таблиці
    if (mysqli_query($connection, $sql_reset_auto_increment)) {
        echo "Автоінкремент для таблиці '$table' перезавантажено.<br>";
    } else {
        echo "Помилка при перезавантаженні автоінкременту для таблиці '$table': " . mysqli_error($connection) . "<br>";
    }
}

mysqli_close($connection);
?>
