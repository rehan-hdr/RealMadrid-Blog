<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="./images/logo.png">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Players | Real Madrid</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom CSS -->
    <style>
        /* Your custom styles here */
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            max-width: 300px;
            margin-right: 10px;
            /* Reduced horizontal space between cards */
            margin-bottom: 20px;
            /* Increased vertical space between cards */
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Custom Scrollbar Styles */
        ::-webkit-scrollbar {
            width: 12px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
            margin: 0px 20px;
        }

        ::-webkit-scrollbar-thumb {
            background: #000;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #000;
        }

        .card-text {
            font-weight: bold;
            /* Make kit number bolder */
            font-size: 50px;
            /* Make kit number bigger */
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Main content -->
    <div class="container mt-4">
        <h2>Players</h2>
        <hr>

        <!-- Group players by position -->
        <?php
        // Include database connection
        include 'connect.php';

        // Fetch players from database
        $sql = "SELECT id, name, kitnumber, position, pic FROM player ORDER BY position";
        $result = mysqli_query($con, $sql);

        $positions = ['Goalkeeper', 'Centre-Back', 'Left-Back', 'Right-Back', 'Midfielder', 'Forward'];

        // Iterate through each position
        foreach ($positions as $position) {
            echo '<h3>' . $position . '</h3>';
            echo '<div class="row">';
            // Fetch players for current position
            $sql = "SELECT id, name, kitnumber, pic FROM player WHERE position = '$position'";
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Output player card
                    echo '<div class="col-md-3 mb-4">';
                    echo '<div class="card">';
                    echo '<a href="player.php?id=' . $row['id'] . '"><img src="' . $row['pic'] . '" class="card-img-top" alt="' . $row['name'] . '"></a>';
                    echo '<div class="card-body">';
                    echo '<p class="card-text">' . $row['kitnumber'] . '</p>';
                    echo '<h5 class="card-title">' . $row['name'] . '</h5>';
                    // Pass player ID as a parameter in the URL
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="col-md-12"><p>No players found for ' . $position . '.</p></div>';
            }
            echo '</div>';
        }

        // Close database connection
        mysqli_close($con);
        ?>
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