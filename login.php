<?php
// Start the session
session_start();

// Initialize an error message variable
$error_msg = "";

// Include the database connection file
include ("connect.php");

// Check if the form was submitted via POST and the necessary fields are set
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    // Sanitize user inputs
    $USERNAME = mysqli_real_escape_string($con, $_POST['username']);
    $PASSWORD = mysqli_real_escape_string($con, $_POST['password']);

    // Validate inputs: check if either field is empty
    if (empty($USERNAME) || empty($PASSWORD)) {
        $error_msg = "Username and password cannot be empty";
    } else {
        // Prepare an SQL statement to prevent SQL injection
        $query = "SELECT * FROM registrations WHERE username = ? AND password = ?";
        $stmt = $con->prepare($query);
        // Bind parameters to the SQL query
        $stmt->bind_param("ss", $USERNAME, $PASSWORD);
        // Execute the query
        $stmt->execute();
        // Get the result of the query
        $result = $stmt->get_result();

        // Check if a user with the provided username and password exists
        if ($result->num_rows > 0) {
            // Fetch user data
            $user = $result->fetch_assoc();
            // Store username and role in session variables
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            // Redirect to the home page
            header("Location: home.php");
            exit();
        } else {
            // Set an error message if the username or password is incorrect
            $error_msg = "Invalid username or password. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <!-- Favicon for the website -->
    <link rel="icon" type="image/png" href="./images/logo.png">
    <!-- Responsive viewport settings -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login | Real Madrid - Blog</title>

    <!-- Bootstrap CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Google Fonts for custom font styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Reddit+Sans:wght@400;700&display=swap" rel="stylesheet">

    <!-- Custom CSS for additional styles -->
    <style>
        /* Set height and margin for the body and html to cover the full height and remove default margin */
        body,
        html {
            height: 100%;
            margin: 0;
            /* Center the content vertically and horizontally */
            display: flex;
            justify-content: center;
            align-items: center;
            /* Use custom font */
            font-family: 'Reddit Sans', sans-serif;
            /* Set background image */
            background-image: url("./images/signupbg.jpg");
            background-repeat: no-repeat;
            background-position: center;
        }

        /* Container styles for the form */
        .container {
            height: 50vh;
            width: 50vw;
            /* Slightly transparent background for readability */
            background-color: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Form styles */
        form {
            width: 80%;
            font-weight: bold;
            position: relative;
        }

        /* Input and button styles */
        input[type="text"],
        input[type="password"],
        .btn {
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        /* Button primary color */
        .btn-primary {
            background-color: #063970;
        }
    </style>
</head>

<body>
    <!-- Container for the login form -->
    <div class='container'>
        <!-- Form for login, method is POST to send data to the same page -->
        <form action="login.php" method="post">
            <h1>Login</h1>
            <!-- Username input field -->
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" placeholder="Enter your username" name="username" required>
            </div>
            <!-- Password input field -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Enter your password" name="password" required>
            </div>
            <!-- Display error message if any -->
            <?php if (!empty($error_msg)): ?>
                <div style="color: red; font-weight: normal;"><?php echo $error_msg; ?></div>
            <?php endif; ?>
            <!-- Submit button for login form -->
            <button type="submit" class="btn btn-primary">Login</button>
            <!-- Link to the signup page -->
            <div style="margin-top: 10px;">
                <a href="signup.php" style="color: #063970; font-weight: lighter; text-decoration: underline;">
                    Don't have an account? Sign Up Now!
                </a>
            </div>
        </form>
    </div>
</body>

</html>