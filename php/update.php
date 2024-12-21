<?php
include("../sql/action.php");// pour qu'il raison tu va loader la liste des joueurs, les flags et les clubs dans cette page ?
include("../sql/connexion.php");


if (isset($_GET['id'])) {
    $player_id = $_GET['id'];

    $query = "SELECT * FROM players 
              JOIN flag ON players.id_flag = flag.id_flag
              JOIN club ON players.id_club = club.id_club 
              WHERE players.id = $player_id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $player = mysqli_fetch_assoc($result);
    } else {
        echo "Error fetching player data: " . mysqli_error($conn);
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $photo = mysqli_real_escape_string($conn, $_POST['photo']);
    $flag_id = (int) $_POST['flag'];
    $club_id = (int) $_POST['club'];
    $position = $_POST['position'];
    $rating = (int) $_POST['rating'];
    $pace = (int) $_POST['pace'];
    $shooting = (int) $_POST['shooting'];
    $passing = (int) $_POST['passing'];
    $dribbling = (int) $_POST['dribbling'];
    $defending = (int) $_POST['defending'];
    $physical = (int) $_POST['physical'];

    // Add GK stats if position is GK
    if ($position == 'GK') {
        $diving = (int) $_POST['diving'];
        $handling = (int) $_POST['handling'];
        $kicking = (int) $_POST['kicking'];
        $reflexes = (int) $_POST['reflexes'];
        $speed = (int) $_POST['speed'];
        $positioning = (int) $_POST['positioning'];
    }

    // Update the player in the database
    $update_query = "UPDATE players SET 
                    nom = '$name', 
                    photo = '$photo', 
                    id_flag = '$flag_id', 
                    id_club = '$club_id', 
                    position = '$position', 
                    rating = '$rating', 
                    pace = '$pace', 
                    shooting = '$shooting', 
                    passing = '$passing', 
                    dribbling = '$dribbling', 
                    defending = '$defending', 
                    physical = '$physical'";
    // donc, pour un goalkeeper il va avoir les statistiques d'un joueur et aussi d'un gk ? dans tous les cas on aura pace, shooting... et les autres statistiques d'un joueur
    // If it's a goalkeeper, include the extra stats
    if ($position == 'GK') {
        $update_query .= ", diving = '$diving', 
                            handling = '$handling', 
                            kicking = '$kicking', 
                            reflexes = '$reflexes', 
                            speed = '$speed', 
                            positioning = '$positioning'";
    }

    // Add the WHERE condition to ensure the correct player is updated
    $update_query .= " WHERE id = $player_id";

    // Execute the query and check for errors
    if (mysqli_query($conn, $update_query)) {
        // Redirect to the main page after successful update
        header("Location: ../admin.php");
        exit;
    } else {
        echo "Error updating player: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Player</title>

    <!-- Bootstrap CDN for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        /* Full viewport height and center content */
        html,
        body {
            height: 100vh;
            /* Ensure body and html are full height */
            margin: 0;
            /* Remove default margin */
            display: flex;
            justify-content: center;
            /* Horizontally center */
            align-items: center;
            /* Vertically center */
            background-color: #f8f9fa;
            /* Light background for contrast */
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 100%;
        }

        /* Optional: Add some padding to the form */
        form {
            margin-top: 20px;
            padding: 20px;
            border-radius: 8px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            width: 85% !important;
        }

        .mb-3 {
            margin: 10px;
            width: 200Px;
        }

        form label,
        form input {
            width: 200px !important;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h2>Modifier les information joueur</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input class="form-control" id="name" name="name" type="text" value="<?php echo $player['nom']; ?>"
                    placeholder="Name" required>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input class="form-control" id="photo" name="photo" type="text" value="<?php echo $player['photo']; ?>"
                    placeholder="Photo" required>
            </div>
            <div class="mb-3">
                <label for="flag" class="form-label">Select Flag</label>
                <select name="flag" id="flag" class="form-select" required>
                    <option value="">Select Flag</option>
                    <?php
                    $flags_query = "SELECT * FROM flag";
                    $flags_result = mysqli_query($conn, $flags_query);
                    while ($flag = mysqli_fetch_assoc($flags_result)) {
                        $selected = ($flag['id_flag'] == $player['id_flag']) ? 'selected' : '';
                        echo "<option value='{$flag['id_flag']}' $selected>{$flag['url_flag']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="club" class="form-label">Select Club</label>
                <select name="club" id="club" class="form-select" required>
                    <option value="">Select Club</option>
                    <?php
                    $clubs_query = "SELECT * FROM club";
                    $clubs_result = mysqli_query($conn, $clubs_query);
                    while ($club = mysqli_fetch_assoc($clubs_result)) {
                        $selected = ($club['id_club'] == $player['id_club']) ? 'selected' : '';
                        echo "<option value='{$club['id_club']}' $selected>{$club['url_club']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Position</label>
                <select name="position" id="position" class="form-select" required>
                    <option value="GK" <?php echo ($player['position'] == 'GK') ? 'selected' : ''; ?>>GK (Goalkeeper)
                    </option>
                    <option value="LB" <?php echo ($player['position'] == 'LB') ? 'selected' : ''; ?>>LB (Left-back)
                    </option>
                    <option value="CB1" <?php echo ($player['position'] == 'CB1') ? 'selected' : ''; ?>>CB1 (Center-back
                        1)</option>
                    <option value="CB2" <?php echo ($player['position'] == 'CB2') ? 'selected' : ''; ?>>CB2 (Center-back
                        2)</option>
                    <option value="RB" <?php echo ($player['position'] == 'RB') ? 'selected' : ''; ?>>RB (Right-back)
                    </option>
                    <option value="CM" <?php echo ($player['position'] == 'CM') ? 'selected' : ''; ?>>CM (Center-midfield)
                    </option>
                    <option value="CM1" <?php echo ($player['position'] == 'CM1') ? 'selected' : ''; ?>>CM1 (Central
                        midfielder 1)</option>
                    <option value="CM2" <?php echo ($player['position'] == 'CM2') ? 'selected' : ''; ?>>CM2 (Central
                        midfielder 2)</option>
                    <option value="LW" <?php echo ($player['position'] == 'LW') ? 'selected' : ''; ?>>LW (Left-wing)
                    </option>
                    <option value="RW" <?php echo ($player['position'] == 'RW') ? 'selected' : ''; ?>>RW (Right-wing)
                    </option>
                    <option value="ST" <?php echo ($player['position'] == 'ST') ? 'selected' : ''; ?>>ST (Striker)
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <input class="form-control" id="rating" name="rating" type="number" min="20" max="100"
                    value="<?php echo $player['rating']; ?>" placeholder="Rating" required>
            </div>
            <!-- joueur Stats -->
            <?php if ($player['position'] != 'GK') { ?>
                <div class="mb-3">
                    <label for="pace" class="form-label">Pace</label>
                    <input class="form-control" id="pace" name="pace" type="number" min="0" max="100"
                        value="<?php echo $player['pace']; ?>" placeholder="Pace" required>
                </div>

                <div class="mb-3">
                    <label for="shooting" class="form-label">Shooting</label>
                    <input class="form-control" id="shooting" name="shooting" type="number" min="0" max="100"
                        value="<?php echo $player['shooting']; ?>" placeholder="Shooting" required>
                </div>

                <div class="mb-3">
                    <label for="passing" class="form-label">Passing</label>
                    <input class="form-control" id="passing" name="passing" type="number" min="0" max="100"
                        value="<?php echo $player['passing']; ?>" placeholder="Passing" required>
                </div>

                <div class="mb-3">
                    <label for="dribbling" class="form-label">Dribbling</label>
                    <input class="form-control" id="dribbling" name="dribbling" type="number" min="0" max="100"
                        value="<?php echo $player['dribbling']; ?>" placeholder="Dribbling" required>
                </div>

                <div class="mb-3">
                    <label for="defending" class="form-label">Defending</label>
                    <input class="form-control" id="defending" name="defending" type="number" min="0" max="100"
                        value="<?php echo $player['defending']; ?>" placeholder="Defending" required>
                </div>

                <div class="mb-3">
                    <label for="physical" class="form-label">Physical</label>
                    <input class="form-control" id="physical" name="physical" type="number" min="0" max="100"
                        value="<?php echo $player['physical']; ?>" placeholder="Physical" required>
                </div>
            <?php } ?>
            <!-- GK Stats -->
            <?php if ($player['position'] == 'GK') { ?>
                <div class="mb-3">
                    <label for="diving" class="form-label">Diving</label>
                    <input class="form-control" id="diving" name="diving" type="number" min="0" max="100"
                        value="<?php echo $player['diving']; ?>" placeholder="Diving">
                </div>

                <div class="mb-3">
                    <label for="handling" class="form-label">Handling</label>
                    <input class="form-control" id="handling" name="handling" type="number" min="0" max="100"
                        value="<?php echo $player['handling']; ?>" placeholder="Handling">
                </div>

                <div class="mb-3">
                    <label for="kicking" class="form-label">Kicking</label>
                    <input class="form-control" id="kicking" name="kicking" type="number" min="0" max="100"
                        value="<?php echo $player['kicking']; ?>" placeholder="Kicking">
                </div>

                <div class="mb-3">
                    <label for="reflexes" class="form-label">Reflexes</label>
                    <input class="form-control" id="reflexes" name="reflexes" type="number" min="0" max="100"
                        value="<?php echo $player['reflexes']; ?>" placeholder="Reflexes">
                </div>

                <div class="mb-3">
                    <label for="speed" class="form-label">Speed</label>
                    <input class="form-control" id="speed" name="speed" type="number" min="0" max="100"
                        value="<?php echo $player['speed']; ?>" placeholder="Speed">
                </div>

                <div class="mb-3">
                    <label for="positioning" class="form-label">Positioning</label>
                    <input class="form-control" id="positioning" name="positioning" type="number" min="0" max="100"
                        value="<?php echo $player['positioning']; ?>" placeholder="Positioning">
                </div>
            <?php } ?>

            <button type="submit" class="btn btn-primary">Update Player</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybQbYdXbQnlxjGiP7fuXlT6g2xpL96jlm0YFSkLJlgc7Gp5oGp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0j6dRtDULvKKb8FO9czfiAcaZ4DkR9tcFqvIz0em10QI1fG2" crossorigin="anonymous"></script>
</body>
</html>