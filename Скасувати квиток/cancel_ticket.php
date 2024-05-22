<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Скасувати квиток</title>
    <link rel="stylesheet" href="../Стилі/style.css">
    <style>  .main-content {max-width: 600px; background-color: rgba(85, 163, 236, 0.65); color: #fff; }   </style>
</head>

<body>
    <header>
        <h1>Придбати квиток</h1>
    </header>

    <nav>
        <ul>
            <li><a href="../Головна сторінка/MainWWW.php">Головна сторінка</a></li>
            <li><a href="../WWW.php">Технічні запити</a></li>
            <li><a href="WWW3.php">Статистічні запити</a></li>
        </ul>
        <br><br>
    </nav>

    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " class="main-content">
    <h2 style="text-align: center; margin-left: -25px;">Скасувати квиток</h2>    
    <table>
        <tr>
            <td>Виберіть рейс:</td>
            <td>
                <select id="flight" name="flight" required style="width: 376px;">
                <option value="" selected disabled>Оберіть рейс</option>
                <?php include '../Options_query/flight_options.php'; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Ім'я пасажира:</td>
            <td><input type="text" id="name" name="name"  style="width: 368px;"></td>
        </tr>
        <tr>
            <td>Прізвище пасажира:</td>
            <td><input type="text" id="surname" name="surname" required style="width: 368px;"><td>
        </tr>
        <tr>
            <td>Номер місця:</td>
            <td><input type="number" id="seat" name="seat" required style="width: 368px;"></td>
        </tr>
        </table>
        <button type="submit" name="submit">Скасувати квиток</button>
    </form>

    <br><button type="button" onclick="window.location.href='../Квиток/WWW2.php'" style="display: block; margin: auto; background-color: rgba(85, 163, 236, 0.65); color: white;  font-size: 16px; border: none; border-radius: 8px; padding: 8px 8px 8px;">Придбати квиток</button>

    <?php
    if (isset($_POST['submit'])) {
        $flightId = $_POST['flight'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $seat = $_POST['seat'];

        $connection = mysqli_connect('localhost', 'root', '', 'airport');

        if ($connection === false) {
            die("Помилка з'єднання: " . mysqli_connect_error());
        }

        $sql_check_ticket = "SELECT ID_ticket FROM ticket WHERE ID_flight = '$flightId' AND NamePas = '$name' AND SurnamePas = '$surname' AND seat = '$seat'";
        $result_check_ticket = mysqli_query($connection, $sql_check_ticket);

        if (mysqli_num_rows($result_check_ticket) > 0) {
            $row = mysqli_fetch_assoc($result_check_ticket);
            $ticketId = $row['ID_ticket'];

            $sql_cancel_ticket = "DELETE FROM ticket WHERE ID_ticket = '$ticketId'";
            if (mysqli_query($connection, $sql_cancel_ticket)) {
                echo "<p>Квиток скасовано успішно.</p>";
            } else {
                echo "Помилка: " . $sql_cancel_ticket . "<br>" . mysqli_error($connection);
            }
        } else {
            echo "<p>Квиток не знайдено для вказаного пасажира, рейсу та місця.</p>";
        }

        mysqli_close($connection);

        // Перенаправлення на цю ж сторінку методом GET
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
    ?>
    <footer><p> </p></footer>
</body>
</html>

