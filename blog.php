<?php
$servername = "localhost:3308";
$username = "root";  
$password = "";     
$dbname = "david_web";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, title, content, created_at FROM blog_posts";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>David Haniko Webpage - Blog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <script>src='interactive.js'</script>

    <header>
        <div class="tombol">
            <div class="judul">
            <h1>Knowledge Web</h1>
            </div>
            <nav>
                <button><a href="index.html">HOME</a></button>
                <button><a href="gallery.html">GALLERY</a></button>
                <button><a href="blog.php">BLOG</a></button>
                <button><a href="contact.html">CONTACT</a></button>
            </nav>
        </div>
    </header>

    <main class="container">
        <h1>Blog</h1>
        <br>
        <div class="blog-content">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $summary = substr($row["content"], 0, 200) . "...";
                    echo "<article>";
                    echo "<h2>" . $row["title"] . "</h2>";
                    echo "<p>" . substr($row["content"], 0, 50) . "...</p>";
                    echo "<p><small>Posted on " . $row["created_at"] . "</small></p>";
                    echo "<a href='post.php?id=" . $row["id"] . "'>Read More</a>";
                    echo "</article><br>";
                }
            } else {
                echo "<p>No blog posts found.</p>";
            }
            $conn->close();
            ?>
        </div>
        <br><br><br><br><br><br>
    </main>

    <footer class="footer">
        <p>&copy; 2024 David Haniko</p>
    </footer>
</body>
</html>
