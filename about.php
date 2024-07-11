<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="./images/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Real Madrid - About Us</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="blog-style.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Reddit+Sans:wght@400;700&display=swap" rel="stylesheet">

    <style>
        /* Apply Reddit Sans font */
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
            margin-top: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
        }

        /* Image styles */
        .img-responsive {
            max-width: 100%;
            height: auto;
            display: block;
            border-radius: 10px;
        }

        /* About Us Content Styles */
        .about-us-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
        }

        /* Headings styles */
        .about-us-content h1,
        .about-us-content h2 {
            color: #007bff;
        }

        /* Paragraph styles */
        .about-us-content p {
            color: #343a40;
        }

        /* List styles */
        .about-us-content ul {
            list-style-type: none;
            padding: 0;
        }

        .about-us-content ul li {
            padding-left: 1.2em;
            position: relative;
        }

        .about-us-content ul li:before {
            content: "•";
            color: #007bff;
            position: absolute;
            left: 0;
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
    </style>
</head>

<body>

    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Banner -->
    <div style="overflow: hidden;">
        <img style="width: 100vw; height: auto;" src="./images/banner.jpg" alt="Banner">
    </div>

    <main role="main" class="container">
        <div class="row outer-div justify-content-center">
            <div class="col-md-12 about-us-content">
                <h1 class="text-center mb-4">Real Madrid Club de Fútbol</h1>
                <p>Real Madrid Club de Fútbol, commonly known as Real Madrid, is a professional football club based in
                    Madrid, Spain. Founded in 1902, the club has traditionally worn a white home kit since its
                    inception.</p>

                <h2 class="mt-4">History</h2>
                <p>Real Madrid is one of the most successful football clubs in the world. Here's a glimpse into our rich
                    history:</p>
                <ul>
                    <li>Founded in 1902 as Madrid Football Club.</li>
                    <li>Awarded the royal title "Real" by King Alfonso XIII in 1920.</li>
                    <li>Won its first La Liga title in 1932.</li>
                    <li>Dominated European football in the 1950s, winning the European Cup (now Champions League) five
                        times in a row.</li>
                    <li>Continued success in La Liga and European competitions throughout the decades.</li>
                    <li>Became the first club to win the Champions League three times in a row (2015-2018).</li>
                </ul>

                <h2 class="mt-4">Legacy</h2>
                <p>Real Madrid's legacy extends far beyond trophies and titles. The club has become a symbol of:</p>
                <ul>
                    <li>Excellence: A relentless pursuit of winning and setting the benchmark for success in football.
                    </li>
                    <li>Innovation: A commitment to embracing new tactics, training methods, and technologies to stay
                        ahead of the curve.</li>
                    <li>Galacticos Era: A period of acquiring world-class players, creating a global brand, and
                        entertaining fans with breathtaking football.</li>
                    <li>Unwavering Determination: Renowned for fighting spirit and come-from-behind victories that have
                        cemented their reputation as "Los Blancos" (The Whites).</li>
                    <li>Global Fanbase: Millions of passionate fans worldwide, creating a strong sense of community and
                        belonging.</li>
                </ul>

                <h2 class="mt-4">Crest and Anthem</h2>

                <p>The crest is a symbol of identity and pride for Real Madrid fans. It features the club's name
                    intertwined with a crown, signifying the royal title bestowed upon them. The white color represents
                    purity and sportsmanship, values upheld by the club.</p>
                <p>The anthem, "Himno del Real Madrid," is a powerful and evocative song that captures the essence of
                    the club's spirit and history. It is sung by fans before every home game, creating a stirring
                    atmosphere.</p>

                <h2 class="mt-4">Stadium: Santiago Bernabéu</h2>

                <p>Santiago Bernabéu is the iconic home stadium of Real Madrid, nicknamed "La Catedral" (The Cathedral).
                    Opened in 1947, it has witnessed some of the most legendary moments in football history. Currently
                    undergoing a major renovation, it will transform into a state-of-the-art sporting and entertainment
                    complex upon completion.</p>

                <h2 class="mt-4">Contact Us</h2>

                <p>We encourage you to connect with Real Madrid! Here are the ways you can reach us:</p>
                <ul>
                    <li><strong>Email:</strong> <a href="mailto:info@realmadrid.com">info@realmadrid.com</a></li>
                    <li>
                        <strong>Social Media:</strong>
                        <a href="https://www.facebook.com/RealMadrid" target="_blank">Facebook</a>,
                        <a href="https://twitter.com/realmadrid" target="_blank">Twitter</a>,
                        <a href="https://www.instagram.com/realmadrid/" target="_blank">Instagram</a>
                    </li>
                    <li>
                        <strong>Postal Address:</strong>
                        <address>
                            Real Madrid Club de Fútbol<br>
                            Estadio Santiago Bernabéu<br>
                            Avenida de Concha Espina 1<br>
                            28034 Madrid, Spain
                        </address>
                    </li>
                </ul>

                <p>We appreciate your support and hope this page has provided a glimpse into the world of Real Madrid.
                    ¡Hala Madrid! (Come on Madrid!)</p>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <?php include ("footer.php"); ?>

    <?php include ("dependencies.php"); ?>

</body>

</html>