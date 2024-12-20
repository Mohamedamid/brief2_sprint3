<?php
include '../sql/connexion.php';

if (isset($_POST['up'])) {
    $id = $_GET['id_club'];
    $nom = $_POST['nom_club'];
    $url = $_POST['url_club'];

    $query = "UPDATE club SET nom_club = ?, url_club = ? WHERE id_club = ?";

    if ($stmt = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param($stmt, "ssi", $nom, $url, $id);

        if (mysqli_stmt_execute($stmt)) {
            echo "Club updated successfully!";
            header("Location: ../flags&clubs.php");
            exit();
        } else {
            echo "Error updating club: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing the statement: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Club</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Update Club</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nom_club" class="form-label">nom club</label>
                <input type="text" class="form-control" name="nom_club" id="nom_club" required>
            </div>
            <div class="mb-3">
                <label for="url_club" class="form-label">Url club</label>
                <input type="text" class="form-control" name="url_club" id="url_club" required>
            </div>
            <button type="submit" name="up" class="btn btn-primary">Update Club</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
