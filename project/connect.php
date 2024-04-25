<!-- daniel Nkemdirim worked on this page -->
<?php

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection
    $conn = new mysqli('localhost','root','','osa');
    if($conn->connect_error){
        //echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } else {
        $stmt = $conn->prepare("select * from registration where username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if ($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === $password){
                echo "<h2>Login successful</h2>";
                $_SESSION['username'] = $username;
                header("Location: blog.php");
                header("Location: blog.html");
                exit;
            } else {
                echo "<h2>Invalid password</h2>";
            }
        } else {
            echo "<h2>Invalid username</h2>";
        }
    }
} else {
    echo "<h2>Error: Username and password not provided</h2>";
}
