<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Статистичні запити</title>
    <link rel="stylesheet" href="../Стилі/style.css">
        <style>
        table {border: none; background-color: #90bafa;  border-radius: 20px;}  
        canvas { margin: 20px auto; display: block;}     
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <header>
        <h1>Статистичні запити</h1>
    </header>

    <nav>
        <ul>
            <li><a href="../Головна сторінка/MainWWW.php">Головна сторінка</a></li>
            <li><a href="../Квиток/WWW2.php">Квиток</a></li>
            <li><a href="../Технічні запити/WWW.php">Технічні запити</a></li>
        </ul>
    </nav>


    <div class="left_column">
    <!--Пошук пілотів,які приймали участь у рейсі -->
    <form action="statistics_pilot.php" method="post" class="query-container">
     <h2>Рейси, в яких приймав участь пілот</h2>
        <table>
        <tr>
            <td>Пілот</td>
            <td>
                <select name="pilot" required style="width: 100%;">
                    <?php include '../Options_query/pilot_options.php'; ?>
                </select>
            </td>
        </tr>
    </table>
        <div style="text-align: center; margin-top: 10px;">
        <input type="submit" value="Пошук">
        </div>
    </form>
    </div>

    <div class="center_column">
    <form action="statistics_airplane.php" method="post" class="query-container">
        <h2>Рейси, в яких приймав участь літак</h2>
        <table>
        <tr>
            <td>Літак</td>
            <td>
                <select name="airplane" required style="width: 100%;">
                    <?php include '../Options_query/airplane_options.php'; ?>
                </select>
            </td>
        </tr>
    </table> 
        <div style="text-align: center; margin-top: 10px;">
        <input type="submit" value="Пошук">
        </div>
    </form>
    </div>
    
    <div class="center_column">
    <form action="statistics_airport.php" method="post" class="query-container">
    <h2>Аеропорти за рейсами</h2>
        <table>
        <tr>
            <td>Аеропорт</td>
            <td>
                <select name="airport_in" required style="width: 100%;">
                    <?php include '../Options_query/airport_options.php'; ?>
                </select>
            </td>
        </table>
        <div style="text-align: center; margin-top: 10px;">
        <input type="submit" name="departures" value="З якого вилетів">
        <input type="submit" name="arrivals" value="В який прибув">
        </div>
    </form>
    </div>

    
    <div class="right_column">
    <form action="clear.php" method="post" class="query-container">
                <h2>Очистити БД</h2>
                <div style="text-align: center; margin-top: 10px;">
                <input type="submit" value="Очистити">
                </div>
        </form>
<br>
    <form action="clear_history_flights.php" method="post" class="query-container">
            <h2>Видалити історію рейсів</h2>
            <div style="text-align: center; margin-top: 10px;">
            <input type="submit" value="Очистити">
            </div>
    </form>

    </div>



<footer><p> </p></footer>
</body>
</html>
