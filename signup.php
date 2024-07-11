<?php
// Start the session
session_start();
// Initialize error and success message variables
$error_msg = "";
$success_msg = "";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php'; // Include database connection file

    // Retrieve and sanitize input data
    $USERNAME = mysqli_real_escape_string($con, $_POST['username']);
    $PASSWORD = mysqli_real_escape_string($con, $_POST['password']);

    // Validate input data
    if (empty($USERNAME) || empty($PASSWORD)) {
        $error_msg = "Username and password cannot be empty";
    } else {
        // Check if the username already exists in the database
        $check_query = "SELECT * FROM registrations WHERE username = '$USERNAME'";
        $check_result = mysqli_query($con, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            $error_msg = "Username already exists. Please choose a different username.";
        } else {
            // Insert the new user into the database
            $sql = "INSERT INTO registrations (username, password, role) VALUES ('$USERNAME', '$PASSWORD', 'user')";
            $result = mysqli_query($con, $sql);

            if ($result) {
                $success_msg = "Data saved successfully";
                // Redirect to home page after successful registration
                $_SESSION['username'] = $USERNAME;
                $_SESSION['role'] = 'user';
                header("Location: home.php");
                exit(); // Ensure that script execution stops after redirection
            } else {
                // Display error if insertion fails
                die("Error: " . mysqli_error($con));
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/png" href="./images/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Signup | Real Madrid - Blog</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Reddit+Sans:wght@400;700&display=swap" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Reddit Sans', sans-serif;
            background-image: url("./images/signupbg.jpg");
            background-repeat: no-repeat;
            background-position: center;
        }

        .container {
            height: 50vh;
            width: 50vw;
            background-color: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            width: 80%;
            font-weight: bold;
            position: relative;
        }

        input[type="text"],
        input[type="password"],
        .btn {
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .btn-primary {
            background-color: #063970;
        }
    </style>
</head>

<body>
    <div class='container'>
        <form action="signup.php" method="post">
            <h1>Sign Up</h1>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" placeholder="Enter your username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Enter your password" name="password" required>
            </div>
            <?php if (!empty($error_msg)): ?>
                <div style="color: red; font-family: 'Reddit Sans', sans-serif; font-weight: normal;">
                    <?php echo $error_msg; ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($success_msg)): ?>
                <div style="color: green; font-family: 'Reddit Sans', sans-serif; font-weight: normal;">
                    <?php echo $success_msg; ?>
                </div>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary">Submit</button>
            <div style="margin-top: 10px;">
                <a href="login.php" style="color: #063970; font-weight: lighter; text-decoration: underline;">
                    Already have an account? Log in here
                </a>
            </div>
        </form>
    </div>
</body>

</html>