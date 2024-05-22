<?php
            $connection = mysqli_connect('localhost', 'root', '', 'airport');
            
            if ($connection->connect_error) {
                die("Помилка з'єднання: " . $connection->connect_error);
            }

            $current_date = date("Y-m-d");

            $sql = "SELECT Number_flight FROM flight WHERE DATE(InputDate) > '$current_date'";
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["Number_flight"] . "'>" . $row["Number_flight"] . "</option>";
                }
            } else {
                echo "<option value=''>Немає доступних рейсів</option>";
            }

            $connection->close();
            ?>
            