<?php
include '../sql/connexion.php';

$name = $_POST['name'];
$photo = $_POST['photo'];
$id_flag = $_POST['flag'];
$id_club = $_POST['club'];
$position = $_POST['position'];
$rating = $_POST['rating'];
$pace = $_POST['pace'];
$shooting = $_POST['shooting'];
$passing = $_POST['passing'];
$dribbling = $_POST['dribbling'];
$defending = $_POST['defending'];
$physical = $_POST['physical'];
// mais pour quoi vous avez shooting comme un champs required ? par contre le diving va etre affecter juste dans on cas ou le position = gk ?
$diving = $handling = $kicking = $reflexes = $speed = $positioning = NULL;
if ($position == "GK") {
    $diving = $_POST['diving'];
    $handling = $_POST['handling'];
    $kicking = $_POST['kicking'];
    $reflexes = $_POST['reflexes'];
    $speed = $_POST['speed'];
    $positioning = $_POST['positioning'];
}

if ($position != "GK") {
    if($name && $photo && $id_flag && $id_club && $position && $rating && $pace && $shooting && $passing && $dribbling && $defending && $physical != "") { // tu sais bien ca veut dire quoi ca ?
        $sql = "INSERT INTO players (nom, photo, id_flag, id_club, position, rating, pace, shooting, passing, dribbling, defending, physical)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_player = $conn->prepare($sql);

        if ($stmt_player === false) {
            die('Error in preparing SQL statement: ' . $conn->error);
        }

        $stmt_player->bind_param("ssiisiiiiiii", $name, $photo, $id_flag, $id_club, $position, $rating, $pace, $shooting, $passing, $dribbling, $defending, $physical);
    }else{
        header("Location:../admin.php?msg= ajouter invalide!");   // l'utilisation de flash messages ou Session ca serai mieux
    }
} else {
    if($name && $photo && $id_flag && $id_club && $position && $rating && $diving && $handling && $kicking && $reflexes && $speed && $positioning != "") {
        $sql = "INSERT INTO players (nom, photo, id_flag, id_club, position, rating, diving, handling, kicking, reflexes, speed, positioning)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_player = $conn->prepare($sql);

        if ($stmt_player === false) {
            die('Error in preparing SQL statement: ' . $conn->error);
        }

        $stmt_player->bind_param("ssiisiiiiiii", $name, $photo, $id_flag, $id_club, $position, $rating, $diving, $handling, $kicking, $reflexes, $speed, $positioning);
    }else{
        header("Location:../admin.php?msg= ajouter invalide!");   
    }
}

if ($stmt_player->execute()) {
    echo "New player added successfully";
    header("Location:../admin.php");// did this works ?!
} else {
    echo "Error: " . $stmt_player->error;
}

$stmt_player->close();
$conn->close();// ta fait une redirect par header location avant close connection
?>
