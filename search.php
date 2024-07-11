<?php
// Check if the session has not started yet
if (session_status() == PHP_SESSION_NONE) {
    // Start a new session or resume the existing session
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Define the character encoding for the document -->
    <meta charset="UTF-8">
    <!-- Link to the website's favicon -->
    <link rel="icon" type="image/png" href="./images/logo.png">
    <!-- Set the viewport to ensure proper scaling on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Page title -->
    <title>Search Results | Real Madrid</title>
    <!-- Link to Bootstrap CSS for styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        /* Custom styles for the card elements */
        .card {
            border-radius: 15px;
            /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Shadow */
            transition: box-shadow 0.3s ease;
            /* Smooth transition */
            max-width: 300px;
            /* Maximum width of the card */
            margin-right: 10px;
            /* Reduced horizontal space between cards */
            margin-bottom: 20px;
            /* Increased vertical space between cards */
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            /* Increase shadow on hover */
        }

        /* Custom Scrollbar Styles */
        ::-webkit-scrollbar {
            width: 12px;
            /* Thicker scrollbar */
        }

        ::-webkit-scrollbar-track {
            background: transparent;
            /* Transparent track */
            margin: 0px 20px;
            /* Margin from the edge */
        }

        ::-webkit-scrollbar-thumb {
            background: #000;
            /* Black scrollbar thumb */
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #000;
            /* Darker thumb on hover */
        }

        .card-text {
            font-weight: regular;
            /* Make text regular weight */
            font-size: 15px;
            /* Set text size */
        }

        .card-descr {
            font-weight: bold;
            /* Make text bold */
            font-size: 25px;
            /* Set text size */
        }

        .read-more-content {
            display: none;
            /* Hide the content by default */
        }

        .read-more-btn {
            cursor: pointer;
            /* Make the button look clickable */
            color: blue;
            /* Set button color */
        }

        .show-more {
            display: block !important;
            /* Show the hidden content */
        }

        .card {
            border-radius: 15px;
            /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Shadow */
            transition: box-shadow 0.3s ease;
            /* Smooth transition */
            max-width: 300px;
            /* Maximum width of the card */
            margin-right: 10px;
            /* Reduced horizontal space between cards */
            margin-bottom: 20px;
            /* Increased vertical space between cards */
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            /* Increase shadow on hover */
        }

        ::-webkit-scrollbar {
            width: 12px;
            /* Thicker scrollbar */
        }

        ::-webkit-scrollbar-track {
            background: transparent;
            /* Transparent track */
            margin: 0px 20px;
            /* Margin from the edge */
        }

        ::-webkit-scrollbar-thumb {
            background: #000;
            /* Black scrollbar thumb */
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #000;
            /* Darker thumb on hover */
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

    <!-- Include the navigation bar from an external file -->
    <?php include 'navbar.php'; ?>

    <!-- Main content -->
    <div class="container mt-4">
        <!-- Heading for the search results section -->
        <h2>Search Results</h2>
        <hr>

        <?php
        // Include the database connection file
        include 'connect.php';

        // Get the search query from the URL and escape special characters to prevent SQL injection
        $query = mysqli_real_escape_string($con, $_GET['query']);

        // SQL query to search for players based on the query
        $sql_players = "SELECT id, name, kitnumber, position, pic FROM player WHERE name LIKE '%$query%' OR position LIKE '%$query%' OR kitnumber LIKE '%$query%'";
        // Execute the query and store the result
        $result_players = mysqli_query($con, $sql_players);

        // SQL query to search for articles based on the query
        $sql_articles = "SELECT id, image_path, main_heading, sub_heading FROM news_items WHERE main_heading LIKE '%$query%' OR sub_heading LIKE '%$query%'";
        // Execute the query and store the result
        $result_articles = mysqli_query($con, $sql_articles);

        // SQL query to search for trophies based on the query
        $sql_trophies = "SELECT id, name, number, tdesc, pic FROM trophies WHERE name LIKE '%$query%' OR tdesc LIKE '%$query%'";
        // Execute the query and store the result
        $result_trophies = mysqli_query($con, $sql_trophies);

        // Display the players section if there are any results
        if (mysqli_num_rows($result_players) > 0) {
            echo '<h3>Players</h3><div class="row">';
            // Loop through each player and display their information
            while ($row = mysqli_fetch_assoc($result_players)) {
                echo '<div class="col-md-3 mb-4">';
                echo '<div class="card">';
                echo '<a href="player.php?id=' . $row['id'] . '"><img src="' . $row['pic'] . '" class="card-img-top" alt="' . $row['name'] . '"></a>';
                echo '<div class="card-body">';
                echo '<p class="card-text">' . $row['kitnumber'] . '</p>';
                echo '<h5 class="card-title">' . $row['name'] . '</h5>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
        }

        // Display the articles section if there are any results
        if (mysqli_num_rows($result_articles) > 0) {
            echo '<h3>Articles</h3><div class="row">';
            // Loop through each article and display their information
            while ($row = mysqli_fetch_assoc($result_articles)) {
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card">';
                echo '<a href="article.php?id=' . $row['id'] . '"><img src="' . $row['image_path'] . '" class="card-img-top" alt="' . $row['main_heading'] . '"></a>';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['main_heading'] . '</h5>';
                echo '<p>' . $row['sub_heading'] . '</p>';
                echo '<a href="article.php?id=' . $row['id'] . '" class="btn btn-primary">Read More</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
        }

        // Display the trophies section if there are any results
        if (mysqli_num_rows($result_trophies) > 0) {
            echo '<h3>Trophies</h3><div class="row">';
            // Loop through each trophy and display their information
            while ($row = mysqli_fetch_assoc($result_trophies)) {
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card">';
                echo '<img src="' . $row['pic'] . '" class="card-img-top" alt="' . $row['name'] . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['name'] . '</h5>';
                echo '<p class="card-descr">Wins: ' . $row['number'] . '</p>';
                echo '<p>' . substr($row['tdesc'], 0, 120) . '...<span class="read-more-btn">Read More</span></p>';
                echo '<p class="read-more-content">' . $row['tdesc'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
        }

        // If no results are found for the query
        if (mysqli_num_rows($result_players) == 0 && mysqli_num_rows($result_articles) == 0 && mysqli_num_rows($result_trophies) == 0) {
            // Display a message indicating no results
            echo '<p>No results found for "' . htmlspecialchars($query) . '".</p>';
        }

        // Close the database connection
        mysqli_close($con);
        ?>
    </div>

    <!-- Link to Bootstrap JS for interactive elements -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

    <script>
        // Wait for the DOM to load completely
        document.addEventListener('DOMContentLoaded', function () {
            // Select all elements with the class 'read-more-btn'
            document.querySelectorAll('.read-more-btn').forEach(function (button) {
                // Add a click event listener to each button
                button.addEventListener('click', function () {
                    // Find the sibling element with the class 'read-more-content'
                    var content = this.parentNode.querySelector('.read-more-content');
                    // Toggle the 'show-more' class to show or hide the content
                    content.classList.toggle('show-more');
                });
            });
        });
    </script>
</body>

</html>