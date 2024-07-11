<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags for character encoding, favicon, viewport settings, and compatibility -->
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="./images/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Real Madrid - Blog</title>

    <!-- Bootstrap CSS for styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Reddit+Sans:wght@400;700&display=swap" rel="stylesheet">

    <style>
        /* Apply Reddit Sans font to body and common elements */
        body,
        p,
        span,
        a,
        li {
            font-family: 'Reddit Sans', sans-serif;
            font-weight: 400;
        }

        /* Apply bold weight to headings */
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .main-article-title,
        .sub-article-title {
            font-weight: 700;
        }

        /* Custom button styles */
        .btn-outline-danger {
            color: #dc3545;
            border-color: #dc3545;
        }

        .btn-outline-danger:hover {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        /* Outer div styles */
        .outer-div {
            margin-top: 20px;
            /* Adjusted for less space */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #e3dac9;
            border-radius: 10px;
        }

        /* Image styles */
        .img-responsive {
            max-width: 100%;
            height: auto;
            display: block;
            border-radius: 10px;
        }

        /* Body background color */
        body {
            background-color: #f9feff;
        }

        /* Margin for recent articles section */
        .recent-articles {
            margin-bottom: 10px;
            /* Ensure consistent spacing */
        }

        /* Custom scrollbar styles */
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

    <!-- Banner -->
    <div style="overflow: hidden;">
        <img style="width: 100vw; height: auto;" src="./images/banner.jpg" alt="Banner">
    </div>

    <!-- Main content carousel -->
    <?php include "carousel.php"; ?>

    <!-- Main content container -->
    <main role="main" class="container">
        <br><br>
        <!-- Recent news & articles section -->
        <span class="recent-articles">Recent News & Articles</span>
        <hr>
        <?php include 'recent-articles.php'; ?>

        <!-- Sponsors section -->
        <span class="recent-articles">Sponsors</span>
        <hr>
        <?php include 'sponsor.php'; ?>
    </main>

    <!-- Footer -->
    <?php include "footer.php"; ?>

    <!-- Dependency includes (Ensure these are not duplicated) -->
    <?php include "dependencies.php"; ?>

    <!-- Bootstrap JS dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDzwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>