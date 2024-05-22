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

    $sql_check_seat = "SELECT ID_ticket FROM ticket WHERE ID_flight = '$flightId' AND seat = '$seat'"; 
    $result_check_seat = mysqli_query($connection, $sql_check_seat);
    if (mysqli_num_rows($result_check_seat) > 0) {
        echo "<p>!-!</p>";
    } else {
        $sql_add_ticket = "INSERT INTO ticket (ID_flight, NamePas, SurnamePas, seat) VALUES ('$flightId', '$name', '$surname', '$seat')";   
        if (mysqli_query($connection, $sql_add_ticket)) {
            header("Location: purchase_ticket.php?success=true");    
            exit();
        } else {
            echo "Помилка з'єднання: " . $sql_add_ticket . "<br>" . mysqli_error($connection);
        }
    }
    mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Придбати квиток</title>
    <link rel="stylesheet" href="../Стилі/style.css">
    <style>  
        .main-content {max-width: 550px; }
        #seatMatrix {
    max-width: 600px;
    margin: 0 auto; 
}

    </style>
</head>
<body>
    
<header>
        
</header>

<nav>
    <ul>
        <li><a href="../Головна сторінка/MainWWW.php">Головна сторінка</a></li>
        <li><a href="../Квиток/WWW2.php">Квиток</a></li>
    </ul>
</nav>

<form method="post" class="main-content">
    <h2 class="centered">Дані для квитка</h2>
    <table>
        <tr>
            <td required style="width: 160px;">Рейс:</td>
            <td>
                <select id="flightSelect" name="flight" required style="width: 248px;">
                    <option value="" selected disabled>оберіть рейс</option>
                    <?php
                    $connection = mysqli_connect('localhost', 'root', '', 'airport');

                    if ($connection === false) {
                        die("помилка з'єднання: " . mysqli_connect_error());
                    }

                    $selected_flight = isset($_GET['flight']) ? $_GET['flight'] : '';

                    $sql = "SELECT flight.ID_flight, flight.Number_flight, flight.OutputDate, airplane.Capacity, GROUP_CONCAT(ticket.seat) AS sold_seats
                    FROM flight 
                    LEFT JOIN airplane ON flight.ID_airplane = airplane.ID_airplane 
                    LEFT JOIN ticket ON flight.ID_flight = ticket.ID_flight 
                    WHERE flight.OutputDate > NOW() 
                    GROUP BY flight.ID_flight
                    HAVING COUNT(ticket.ID_ticket) < airplane.Capacity";
            

                    $result = mysqli_query($connection, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $available_seats = array();
                        if (!in_array('1', explode(',', $row['sold_seats']))) {
                            $available_seats[] = 1;
                        }
                        for ($i = 2; $i <= $row['Capacity']; $i++) {
                            if (!in_array(strval($i), explode(',', $row['sold_seats']))) {
                                $available_seats[] = $i;
                            }
                        }
                        echo "<option value='" . $row['ID_flight'] . "' data-total-seats='" . $row['Capacity'] . "' data-sold-seats='" . $row['sold_seats'] . "'";
                        if ($row['ID_flight'] == $selected_flight) {
                            echo " selected";
                        }
                        echo ">" . $row['Number_flight'] . "</option>";

                    }

                    mysqli_close($connection);
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Ім'я пасажира:</td>
            <td><input type="text" id="name" name="name" required style="width: 240px;"></td>
        </tr>
        <tr>
            <td>Прізвище пасажира:</td>
            <td><input type="text" id="surname" name="surname" required style="width: 240px;"></td>
        </tr>
    </table>

    <div id="seatMatrix"></div>
    <input type="hidden" id="selectedSeat" name="seat">
    <br>
    
    <button type="submit" name="submit">Купити</button>

</form>

<footer>
   
</footer>

<script>
function showSeatMatrix() {
    var selectedFlight = document.getElementById("flightSelect").value;
    var totalSeats = parseInt(document.getElementById("flightSelect").options[document.getElementById("flightSelect").selectedIndex].getAttribute('data-total-seats'));
    var soldSeats = document.getElementById("flightSelect").options[document.getElementById("flightSelect").selectedIndex].getAttribute('data-sold-seats').split(',');
    var seatMatrixDiv = document.getElementById("seatMatrix");
    seatMatrixDiv.innerHTML = "";
    var table = document.createElement("table");
    var row;
    for (var i = 1; i <= totalSeats; i++) {
        if (i % 9 === 1) {
            row = document.createElement("tr");
            table.appendChild(row);
        }
        if (i % 3 === 1) {
            row = document.createElement("td");
            table.appendChild(row);

        }
        var cell = document.createElement("td");
        cell.textContent = i;
        cell.className = "seatCell";
        if (soldSeats.includes(String(i))) {
            cell.classList.add("soldSeatCell");
        } else {
            cell.addEventListener("click", function() {
                var selectedSeat = document.querySelector(".selectedSeat");
                if (selectedSeat !== null) {
                    selectedSeat.classList.remove("selectedSeat");
                }
                this.classList.add("selectedSeat");
                document.getElementById("selectedSeat").value = this.textContent;
            });
        }
        row.appendChild(cell);
    }
    seatMatrixDiv.appendChild(table);
}
document.addEventListener("DOMContentLoaded", function() {
    showSeatMatrix();
});
document.getElementById("flightSelect").addEventListener("change", function() {
    showSeatMatrix();
});
document.querySelector("form").addEventListener("submit", function(event) {
    var selectedSeat = document.getElementById("selectedSeat").value;
    if (!selectedSeat) {
        event.preventDefault(); 
        alert("Оберіть місце");
    } else {
        console.log("Дані для купівлі:");
        console.log("Рейс:", document.getElementById("flightSelect").value);
        console.log("Ім'я пасажира:", document.getElementById("name").value);
        console.log("Прізвище пасажира:", document.getElementById("surname").value);
        console.log("Місце:", selectedSeat);
    }
});
</script>

</body>
</html>
