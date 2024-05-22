<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пошук рейса</title>
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
            <li><a href="../Технічні запити/WWW.php">Технічні запити</a></li>
            <li><a href="../Статистичні запити/WWW3.php">Статистічні запити</a></li>
        </ul>
        <br><br>
    </nav>

<form method="post" action="search_flight_results.php" class="main-content">
    <h2 style="text-align: center; margin-left: -25px;">Пошук рейса</h2>
    <table>
        <tr>
            <td>Аеропорт прибуття:</td>
            <td>
                <select name="IDinAirport" required style="width: 350px;">
                    <option value="" selected disabled>Оберіть аєропорт</option>
                    <?php include '../Options_query/airport_options.php'; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Аеропорт вильоту:</td>
            <td>
                <select name="IDoutAirport" required style="width: 350px;">
                    <option value="" selected disabled>Оберіть аєропорт</option>
                    <?php include '../Options_query/airport_options.php'; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Діапазон часу:</td>
            <td>
                <input type="date" name="startDate" style="width: 168px;"> 
                <input type="date" name="endDate" style="width: 168px;">
            </td>
        </tr>
    </table>
    <button type="submit" name="search"  >Знайти рейс</button>

</form>

<br><button type="button" onclick="window.location.href='../Скасувати квиток/cancel_ticket.php'" style="display: block; margin: auto; background-color: rgba(85, 163, 236, 0.65); color: white;  font-size: 16px; border: none; border-radius: 8px; padding: 8px 8px 8px;">Скасувати квиток</button>

<footer><p> </p></footer>
</body>
</html>
