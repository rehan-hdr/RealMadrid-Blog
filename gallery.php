<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="./images/logo.png">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery | Real Madrid</title>
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
            max-width: 1280px;
            max-height: 1280px;
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

        /* Remove fixed height from card image */
        .card-img-top {
            /* Remove height property */
            object-fit: cover;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Main content -->
    <div class="container mt-4">
        <h2>Gallery</h2>
        <hr>

        <!-- Display trophies -->
        <div class="row">
            <?php
            // Include database connection
            include 'connect.php';

            // Fetch trophies from database
            $sql = "SELECT id, pic, caption FROM galleryitem";
            $result = mysqli_query($con, $sql);

            // Check if there are trophies
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Output trophy card
                    echo '<div class="col-12 mb-4">';
                    echo '<div class="card">';
                    echo '<img src="' . $row['pic'] . '" class="card-img-top" alt="' . $row['caption'] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['caption'] . '</h5>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No pictures found.</p>';
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
</body>

</html>