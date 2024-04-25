<!-- daniel nkemdirim worked on this page -->
<?php
// Start session
session_start();

// Check if user is already logged in, redirect to dashboard if logged in

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if both username and password are provided
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        // For demonstration purposes, let's assume the username and password are "admin"
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Check if username and password match
        if ($username === 'admin' && $password === 'admin') {
            // If match, set session variable
            $_SESSION['username'] = $username;
            // Redirect to dashboard.php
            header("Location: blog.php");
            exit();
        } else {
            // If not match, display error message
            $error = "Invalid username or password";
        }
    } else {
        // If username or password is empty, display error message
        $error = "Please enter username and password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>" />
    <style>
  <?php include "style.css" ?>
</style>
</head>
<body>
    <div id= Login>
    <h2>Login</h2>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    </div>
    <div id= form>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    </div>
</body>
</html>
