<?php 
$mysqli = mysqli_connect("127.0.0.1", "root", "", "airport");
if ($mysqli->connect_errno) {
    die("Error: " . $mysqli->connect_error);
}

if (isset($_POST['pilot_id'], $_POST['NewName'], $_POST['NewSurname'], $_POST['NewDate'], $_POST['NewLicense'], $_POST['NewContact'])) {
    $pilot_id = $_POST['pilot_id']; 
    $NewName = $_POST['NewName'];
    $NewSurname = $_POST['NewSurname'];
    $NewDate = $_POST['NewDate'];
    $NewLicense = $_POST['NewLicense'];
    $NewQualification = $_POST['NewQualification']; 
    $NewContact = $_POST['NewContact'];  

    $stmt = $mysqli->prepare("UPDATE pilot SET NameP=?, SurnameP=?, BirthDate=?, License=?, Qualification=?, Contact_detals=? WHERE ID_Pilot=?");
    $stmt->bind_param("ssssssi", $NewName, $NewSurname, $NewDate, $NewLicense, $NewQualification, $NewContact, $pilot_id);
    $stmt->execute();

    echo "Пілот відредагований";

    $stmt->close();
}
mysqli_close($mysqli);
?>

