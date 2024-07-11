<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="./images/logo.png">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News | Real Madrid</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
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
    </style>
</head>

<body>

    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Main content -->
    <div class="container mt-4">
        <?php
        // Include database connection
        include 'connect.php';

        // Check if article ID is provided in URL
        if (isset($_GET['id'])) {
            // Sanitize input to prevent SQL injection
            $article_id = mysqli_real_escape_string($con, $_GET['id']);

            // Fetch article details from database
            $sql = "SELECT * FROM news_items WHERE id = $article_id";
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                // Output article details
                echo '<div class="card">';
                echo '<img src="' . $row['image_path'] . '" class="card-img-top" alt="' . $row['main_heading'] . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['main_heading'] . '</h5>';
                echo '<p class="card-text">' . $row['sub_heading'] . '</p>';
                echo '</div>';
                echo '</div>';
            } else {
                echo '<p>Article not found.</p>';
            }
        } else {
            echo '<p>Article ID not provided.</p>';
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-J