<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="./images/logo.png">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trophies | Real Madrid</title>
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
            font-weight: regular;
            /* Make trophy number bolder */
            font-size: 15px;
            /* Make trophy number bigger */
        }

        .card-descr {
            font-weight: bold;
            /* Make trophy number bolder */
            font-size: 25px;
            /* Make trophy number bigger */
        }

        .read-more-content {
            display: none;
            /* Hide the content by default */
        }

        .read-more-btn {
            cursor: pointer;
            color: blue;
            /* Make the button look clickable */
        }

        .show-more {
            display: block !important;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Main content -->
    <div class="container mt-4">
        <h2>Trophies</h2>
        <hr>

        <!-- Display trophies -->
        <div class="row">
            <?php
            // Include database connection
            include 'connect.php';

            // Fetch trophies from database
            $sql = "SELECT id, name, number, tdesc, pic FROM trophies";
            $result = mysqli_query($con, $sql);

            // Check if there are trophies
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Output trophy card
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card">';
                    echo '<img src="' . $row['pic'] . '" class="card-img-top" alt="' . $row['name'] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['name'] . '</h5>';
                    echo '<p class="card-descr">Wins: ' . $row['number'] . '</p>';
                    echo '<p class="card-text">' . substr($row['tdesc'], 0, 120) . '...<span class="read-more-btn">Read More</span></p>';
                    echo '<p class="read-more-content">' . $row['tdesc'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No trophies found.</p>';
            }

            // Close database connection
            mysqli_close($con);
            ?>
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

    <!-- Custom JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.read-more-btn').forEach(function (button) {
                button.addEventListener('click', function () {
                    var content = this.parentNode.querySelector('.read-more-content');
                    content.classList.toggle('show-more');
                });
            });
        });
    </script>
</body>

</html>