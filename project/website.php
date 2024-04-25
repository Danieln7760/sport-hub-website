<!-- daniel Nkemdirim worked on this page -->
<?php session_start(); // persistent HTTP session ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>" />
    <style>
  <?php include "style.css" ?>
</style>
</head>
<script>
        window.onload = function() {
            displayRandomText();
            setupImageGallery();
        };

        function setupImageGallery() {
            const images = [
                { src: "news.png", alt: "Another view of our gaming location" },
                { src: "sportsblog.png", alt: "View of our on-site gaming location" },
                
            ];

            const imageGallery = document.getElementById('imageGallery');
            imageGallery.innerHTML = '';

            images.forEach(image => {
                const imgElement = document.createElement('img');
                imgElement.src = image.src;
                imgElement.alt = image.alt;
                imgElement.classList.add('galleryImage');
                imageGallery.appendChild(imgElement);
            });
        }
    </script>
<body>
    <?php include ("SFHheader.php"); ?>
    <?php include ("SFHnav.php"); ?>
  
    <div id="imageGallery">
                 <A href="blog.php"> <img src="sportsblog.png" alt="Image 1" class="galleryImage" ></A>
                 <A href="news.php"> <img src="news.png" alt="Image 2" class="galleryImage" ></A>
                </div>
    <div id="main">
       
        <p>
        Welcome to the ultimate sports hub! Dive into a digital arena where every update is a victory and every blog post a chance to share your passion. Join us where the game never ends, and the spirit of sportsmanship shines bright!
        </p>
       
    </div>

    <?php include 'SFHfoot.php'; ?>

    <script>
        function expandArticle(id) {
            // Hide all articles
            var articles = document.querySelectorAll('.article');
            articles.forEach(function(article) {
                article.style.display = 'none';
            });
        
            // Show the targeted article
            var targetArticle = document.getElementById(id);
            targetArticle.style.display = 'block';
        }
        function toggleCardContent() {
            // Get the card content element
            var cardContent = document.querySelector('.card-content');

            // Toggle the display property of the card content
            if (cardContent.style.display === 'none') {
                cardContent.style.display = 'block';
            } else {
                cardContent.style.display = 'none';
            }
        }
    </script>

</body>
</html>
