<?php
include("./sql/action.php");
?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EA FC 25</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link rel="stylesheet" href="./style/style.cSs?v=3">
    <style>
        body {
            background-color: aliceblue;
        }

        #page-content-wrapper {
            padding: 20px;
        }

        .sidebar ul li {
            width: 100% !important;
        }

        .div_f_c {
            display: flex;
            justify-content: space-evenly;
            align-items: start;
            flex-wrap: wrap;
            width: 100%;
        }

        .table {
            width: 45%;
            margin-block: 0px;
        }

        table {
            margin-block: 40px;
        }
    </style>
</head>

<body>
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
        <div id="page-content-wrapper">
            <!-- Content Section -->
            <div class="container mt-5">
                <div class="row">
                    <!-- Card for Total Clubs -->
                    <div class="col-md-6 col-lg-3 mb-3">
                        <div class="card text-white bg-primary">
                            <div class="card-body">
                                <h5 class="card-title">عدد الأندية</h5>
                                <p class="card-text">15</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card for Total Players -->
                    <div class="col-md-6 col-lg-3 mb-3">
                        <div class="card text-white bg-success">
                            <div class="card-body">
                                <h5 class="card-title">عدد اللاعبين</h5>
                                <p class="card-text">250</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card for Pending Requests -->
                    <div class="col-md-6 col-lg-3 mb-3">
                        <div class="card text-white bg-warning">
                            <div class="card-body">
                                <h5 class="card-title">طلبات الانتظار</h5>
                                <p class="card-text">5</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card for Messages -->
                    <div class="col-md-6 col-lg-3 mb-3">
                        <div class="card text-white bg-danger">
                            <div class="card-body">
                                <h5 class="card-title">الرسائل الجديدة</h5>
                                <p class="card-text">3</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Content -->
                <div class="row">
                    <table class="player-table" border="1">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Nom</th>
                                <th>Position</th>
                                <th>Flag</th>
                                <th>Club</th>
                                <th>Rat</th>
                                <th>Pac</th>
                                <th>Sho</th>
                                <th>Pas</th>
                                <th>Dri</th>
                                <th>Def</th>
                                <th>Phy</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($players as $player) {
                                if ($player['position'] !== 'GK') {
                                    ?>
                                    <tr>
                                        <td><img src="<?php echo $player['photo']; ?>" alt="Photo" width="50"></td>
                                        <td><?php echo $player['nom']; ?></td>
                                        <td><?php echo $player['position']; ?></td>
                                        <td><img src="<?php echo $player['url_flag']; ?>" alt="Flag" width="25"></td>
                                        <td><img src="<?php echo $player['url_club']; ?>" alt="Club" width="50"></td>
                                        <td><?php echo $player['rating']; ?></td>
                                        <td><?php echo $player['pace']; ?></td>
                                        <td><?php echo $player['shooting']; ?></td>
                                        <td><?php echo $player['passing']; ?></td>
                                        <td><?php echo $player['dribbling']; ?></td>
                                        <td><?php echo $player['defending']; ?></td>
                                        <td><?php echo $player['physical']; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <table class="goalkeeper-table" border="1">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Nom</th>
                                <th>Position</th>
                                <th>Flag</th>
                                <th>Club</th>
                                <th>Rat</th>
                                <th>Div</th>
                                <th>Han</th>
                                <th>Kic</th>
                                <th>Ref</th>
                                <th>Spe</th>
                                <th>Pos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($players as $player) {
                                if ($player['position'] === 'GK') {
                                    ?>
                                    <tr>
                                        <td><img src="<?php echo $player['photo']; ?>" alt="Photo" width="50"></td>
                                        <td><?php echo $player['nom']; ?> </td>
                                        <td><?php echo $player['position']; ?> </td>
                                        <td><img src="<?php echo $player['url_flag']; ?>" alt="Drapeau" width="25"></td>
                                        <td><img src="<?php echo $player['url_club']; ?>" alt="Club" width="50"></td>
                                        <td><?php echo $player['rating']; ?> </td>
                                        <td><?php echo $player['diving']; ?> </td>
                                        <td><?php echo $player['handling']; ?> </td>
                                        <td><?php echo $player['kicking']; ?> </td>
                                        <td><?php echo $player['reflexes']; ?> </td>
                                        <td><?php echo $player['speed']; ?> </td>
                                        <td><?php echo $player['positioning']; ?> </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="div_f_c">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nom de Flag</th>
                                    <th>URL de Flag</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result_flags as $flag) { ?>
                                    <tr>
                                        <td><?php echo $flag['nom_flag']; ?></td>
                                        <td><img src="<?php echo $flag['url_flag']; ?>" alt="Flag" width="50"></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <!-- Club Table -->
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nom de Club</th>
                                    <th>URL de Club</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result_clubs as $club) { ?>
                                    <tr>
                                        <td><?php echo $club['nom_club']; ?></td>
                                        <td><img src="<?php echo $club['url_club']; ?>" alt="Club" width="50"></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <!-- تضمين JavaScript من Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/main.js?v=3"></script>
</body>

</html>