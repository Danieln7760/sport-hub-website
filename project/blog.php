<!-- daniel Nkemdirim worked on this page -->
<?php
session_start();

// Database connection
$conn = new mysqli('localhost','root','','osa');
if($conn->connect_error){
    die("Connection Failed : ". $conn->connect_error);
}

// Process blog post submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Validate and sanitize input fields
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);

    // Insert the new post into the database
    $stmt = $conn->prepare("INSERT INTO blog (title, content) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $content);
    $stmt->execute();

    // Fetch all blog posts from the database
    $result = $conn->query("SELECT * FROM blog");
    $posts = array();
    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }

    // Return all blog posts as JSON response
    header('Content-Type: application/json');
    echo json_encode($posts);
    exit();
}

// Function to get all blog posts
function get_blog_posts() {
    global $conn;
    $result = $conn->query("SELECT * FROM blog");
    $html = '';
    while ($row = $result->fetch_assoc()) {
        $html .= '<div class="blog-post">';
        $html .= '<h2>' . $row['title'] . '</h2>';
        $html .= '<p>' . $row['content'] . '</p>';
        $html .= '</div>';
    }
    return $html;
}

// Get all blog posts
$blog = get_blog_posts();
