<?php
include("../sql/connexion.php");

if (isset($_POST["addclub"])) {
    $nom_club = isset($_POST['nom_club']) ? $_POST['nom_club'] : '';
    $url_club = isset($_POST['url_club']) ? $_POST['url_club'] : '';

    if (!empty($nom_club) && !empty($url_club)) {
        $stmt = $conn->prepare("INSERT INTO club (nom_club, url_club) VALUES (?, ?)");
        $stmt->bind_param("ss", $nom_club, $url_club);

        if ($stmt->execute()) {
            echo "Club data successfully inserted!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
    header("Location: http://localhost/EA_25/flags&clubs.php");
}

if (isset($_POST["addflag"])) {
    $nom_flag = isset($_POST['nom_flag']) ? $_POST['nom_flag'] : '';
    $url_flag = isset($_POST['url_flag']) ? $_POST['url_flag'] : '';

    if (!empty($nom_flag) && !empty($url_flag)) {
        $stmt = $conn->prepare("INSERT INTO flag (nom_flag, url_flag) VALUES (?, ?)");
        $stmt->bind_param("ss", $nom_flag, $url_flag);

        if ($stmt->execute()) {
            echo "flag data successfully inserted!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
    header("Location: http://localhost/EA_25/flags&clubs.php");
}
?>