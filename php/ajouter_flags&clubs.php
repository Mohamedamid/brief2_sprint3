<?php
// les caractère comme & n'est pas recommandé dans les noms de fichiers, car il peut être interprété comme un opérateur( notamment dans les URL )
include("../sql/connexion.php");

if (isset($_POST["addclub"])) {
    // Retrieve the form values
    $nom_club = isset($_POST['nom_club']) ? $_POST['nom_club'] : '';
    $url_club = isset($_POST['url_club']) ? $_POST['url_club'] : '';

    // Basic validation
    if (!empty($nom_club) && !empty($url_club)) {
        // global $conn;
        // Prepare SQL query to insert data into club table
        $stmt = $conn->prepare("INSERT INTO club (nom_club, url_club) VALUES (?, ?)");
        $stmt->bind_param("ss", $nom_club, $url_club); // "ss" means both parameters are strings

        // Execute the query
        if ($stmt->execute()) {
            echo "Club data successfully inserted!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } 
    // n'est pas recommandé d'utiliser echo ou print avant header, sauf si tu va utiliser ob_start() & ob_clean()
    header("Location: http://localhost/EA_25/flags&clubs.php");
}
if (isset($_POST["addflag"])) {
    // Retrieve the form values
    $nom_flag = isset($_POST['nom_flag']) ? $_POST['nom_flag'] : '';
    $url_flag = isset($_POST['url_flag']) ? $_POST['url_flag'] : '';

    // Basic validation
    if (!empty($nom_flag) && !empty($url_flag)) {
        // Prepare SQL query to insert data into flag table
        $stmt = $conn->prepare("INSERT INTO flag (nom_flag, url_flag) VALUES (?, ?)");
        $stmt->bind_param("ss", $nom_flag, $url_flag); // "ss" means both parameters are strings

        // Execute the query
        if ($stmt->execute()) {
            echo "flag data successfully inserted!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } 
    header("Location: http://localhost/EA_25/flags&clubs.php");

}
?>