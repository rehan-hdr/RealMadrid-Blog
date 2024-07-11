<?php
require 'connect.php';

// Function to select three random news items
function getRecentNewsItems($conn)
{
    $query = "SELECT id, main_heading, sub_heading, image_path FROM news_items ORDER BY RAND() LIMIT 3";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

$recentArticles = getRecentNewsItems($con);
mysqli_close($con);
?>

<div class="row">
    <?php foreach ($recentArticles as $article): ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <a href="article.php?id=<?php echo $article['id']; ?>"><img
                        src="<?php echo $article['image_path']; ?>" class="card-img-top img-responsive"
                        alt="<?php echo $article['main_heading']; ?>"></a>
                <div class="card-body">
                    <h5 class="card-title main-article-title"><?php echo $article['main_heading']; ?></h5>
                    <p class="card-text sub-article-title"><?php echo $article['sub_heading']; ?></p>
                    <a href="article.php?id=<?php echo $article['id']; ?>" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>