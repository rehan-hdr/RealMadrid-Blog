<?php
// Check if a specific type of kit is requested
if (isset($_GET['type'])) {
    // Get the type of kit from the URL parameter
    $type = $_GET['type'];

    // Depending on the type of kit selected, customize the behavior accordingly
    switch ($type) {
        case 'home':
            // Handle the Home Kit selection
            $kit_id = 4; // Example ID for Home Kit
            break;
        case 'away':
            // Handle the Away Kit selection
            $kit_id = 5; // Example ID for Away Kit
            break;
        case 'football':
            // Handle the Footballs selection
            // Add your logic here if needed
            break;
        default:
            // Handle invalid type
            // Redirect back to the homepage or display an error message
            header("Location: index.php");
            exit();
    }
} else {
    // If no specific type is provided, redirect back to the homepage
    header("Location: index.php");
    exit();
}

// Include the connection file
include ('connect.php');

// Fetch kit data from the database based on the provided ID
$sql = "SELECT * FROM kits WHERE id = $kit_id";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // Fetch kit data
    $kit_data = $result->fetch_assoc();
} else {
    // If no kit data found for the provided ID
    echo "No kit found with ID: " . $kit_id;
    exit(); // Exit the script
}

// Close the database connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="./images/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $kit_data['kitname']; ?> - Real Madrid</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Reddit+Sans:wght@400;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f9feff;
            /* Very light shade of beige */
            font-family: 'Reddit Sans', sans-serif;
            /* Apply Reddit Sans font to the body */
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

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: bold;
            /* Set font weight to bold for headings */
        }

        p {
            font-weight: normal;
            /* Set font weight to normal for paragraphs */
        }

        .outer-div {
            margin-top: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Adding shadow to the outer div */
        }

        .inner-div {
            height: 100%;
            padding: 20px;
        }

        .beige-light {
            background-color: #f5f5dc;
            /* Light beige */
        }

        .beige-dark {
            background-color: #f9feff;
            /* Dark beige */
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Main content -->
    <main role="main" class="container">
        <!-- Center-aligned div -->
        <div class="row justify-content-center outer-div"> <!-- Add outer-div class -->
            <!-- Div for image -->
            <div class="col-md-6 beige-light inner-div">
                <img src="<?php echo $kit_data['image']; ?>" alt="<?php echo $kit_data['kitname']; ?>"
                    class="img-responsive" style="width: 100%;" />
            </div>
            <!-- Div for name and description -->
            <div class="col-md-6 beige-dark inner-div">
                <h2><?php echo $kit_data['kitname']; ?></h2>
                <p><?php echo $kit_data['kitdesc']; ?></p>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php include ("footer.php"); ?>


    <?php include ("dependencies.php"); ?>

</body>

</html>