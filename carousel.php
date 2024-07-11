<?php
require 'connect.php';

// Function to select a random news item
function getRandomNewsItem($conn)
{
    $query = "SELECT * FROM news_items ORDER BY RAND() LIMIT 1";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

$randomItem = getRandomNewsItem($con);
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random News Card</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
        integrity="sha384-0evSXBKJEiFNJhqC2Xl3Vm9FCsIroBYbGYiGYWKFBzO7Tguz7Zx2xmPBArHnVVIGw" crossorigin="anonymous">
    <style>
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Add box shadow */
            position: relative;
        }

        .card-img-top {
            max-height: 450px;
            object-fit: cover;
            object-position: top center;
            /* Optional: Maintain aspect ratio if needed */
        }

        .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            z-index: 999;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .arrow::before {
            content: '';
            display: block;
            width: 16px;
            height: 16px;
            border-width: 3px 3px 0 0;
            border-style: solid;
            border-color: black;
            transform: rotate(45deg);
            border-radius: 3px;
            /* Add rounded corners */
            background-color: transparent;
            /* Ensure the background is transparent */
        }

        .arrow-left::before {
            transform: rotate(225deg);
            /* Rotate for left arrow */
        }

        .arrow-right::before {
            transform: rotate(45deg);
            /* Rotate for right arrow */
        }


        .arrow-left {
            left: -70px;
        }

        .arrow-right {
            right: -70px;
        }
    </style>
</head>

<body>
    <div class="container mt-5 position-relative">
        <div class="card">
            <a id="articleLink" href="article.php?id=<?php echo $randomItem['id']; ?>">
                <!-- Anchor tag for redirection -->
                <img src="<?php echo $randomItem['image_path']; ?>" class="card-img-top" alt="News Image">
            </a>
            <div class="card-body">
                <h5 class="card-title"><?php echo strtoupper($randomItem['main_heading']); ?></h5>
                <p class="card-text"><?php echo strtoupper($randomItem['sub_heading']); ?></p>
            </div>
            <span class="arrow arrow-left" onclick="changeArticle('prev')"></span> <!-- Left arrow -->
            <span class="arrow arrow-right" onclick="changeArticle('prev')"></span> <!-- Right arrow -->
        </div>
    </div>

    <script>
        function changeArticle(direction) {
            const currentId = <?php echo $randomItem['id']; ?>;
            fetch(`fetch_random_article.php?current_id=${currentId}&direction=${direction}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const cardImg = document.querySelector('.card-img-top');
                        const cardTitle = document.querySelector('.card-title');
                        const cardText = document.querySelector('.card-text');
                        const articleLink = document.getElementById('articleLink'); // Get the anchor tag
                        cardImg.src = data.article.image_path;
                        cardTitle.textContent = data.article.main_heading.toUpperCase();
                        cardText.textContent = data.article.sub_heading.toUpperCase();
                        articleLink.href = `article.php?id=${data.article.id}`; // Update href attribute
                    } else {
                        alert('Failed to fetch random article.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to fetch random article.');
                });
        }
    </script>
    <?php include 'dependencies.php'; ?>
</body>

</html>