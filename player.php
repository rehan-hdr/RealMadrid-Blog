<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="./images/logo.png">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    // Include database connection
    include 'connect.php';

    // Check if player ID is set in URL
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $player_id = $_GET['id'];

        // Fetch player details from the database
        $sql = "SELECT name FROM player WHERE id = $player_id";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $player_name = $row['name'];
            echo '<title>' . $player_name . ' | Real Madrid</title>';
        } else {
            echo '<title>Player Details</title>';
        }
    } else {
        echo '<title>Player Details</title>';
    }

    // Close database connection
    mysqli_close($con);
    ?>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom CSS -->
    <style>
        /* Your custom styles here */
        .player-details {
            margin-top: 50px;
            text-align: center;
        }

        .player-card {
            max-width: 400px;
            /* Adjust the max-width as needed */
            margin: auto;
            /* Center align the card */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Add box shadow */
            transition: box-shadow 0.3s ease;
            margin-bottom: 20px;
        }

        .player-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .player-image {
            max-width: 100%;
            margin-bottom: 20px;
        }

        .player-info {
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Main content -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 player-details">
                <?php
                // Include database connection
                include 'connect.php';

                // Check if player ID is set in URL
                if (isset($_GET['id']) && !empty($_GET['id'])) {
                    $player_id = $_GET['id'];

                    // Fetch player details from the database
                    $sql = "SELECT * FROM player WHERE id = $player_id";
                    $result = mysqli_query($con, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        echo '<div class="card player-card">';
                        echo '<img src="' . $row['pic'] . '" class="card-img-top player-image" alt="' . $row['name'] . '">';
                        echo '<div class="card-body">';
                        echo '<div class="player-info">';
                        echo '<p>Name: ' . $row['name'] . '</p>';
                        echo '<p>Position: ' . $row['position'] . '</p>';
                        echo '<p>Kit Number: ' . $row['kitnumber'] . '</p>';
                        // You can display other player information here
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    } else {
                        echo '<p>No player found with the given ID.</p>';
                    }
                } else {
                    echo '<p>Player ID is missing.</p>';
                }

                // Close database connection
                mysqli_close($con);
                ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>