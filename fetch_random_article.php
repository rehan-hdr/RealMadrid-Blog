<?php
// Include the database connection file
require 'connect.php';

// Get the current news item ID from the URL parameters
$currentId = $_GET['current_id'];
// Get the direction (prev or next) from the URL parameters
$direction = $_GET['direction'];

// Function to select a random news item excluding the current one
function getRandomNewsItemExcluding($conn, $currentId)
{
    // SQL query to select a random news item excluding the current one
    $query = "SELECT * FROM news_items WHERE id != $currentId ORDER BY RAND() LIMIT 1";
    // Execute the query
    $result = mysqli_query($conn, $query);
    // Fetch and return the result as an associative array
    return mysqli_fetch_assoc($result);
}

// Check the direction to determine which news item to fetch
if ($direction === 'prev') {
    // Fetch a random news item before the current one
    $randomItem = getRandomNewsItemExcluding($con, $currentId);
} else {
    // Fetch a random news item after the current one (note: this part is incorrect and should be corrected)
    $randomItem = getRandomNewsItemExcluding($con, $currentId);
}

// Check if a random news item was found
if ($randomItem) {
    // Return the news item in JSON format with a success status
    echo json_encode(['success' => true, 'article' => $randomItem]);
} else {
    // Return a failure status in JSON format if no item was found
    echo json_encode(['success' => false]);
}

// Close the database connection
mysqli_close($con);

