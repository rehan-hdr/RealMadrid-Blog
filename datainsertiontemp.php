<?php
require 'connect.php';

$image_path = './images/mbappe.jpeg';
$main_heading = 'MBAPPE ENTERS THE SCENE!';
$sub_heading = 'BUZZ OFF TURTLE!';
$caption = '';

$query = "INSERT INTO news_items (image_path, main_heading, sub_heading, caption) VALUES ('$image_path', '$main_heading', '$sub_heading', '$caption')";

if (mysqli_query($con, $query)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

mysqli_close($con);
?>