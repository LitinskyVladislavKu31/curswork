<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Технічні запити</title>
    <link rel="stylesheet" href="../Стилі/style.css">
    <style>
        table { border: none; background-color: #90bafa; border-radius: 20px; }
        td { width: 150px; }
    </style>
</head>

<body>
    <header>
        <h1>Робота з Базою даних</h1>
    </header>

    <nav>
        <ul>
            <li><a href="../Головна сторінка/MainWWW.php">Головна сторінка</a></li>
            <li><a href="../Квиток/WWW2.php">Квиток</a></li>
            <li><a href="../Статистичні запити/WWW3.php">Статистічні запити</a></li>
        </ul>
    </nav>

    <!-- L -->
    <div class="left_column">
        <form action="insert_airport.php" method="post" class="query-container">
            <h2>Додати аеропорт</h2>
            <table>
                <tr>
                    <td>Назва аеропорта</td>
                    <td><input type="text" id="name" name="name" required style="width: 179px;"></td>
                </tr>
                <tr>
                    <td>Місто</td>
                    <td><input type="text" id="city" name="city" required style="width: 179px;"></td>
                </tr>
                <tr>
                    <td>Країна</td>
                    <td><input type="text" id="country" name="country" required style="width: 179px;"></td>
                </tr>
            </table>
            <div style="text-align: center; margin-top: 10px;">
                <input type="submit" value="Додати аєропорт">
            </div>
        </form>
        <br>
        <form action="Update_airport.php" method="post" class="query-container">
            <h2>Змінити дані аеропорта</h2>
            <table>
                <tr>
                    <td>Назва аеропорта</td>
                    <td><select name="Old_airport" required style="width: 187px;">
                            <?php include '../Options_query/airport_options.php'; ?>
                        </select>
                    </td>
                </tr>
            </table>
            <p>Нові дані</p>
            <table>
                <tr>
                    <td>Назва аеропорта</td>
                    <td><input type="text" name="new_airport" required style="width: 183px;"></td>
                </tr>
                <tr>
                    <td>Місто</td>
                    <td><input type="text" name="new_city" required style="width: 183px;"></td>
                </tr>
                <tr>
                    <td>Країна</td>
                    <td><input type="text" name="new_country" required style="width: 183px;"></td>
                </tr>
            </table>
            <div style="text-align: center; margin-top: 10px;">
                <input type="submit" , value="Змінити">
            </div>
        </form>
        <br>
        <form action="Delete_airport.php" method='post' class="query-container">
            <h2>Видалити аеропорт</h2>
            <table>
                <tr>
                    <td>Назва аеропорта</td>
                    <td>
                        <select name="delete_airport" required style="width: 185px;">
                            <?php include '../Options_query/airport_options.php'; ?>
                        </select>
                    </td>
                </tr>
            </table>
            <div style="text-align: center; margin-top: 10px;">
                <input type='submit' value='Видалити'>
            </div>
        </form>
        <br>
        <form action="all_airport.php" method="post" class="query-container">
            <h2>Переглянути аеропорти</h2>
            <div style="text-align: center; margin-top: 10px;">
                <input type="submit" value="Пошук">
            </div>
        </form>
       
    </div>
    <!-- C -->
    <div class="center_column">
        <form action="insert_airplane.php" method="post" class="query-container">
            <h2>Додати літак</h2>
            <table>
                <tr>
                    <td>Модель літака</td>
                    <td><input type="text" id="model" name="model" required style="width: 179px;"></td>
                </tr>
                <tr>
                    <td>Номер літака:</td>
                    <td><input type="text" id="number" name="number" required style="width: 179px;"></td>
                </tr>
                <tr>
                    <td>Стан літака</td>
                    <td>
                        <select id="status" name="status" required style="width: 187px;">
                            <?php include '../Options_query/status.php'; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Вміст літака</td>
                    <td><input type="number" id="capacity" name="capacity" required style="width: 179px;"></td>
                </tr>
            </table>
            <div style="text-align: center; margin-top: 10px;">
                <input type="submit" value="Додати літак">
            </div>
        </form>
        <br>
        <form action="Update_airplane.php" method="post" class="query-container">
            <h2>Змінити дані літака</h2>
            <table>
                <tr>
                    <td style="width: 145px;">Літак:</td>
                    <td><select name="Model+Number" required style="width: 187px;">
                            <?php include '../Options_query/airplane_options.php'; ?>
                        </select>
                    </td>
                </tr>
            </table>
            <p>Нові дані</p>
            <table>
                <tr>
                    <td>Модель літака</td>
                    <td><input type="text" name="NewModel" required style="width: 183px;"></td>
                </tr>
                <tr>
                    <td>Номер літака</td>
                    <td><input type="text" name="NewNumber" required style="width: 183px;"></td>
                </tr>
                <tr>
                    <td>Статус літака</td>
                    <td><select name="Newstatus" required style="width: 190px;">
                            <?php include '../Options_query/status.php'; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Вміст літака</td>
                    <td><input type="number" name="NewCapacity" required style="width: 183px;"></td>
                </tr>
            </table>
            <div style="text-align: center; margin-top: 10px;">
                <input type="submit" value="Змінити">
            </div>
        </form>
        <br>
        <form action="Delete_airplane.php" method='post' class="query-container">
            <h2>Видалити літак</h2>
            <table>
                <tr>
                    <td style="width: 107px;">Літак:</td>
                    <td>
                        <select name="delete_airplane">
                            <?php include '../Options_query/airplane_options.php'; ?>
                        </select>
                    </td>
                </tr>
            </table>
            <div style="text-align: center; margin-top: 10px;">
                <input type='submit' value='Видалити'>
            </div>
        </form>
        <br>
        <form action="all_airplane.php" method="post" class="query-container">
            <h2>Переглянути літаки</h2>
            <div style="text-align: center; margin-top: 10px;">
                <input type="submit" value="Пошук">
            </div>
        </form>

        <br>
        <form action="insert_status.php" method="post" class="query-container">
            <h2>Додати статус</h2>
            <table>
                <tr>
                    <td style="width: 107px;">Статус:</td>
                    <td><input type="text" id="status" name="status" required style="width: 180px;"></td>
                </tr>
            </table>
            <div style="text-align: center; margin-top: 10px;">
                <input type="submit" value="Додати статус">
            </div>
        </form>
    </div>

    <!-- C II -->
    <div class="center_column">
        <form action="Add_pilot.php" method="post" class="query-container">
            <h2>Додати пілота</h2>
            <table>
                <tr>
                    <td>Ім'я пілота</td>
                    <td><input type="text" name="nameP" required style="width: 175px;"></td>
                </tr>
                <tr>
                    <td>Прізвище пілота</td>
                    <td><input type="text" name="surnameP" required style="width: 175px;"></td>
                </tr>
                <tr>
                    <td>Дата народження</td>
                    <td><input type="date" name="dateB" required style="width: 178px;"></td>
                </tr>
                <tr>
                    <td>Ліцензія:</td>
                    <td><input type="text" name="license" required style="width: 175px;"></td>
                </tr>
                <tr>
                    <td>Кваліфікація</td>
                    <td>
                        <select id="qualification" name="qualification" required style="width: 183px;">
                            <?php include '../Options_query/Qualification.php'; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Контактні дані</td>
                    <td><input type="text" name="contact" required style="width: 175px;"></td>
                </tr>
            </table>
            <div style="text-align: center; margin-top: 10px;">
                <input type='submit' value='Додати пілота'>
            </div>
        </form>
        <br>
        <form action="Update_pilot.php" method="post" class="query-container">
            <h2>Змінити дані пілота</h2>
            <table>
                <tr>
                    <td style="width: 145px;">Пілот</td>
                    <td><select name="pilot_id" required style="width: 181px;">
                            <?php include '../Options_query/pilot_options.php'; ?>
                        </select>
                    </td>
                <tr>
            </table>
            <p>Нові дані</p>
            <table>
                <tr>
                    <td>Ім'я</td>
                    <td><input type="text" name="NewName" required style="width: 177px;"></td>
                </tr>
                <tr>
                    <td>Прізвище</td>
                    <td><input type="text" name="NewSurname" required style="width: 177px;"></td>
                </tr>
                <tr>
                    <td>Дата народження</td>
                    <td><input type="date" name="NewDate" required style="width: 179px;"></td>
                </tr>
                <tr>
                    <td>Ліцензія</td>
                    <td><input type="text" name="NewLicense" required style="width: 177px;"></td>
                </tr>
                <tr>
                    <td>Кваліфікація</td>
                    <td><select name="NewQualification" required style="width: 185px;">
                            <?php include '../Options_query/Qualification.php'; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Контактні дані</td>
                    <td><input type="text" name="NewContact" required style="width: 176px;"></td>
                </tr>
            </table>
            <div style="text-align: center; margin-top: 10px;">
                <input type="submit" value="Змінити">
            </div>
        </form>
        <br>
        <form action="Delete_pilot.php" method='post' class="query-container">
            <h2>Звільнити пілота</h2>
            <table>
                <tr>
                    <td style="width: 130px;">Пілот</td>
                    <td>
                        <select name="delete_pilot">
                            <?php include '../Options_query/pilot_options.php'; ?>
                        </select>
                    </td>
                </tr>
            </table>
            <div style="text-align: center; margin-top: 10px;">
                <input type='submit' value='Видалити'>
            </div>
        </form>
        <br>
        <form action="all_pilot.php" method="post" class="query-container">
            <h2>Переглянути пілотів</h2>
            <div style="text-align: center; margin-top: 10px; ">
                <input type="submit" value="Пошук">
            </div>
        </form>
        <br>
        <form action="add_Qualification.php" method="post" class="query-container">
            <h2>Додати кваліфікацію</h2>
            <table>
                <tr>
                    <td style="width: 130px;">Кваліфікація</td>
                    <td><input type="text" id="qualification" name="qualification" required style="width: 180px;"></td>
                </tr>
            </table>
            <div style="text-align: center; margin-top: 10px;">
                <input type="submit" value="Додати кваліфікацію">
            </div>
        </form>
    </div>


    <!-- R -->
    <div class="right_column">
        <form action="Autonumberforflight.php" method="post"  class="query-container">
            <h2>Додати рейс</h2>
            <table>
                <tr>
                    <td>Дата вильоту</td>
                    <td><input type="datetime-local" id="output_date" name="output_date" required style="width: 183px;">
                    </td>
                </tr>
                <tr>
                    <td>Дата прибуття</td>
                    <td><input type="datetime-local" id="input_date" name="input_date" required style="width: 183px;">
                    </td>
                </tr>
                <tr>
                    <td>Аеропорт прибуття</td>
                    <td>
                        <select id="id_in_airport" name="id_in_airport" required style="width: 188px;">

                            <?php include '../Options_query/airport_options.php'; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Аеропорт вильоту</td>
                    <td>
                        <select id="id_out_airport" name="id_out_airport" required style="width: 188px;">
                            <?php include '../Options_query/airport_options.php'; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Літак</td>
                    <td>
                        <select id="id_airplane" name="id_airplane" required style="width: 188px;">
                            <?php include '../Options_query/airplane_options.php'; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Перший пілот</td>
                    <td>
                        <select id="id_pilot1" name="id_pilot1" required style="width: 188px;">
                            <?php include '../Options_query/pilot_options.php'; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Другий пілот</td>
                    <td>
                        <select id="id_pilot2" name="id_pilot2" required style="width: 188px;">
                            <?php include '../Options_query/pilot_options.php'; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Вартість білету</td>
                    <td><input type="number" id="Price" name="Price" required style="width: 180px;"></td>
                </tr>
            </table>
            <div style="text-align: center; margin-top: 10px;">
                <input type="submit" value="Додати рейс">
            </div>
        </form>
        <br>
        <form action="Update_flight.php" method="POST" class="query-container">
            <h2>Редагувати рейс</h2>
            <table>
                <tr>
                    <td style="width: 148px;">Номер рейсу</td>
                    <td>
                        <select name="flight_number" id="flight_number" required style="width: 188px;">
                            <?php include '../Options_query/number_flight_options.php'; ?>
                        </select>
                    </td>
                </tr>
            </table>
            <p>Нові дані:</p>
            <table>
                <tr>
                    <td>Дата вильоту</td>
                    <td><input type="datetime-local" id="input_date" name="input_date" required style="width: 183px;">
                    </td>
                </tr>
                <tr>
                    <td>Дата прибуття</td>
                    <td><input type="datetime-local" id="output_date" name="output_date" required style="width: 183px;">
                    </td>
                </tr>
                <tr>
                    <td>Аеропорт прибуття</td>
                    <td>
                        <select id="id_in_airport" name="id_in_airport" required style="width: 188px;">
                            <?php include '../Options_query/airport_options.php'; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Аеропорт вильоту</td>
                    <td>
                        <select id="id_out_airport" name="id_out_airport" required style="width: 188px;">
                            <?php include '../Options_query/airport_options.php'; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Літак</td>
                    <td>
                        <select id="id_airplane" name="id_airplane" required style="width: 188px;">
                            <?php include '../Options_query/airplane_options.php'; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Перший пілот</td>
                    <td>
                        <select id="id_pilot1" name="id_pilot1" required style="width: 188px;">
                            <?php include '../Options_query/pilot_options.php'; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Другий пілот</td>
                    <td>
                        <select id="id_pilot2" name="id_pilot2" required style="width: 188px;">
                            <?php include '../Options_query/pilot_options.php'; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Вартість білету</td>
                    <td>
                        <input type="number" id="Price" name="Price" required style="width: 183px;">
                    </td>
                </tr>
            </table>
            <div style="text-align: center; margin-top: 10px;">
                <input type="submit" value="Змінити">
            </div>
        </form>
        <br>
        <form action="Delete_flight.php" method="POST" class="query-container">
            <h2>Скасувати рейс</h2>
            <table>
                <tr>
                    <td style="width: 145px;">Номер рейсу</td>
                    <td>
                        <select name="flight_number" id="flight_number" required style="width: 188px;">
                            <?php include '../Options_query/number_flight_options.php'; ?>
                        </select>
                    </td>
                </tr>
            </table>
            <div style="text-align: center; margin-top: 10px;">
                <input type="submit" value="Видалити рейс">
            </div>
        </form>
        <br>


       <form action="all_flight_test.php" method="post" class="query-container">
    <h2>Пошук рейсів</h2>
        <div style="text-align: center; margin-top: 10px;">
        <input type="submit" name="past" value="Минулі">
        <input type="submit" name="current" value="Тривалі">
        <input type="submit" name="future" value="Майбутні">
        </div>
    </form>
    </div>

    <footer><p> </p></footer>
   
</body>
</html>