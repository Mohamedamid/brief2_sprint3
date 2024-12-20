<?php 
include '../sql/connexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM players WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        echo "Player deleted successfully!";
        header("Location:../admin.php"); 
    } else {
        echo "Error deleting player: " . mysqli_error($conn);
    }
}
?>