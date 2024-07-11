<?php
// Include the database connection file
include 'connect.php';

// Start a new session or resume the existing session
session_start();

// Check if the user is logged in and has an 'admin' role
$is_admin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';

// Handle CRUD operations only if the request method is POST and the user is an admin
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $is_admin) {
    // Handle the create operation
    if (isset($_POST['create'])) {
        // Get form input values
        $image_path = $_POST['image_path'];
        $main_heading = $_POST['main_heading'];
        $sub_heading = $_POST['sub_heading'];
        $caption = $_POST['caption'];

        // Prepare an SQL query to insert a new article
        $query = "INSERT INTO news_items (image_path, main_heading, sub_heading, caption) VALUES (?, ?, ?, ?)";
        $stmt = $con->prepare($query);

        // Check if the statement was prepared successfully
        if (!$stmt) {
            // Output any errors that occurred during preparation
            echo "Error: " . $con->error;
        } else {
            // Bind the input values to the SQL query parameters
            $stmt->bind_param("ssss", $image_path, $main_heading, $sub_heading, $caption);
            // Execute the query
            $result = $stmt->execute();

            // Check if the query was executed successfully
            if ($result) {
                // Redirect to the same page to avoid form resubmission
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            } else {
                // Output any errors that occurred during execution
                echo "Error creating article: " . $stmt->error;
            }
        }
        // Handle the update operation
    } elseif (isset($_POST['update'])) {
        // Get form input values including the article ID
        $id = $_POST['id']; // Corrected to $_POST['id']
        $image_path = $_POST['image_path'];
        $main_heading = $_POST['main_heading'];
        $sub_heading = $_POST['sub_heading'];
        $caption = $_POST['caption'];

        // Prepare an SQL query to update an existing article
        $query = "UPDATE news_items SET image_path = ?, main_heading = ?, sub_heading = ?, caption = ?, updated_at = NOW() WHERE id = ?";
        $stmt = $con->prepare($query);
        // Bind the input values to the SQL query parameters
        $stmt->bind_param("ssssi", $image_path, $main_heading, $sub_heading, $caption, $id);
        // Execute the query
        $stmt->execute();

        // Redirect to the same page to avoid form resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
        // Handle the delete operation
    } elseif (isset($_POST['delete'])) {
        // Get the ID of the article to be deleted
        $id = $_POST['delete']; // Change this line to use 'delete' instead of 'id'

        // Prepare an SQL query to delete the specified article
        $query = "DELETE FROM news_items WHERE id = ?";
        $stmt = $con->prepare($query);
        // Bind the article ID to the SQL query parameter
        $stmt->bind_param("i", $id);
        // Execute the query
        $stmt->execute();

        // Redirect to the same page to avoid form resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Link to the website's favicon -->
    <link rel="icon" type="image/png" href="./images/logo.png">
    <!-- Set the viewport to ensure proper scaling on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Page title -->
    <title>News | Real Madrid</title>
    <!-- Link to Bootstrap CSS for styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <!-- Include the navigation bar from an external file -->
    <?php include 'navbar.php'; ?>
    <div class="container mt-4">
        <!-- Heading for the news section -->
        <h2>News</h2>
        <hr>

        <!-- Display the create article button only if the user is an admin -->
        <?php if ($is_admin): ?>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createArticleModal">Create
                Article</button>
        <?php endif; ?>

        <div class="row">
            <?php
            // Fetch and display all news articles from the database
            $sql = "SELECT id, image_path, main_heading, sub_heading, caption FROM news_items";
            $result = mysqli_query($con, $sql);

            // Check if there are any articles to display
            if (mysqli_num_rows($result) > 0) {
                // Loop through each article and display it
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card">';
                    echo '<a href="article.php?id=' . $row['id'] . '"><img src="' . $row['image_path'] . '" class="card-img-top" alt="' . $row['main_heading'] . '"></a>';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['main_heading'] . '</h5>';
                    echo '<p class="card-text">' . $row['sub_heading'] . '</p>';
                    // Display update and delete buttons only if the user is an admin
                    if ($is_admin) {
                        echo '<button class="btn btn-warning" data-toggle="modal" data-target="#updateArticleModal" data-id="' . $row['id'] . '" data-image_path="' . $row['image_path'] . '" data-main_heading="' . $row['main_heading'] . '" data-sub_heading="' . $row['sub_heading'] . '" data-caption="' . $row['caption'] . '">Update</button>';
                        echo '<form method="post" style="display:inline-block;">';
                        echo '<input type="hidden" name="delete" value="' . $row['id'] . '">';
                        echo '<button type="submit" class="btn btn-danger">Delete</button>';
                        echo '</form>';
                    }
                    echo '<a href="article.php?id=' . $row['id'] . '" class="btn btn-primary">Read More</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                // Display a message if no articles are found
                echo '<div class="col-md-12"><p>No articles found.</p></div>';
            }

            // Close the database connection
            mysqli_close($con);
            ?>
        </div>
    </div>

    <!-- Modal for creating a new article -->
    <div class="modal fade" id="createArticleModal" tabindex="-1" role="dialog"
        aria-labelledby="createArticleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Article</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <!-- Input field for image path -->
                            <label for="image_path">Image Path</label>
                            <input type="text" class="form-control" id="image_path" name="image_path" required>
                        </div>
                        <div class="form-group">
                            <!-- Input field for main heading -->
                            <label for="main_heading">Main Heading</label>
                            <input type="text" class="form-control" id="main_heading" name="main_heading" required>
                        </div>
                        <div class="form-group">
                            <!-- Input field for sub heading -->
                            <label for="sub_heading">Sub Heading</label>
                            <input type="text" class="form-control" id="sub_heading" name="sub_heading" required>
                        </div>
                        <div class="form-group">
                            <!-- Textarea for article content -->
                            <label for="caption">Content</label>
                            <textarea class="form-control" id="caption" name="caption" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- Close button for the modal -->
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- Submit button for creating the article -->
                        <button type="submit" name="create" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal for updating an existing article -->
    <div class="modal fade" id="updateArticleModal" tabindex="-1" role="dialog"
        aria-labelledby="updateArticleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Article</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Hidden input field for article ID -->
                        <input type="hidden" id="update_id" name="id">
                        <div class="form-group">
                            <!-- Input field for image path -->
                            <label for="update_image_path">Image Path</label>
                            <input type="text" class="form-control" id="update_image_path" name="image_path" required>
                        </div>
                        <div class="form-group">
                            <!-- Input field for main heading -->
                            <label for="update_main_heading">Main Heading</label>
                            <input type="text" class="form-control" id="update_main_heading" name="main_heading"
                                required>
                        </div>
                        <div class="form-group">
                            <!-- Input field for sub heading -->
                            <label for="update_sub_heading">Sub Heading</label>
                            <input type="text" class="form-control" id="update_sub_heading" name="sub_heading" required>
                        </div>
                        <div class="form-group">
                            <!-- Textarea for article content -->
                            <label for="update_caption">Content</label>
                            <textarea class="form-control" id="update_caption" name="caption" rows="3"
                                required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- Close button for the modal -->
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- Submit button for updating the article -->
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Fill the update modal with data when the update button is clicked
        $('#updateArticleModal').on('show.bs.modal', function (event) {
            // Get the button that triggered the modal
            var button = $(event.relatedTarget);
            // Extract data attributes from the button
            var id = button.data('id');
            var image_path = button.data('image_path');
            var main_heading = button.data('main_heading');
            var sub_heading = button.data('sub_heading');
            var caption = button.data('caption');

            // Get the modal instance
            var modal = $(this);
            // Set the input fields with the extracted data
            modal.find('#update_id').val(id);
            modal.find('#update_image_path').val(image_path);
            modal.find('#update_main_heading').val(main_heading);
            modal.find('#update_sub_heading').val(sub_heading);
            modal.find('#update_caption').val(caption);
        });
    </script>
</body>

</html>