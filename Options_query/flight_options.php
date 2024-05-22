<?php
            $connection = mysqli_connect('localhost', 'root', '', 'airport');

            if ($connection === false) {
                die("Помилка з'єднання: " . mysqli_connect_error());
            }

            $sql = "SELECT ID_flight, Number_flight FROM flight";
            $result = mysqli_query($connection, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['ID_flight'] . "'>" . $row['Number_flight'] . "</option>";
            }

            mysqli_close($connection);
            ?>