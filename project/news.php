<!-- daniel Nkemdirim worked on this page -->
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports News</title>
    <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>" />
    <style>
  <?php include "style.css" ?>
</style>
</head>
<body>
    <h1>Sports News</h1>
   
    </div>
</body>
</html>
<?php

$apiKey = "3b190e2cfd6b46d2995c61bc8b906c5c";
$url = "https://newsapi.org/v2/top-headlines?apiKey=3b190e2cfd6b46d2995c61bc8b906c5c&category=sports&country=us";

// Initialize cURL session
$curl = curl_init($url);

// Set cURL options
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Execute cURL request
$response = curl_exec($curl);

// Check for errors
if (!$response) {
    die("Failed to fetch sports news: " . curl_error($curl));
}

// Close cURL session
curl_close($curl);

// Decode JSON response
$data = json_decode($response, true);

// Check if request was successful
if ($data['status'] === 'ok') {
    // Extract articles
    $articles = $data['articles'];

    // Display sports news
    foreach ($articles as $article) {
        $title = $article['title'];
        $description = $article['description'];
        echo "<h2>$title</h2><p>$description</p>";
    }
} else {
    echo "Failed to fetch sports news.";
}
?>
