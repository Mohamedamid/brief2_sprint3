<?php
include '../sql/connexion.php';

if (isset($_POST['up'])) {
    $id = $_GET['id_flag'];
    $nom = $_POST['nom_flag'];
    $url = $_POST['url_flag'];

    $query = "UPDATE flag SET nom_flag = ?, url_flag = ? WHERE id_flag = ?";

    if ($stmt = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param($stmt, "ssi", $nom, $url, $id);

        if (mysqli_stmt_execute($stmt)) {
            echo "flag updated successfully!";
            header("Location: ../flags&clubs.php");
            exit();
        } else {
            echo "Error updating flag: " . mysqli_error($conn);
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
    <title>Update flag</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Update flag</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nom_flag" class="form-label">Nom flag</label>
                <input type="text" class="form-control" name="nom_flag" id="nom_flag" required>
            </div>
            <div class="mb-3">
                <label for="url_flag" class="form-label">Url flag</label>
                <input type="text" class="form-control" name="url_flag" id="url_flag" required>
            </div>
            <button type="submit" name="up" class="btn btn-primary">Update flag</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
