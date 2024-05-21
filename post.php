<?php
$servername = "localhost:3308";
$username = "root";  
$password = "";     
$dbname = "blog_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$post_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT id, title, content, created_at FROM blog_posts WHERE id = $post_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>David Haniko Webpage - Blog Post</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
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
        <?php
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<article>";
            echo "<h2>" . $row["title"] . "</h2>";
            echo "<p>" . $row["content"] . "</p>";
            echo "<p><small>Posted on " . $row["created_at"] . "</small></p>";
            echo "</article>";
        } else {
            echo "<p>Post not found.</p>";
        }
        $conn->close();
        ?>
        <a href="blog.php">Back to Blog</a>
        <br><br><br><br><br><br>
    </main>

    <footer class="footer">
        <p>&copy; 2024 David Haniko</p>
    </footer>
</body>
</html>
