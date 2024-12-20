<?php 
include '../sql/connexion.php';

if (isset($_GET['id_club'])) {
    $id = $_GET['id_club'];

    $query1 = "DELETE FROM players WHERE id_club = ?";
    $stmt1 = mysqli_prepare($conn, $query1);
    mysqli_stmt_bind_param($stmt1, "i", $id); 
    if(mysqli_stmt_execute($stmt1)){
        $query = "DELETE FROM club WHERE id_club = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id); 
    
    if (mysqli_stmt_execute($stmt)) {
        echo "Player deleted successfully!";
        header("Location:../flags&clubs.php"); 
        exit();
    } else {
        echo "Error deleting player: " . mysqli_error($conn);
    }
    }else{
        $query = "DELETE FROM club WHERE id_club = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id); 
    
    if (mysqli_stmt_execute($stmt)) {
        echo "Player deleted successfully!";
        header("Location:../flags&clubs.php"); 
        exit();
    } else {
        echo "Error deleting player: " . mysqli_error($conn);
    }
    }

    

    mysqli_stmt_close($stmt1);
    mysqli_stmt_close($stmt);
}


if (isset($_GET['id_flag'])) {
    $id = $_GET['id_flag'];

    $query1 = "DELETE FROM players WHERE id_flag = ?";
    $stmt1 = mysqli_prepare($conn, $query1);
    mysqli_stmt_bind_param($stmt1, "i", $id); 
    if(mysqli_stmt_execute($stmt1)){
        $query = "DELETE FROM flag WHERE id_flag = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id); 
    
    if (mysqli_stmt_execute($stmt)) {
        echo "Player deleted successfully!";
        header("Location:../flags&clubs.php"); 
        exit();
    } else {
        echo "Error deleting player: " . mysqli_error($conn);
    }
    }else{
        $query = "DELETE FROM flag WHERE id_flag = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id); 
    
    if (mysqli_stmt_execute($stmt)) {
        echo "Player deleted successfully!";
        header("Location:../flags&clubs.php"); 
        exit();
    } else {
        echo "Error deleting player: " . mysqli_error($conn);
    }
    }

    mysqli_stmt_close($stmt1);
    mysqli_stmt_close($stmt);
}
?>
