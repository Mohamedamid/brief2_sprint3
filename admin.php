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
    <style>
    .ajouter{
        background-color: #265da5;
        color: white;
        font-weight: bold;
        border: none;
        border-radius: 10px;
        height: 30px;
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
            <a href="index.php"><li>Acceuil</li></a>
            <a href="admin.php"><li>Administator</li></a>
            <a href="./flags&clubs.php"><li>flags & clubs</li></a>
        </ul>
        <form action="#" method="post">
            <button submit class="logaout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</button>
        </form>
    </div>
    <main>
        <div class="dashboard-container">
            <div class="content">
                <div class="dashboard-stats">
                    <div class="stat-box">
                    <form action="./php/ajouter.php" method="post" class="info_input">
                            <input class="input name" name="name" type="text" placeholder="nom">
                            <input class="input photo" name="photo" type="text" placeholder="photo">
                            <select name="flag" id="" class="flag">
                                <?php while ($flag = mysqli_fetch_assoc($result_flags)): ?>
                                    <option value="<?php echo $flag['id_flag']; ?>"><?php echo $flag['nom_flag']; ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                            <select name="club" id="" class="club">
                                <?php while ($club = mysqli_fetch_assoc($result_clubs)): ?>
                                    <option value="<?php echo $club['id_club']; ?>"><?php echo $club['nom_club']; ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                            <select name="position" id="position" class="position">
                                <option value="">Choix position joueur</option>
                                <option value="GK">GK (Gardien de but)</option>
                                <option value="LB">LB (Latéral gauche)</option>
                                <option value="CB1">CB1 (Défenseur central 1)</option>
                                <option value="CB2">CB2 (Défenseur central 2)</option>
                                <option value="RB">RB (Latéral droit)</option>
                                <option value="CM">CM (Milieu de terrain)</option>
                                <option value="CM1">CM1 (Milieu de terrain 1)</option>
                                <option value="CM2">CM2 (Milieu de terrain 2)</option>
                                <option value="LW">LW (Ailier gauche)</option>
                                <option value="RW">RW (Ailier droit)</option>
                                <option value="ST">ST (Attaquant)</option>
                            </select>
                            <input class="input rating" name="rating" type="number" min="20" max="100" placeholder="Rating">
                            <div class="joueur">
                                <input class="input pace" name="pace" type="number" min="0" max="100" placeholder="Pace">
                                <input class="input shooting" name="shooting" type="number" min="0" max="100"
                                    placeholder="Shooting">
                                <input class="input passing" name="passing" type="number" min="0" max="100"
                                    placeholder="Passing">
                                <input class="input dribbling" name="dribbling" type="number" min="0" max="100"
                                    placeholder="Dribbling">
                                <input class="input defending" name="defending" type="number" min="0" max="100"
                                    placeholder="Defending">
                                <input class="input physical" name="physical" type="number" min="0" max="100"
                                    placeholder="Physical">
                            </div>
                            <div class="GK" style="display:none;">
                                <input class="input" name="diving" type="number" min="0" max="100" placeholder="Diving">
                                <input class="input" name="handling" type="number" min="0" max="100"
                                    placeholder="Handling">
                                <input class="input" name="kicking" type="number" min="0" max="100"
                                    placeholder="Kicking">
                                <input class="input" name="reflexes" type="number" min="0" max="100"
                                    placeholder="Reflexes">
                                <input class="input" name="speed" type="number" min="0" max="100" placeholder="Speed">
                                <input class="input" name="positioning" type="number" min="0" max="100"
                                    placeholder="Positioning">
                            </div>
                            <input class="input ajouter" type="submit"  value="Ajouter">
                        </form>
                        <h2>Table des joueurs de champ</h2>
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
                                    <th>Action</th>
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
                                            <td>
                                                <a href="./php/update.php?id=<?php echo $player['id']; ?>">
                                                <i class="fa-solid fa-pen-to-square acti"></i></a> 
                                                <a href="./php/delet.php?id=<?php echo $player['id']; ?>">
                                                <i class="fa-solid fa-trash acti"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <h2>Table des Gardiens</h2>
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
                                    <th>Action</th>
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
                                            <td>
                                                <a href="./php/update.php?id=<?php echo $player['id']; ?>">
                                                <i class="fa-solid fa-pen-to-square acti"></i></a> 
                                                <a href="./php/delet.php?id=<?php echo $player['id']; ?>">
                                                <i class="fa-solid fa-trash acti"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="./js/main.js?v=3"></script>
</body>

</html>