<?php
include("./sql/action.php");
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EA FC 25</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link rel="stylesheet" href="./style/style.cSs?v=3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .dashboard-stats {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            align-items: center;
        }

        .dashboard-container {
            display: flex;
            position: relative;
            width: 100%;
        }

        .stat-box {
            display: flex;
            justify-content: space-around;
            align-items: start;
            flex-wrap: wrap;
            width: 100%;
        }

        .div_tab {
            width: 45%;
        }

        form {
            width: 45%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        form input {
            width: 80% !important;
        }

        .mb-3 {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .action {
            width: 120px !important;
        }

        .sidebar ul li {
            width: 100% !important;
        }
    </style>
</head>

<body>
    <?php

    if (isset($_GET['msg'])) {
        echo "<script>alert('" . addslashes($_GET['msg']) . "');</script>";
    }
    ?>
    <i class="fa-solid fa-square-caret-down fa-rotate-270 open" onclick="burger_close()"></i>
    <i class="fa-solid fa-square-caret-down fa-rotate-90 close" style="display: none;" onclick="burger_open()"></i>
    <div class="sidebar" style="display: none;">
        <ul>
            <a href="index.php">
                <li>Acceuil</li>
            </a>
            <a href="admin.php">
                <li>Administator</li>
            </a>
            <a href="./flags&clubs.php">
                <li>flags & clubs</li>
            </a>
        </ul>
        <form action="#" method="post">
            <button submit class="logaout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</button>
        </form>
    </div>
    <main>
        <div class="container mt-4">
            <div class="dashboard-container">
                <div class="content">
                    <div class="dashboard-stats">

                        <!-- Flag Form -->
                        <form action="./php/ajouter_flags&clubs.php" method="POST" class="mb-4">
                            <div class="mb-3">
                                <input type="text" name="nom_flag" class="form-control" placeholder="Nom de flag"
                                    required>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="url_flag" class="form-control" placeholder="Url de flag"
                                    required>
                            </div>
                            <button type="submit" name="addflag" class="btn btn-primary">Envoyer</button>
                        </form>
                        <form action="./php/ajouter_flags&clubs.php" method="POST" class="mb-4">
                            <div class="mb-3">
                                <input type="text" name="nom_club" class="form-control" placeholder="Nom de club">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="url_club" class="form-control" placeholder="Url de club">
                            </div>
                            <button type="submit" name="addclub" class="btn btn-primary">Envoyer</button>
                        </form>
                        <div class="stat-box">
                            <div class="div_tab">
                                <h2 class="mb-3">Table des Flags</h2>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nom de Flag</th>
                                            <th>URL de Flag</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($result_flags as $flag) { ?>
                                            <tr>
                                                <td><?php echo $flag['nom_flag']; ?></td>
                                                <td><img src="<?php echo $flag['url_flag']; ?>" alt="Flag" width="50"></td>
                                                <td class="action">
                                                    <a href="./php/update_flags.php?id_flag=<?php echo $flag['id_flag']; ?>"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                                    </a>
                                                    <a href="./php/deletclub&flag.php?id_flag=<?php echo $flag['id_flag']; ?>"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fa-solid fa-trash"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="div_tab">
                                <!-- Club Table -->
                                <h2 class="mb-3">Table des Clubs</h2>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nom de Club</th>
                                            <th>URL de Club</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($result_clubs as $club) { ?>
                                            <tr>
                                                <td><?php echo $club['nom_club']; ?></td>
                                                <td><img src="<?php echo $club['url_club']; ?>" alt="Club" width="50"></td>
                                                <td class="action">
                                                    <a href="./php/update_clubs.php?id_club=<?php echo $club['id_club']; ?>"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                                    </a>
                                                    <a href="./php/deletclub&flag.php?id_club=<?php echo $club['id_club']; ?>"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fa-solid fa-trash"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="js/main.js?v=3"></script>
</body>

</html>