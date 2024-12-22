<?php

include 'connexion.php';

$query = "SELECT * 
          FROM players
          JOIN flag ON players.id_flag = flag.id_flag
          JOIN club ON players.id_club = club.id_club";

$result = $conn->query($query);
$players = $result->fetch_all(MYSQLI_ASSOC);

$query_count = "SELECT count(id) as total_players
                FROM players WHERE position != 'GK'";
$result_count = mysqli_query($conn, $query_count);

if ($result_count) {
    $row = mysqli_fetch_assoc($result_count);
    $total_players = $row['total_players'];
} else {
    echo "Error fetching player count: " . mysqli_error($conn);
}

$query_GK = "SELECT count(id) as total_GK
                FROM players WHERE position = 'GK'";
$result_GK = mysqli_query($conn, $query_GK);

if ($result_GK) {
    $row = mysqli_fetch_assoc($result_GK);
    $total_GK = $row['total_GK'];
} else {
    echo "Error fetching player count: " . mysqli_error($conn);
}

$query_flags = "SELECT count(id_flag) as total_flags
                FROM flag";
$result_flags = mysqli_query($conn, $query_flags);

if ($result_flags) {
    $row = mysqli_fetch_assoc($result_flags);
    $total_flags = $row['total_flags'];
} else {
    echo "Error fetching player flags: " . mysqli_error($conn);
}

$query_clubs = "SELECT count(id_club) as total_clubs
                FROM club";
$result_club = mysqli_query($conn, $query_clubs);

if ($result_count) {
    $row = mysqli_fetch_assoc($result_club);
    $total_clubs = $row['total_clubs'];
} else {
    echo "Error fetching player count: " . mysqli_error($conn);
}

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
