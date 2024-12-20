<?php

include 'connexion.php';

$query = "SELECT * 
          FROM players
          JOIN flag ON players.id_flag = flag.id_flag
          JOIN club ON players.id_club = club.id_club";

$result = $conn->query($query);
$players = $result->fetch_all(MYSQLI_ASSOC);


$flag_sql = "SELECT * FROM flag";
$result_flags = mysqli_query($conn, $flag_sql);
$club_sql = "SELECT * FROM club";
$result_clubs = mysqli_query($conn, $club_sql);

$query_tairran = "SELECT * 
          FROM terrain
          JOIN flag ON players.id_flag = flag.id_flag
          JOIN club ON players.id_club = club.id_club";

$result = $conn->query($query);
$players = $result->fetch_all(MYSQLI_ASSOC);

?>
