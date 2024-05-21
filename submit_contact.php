<?php
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "david_web";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>David Haniko Webpage - Contact</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <script src="interactive.js"></script>

    <header>
        <div class="tombol">
            <div class="judul">
                <h1>Knowledge Web</h1>
            </div>
            <nav>
                <button><a href="index.html">HOME</a></button>
                <button><a href="gallery.html">GALLERY</a></button>
                <button><a href="blog.html">BLOG</a></button>
                <button><a href="contact.html">CONTACT</a></button>
            </nav>
        </div>
    </header>

    <main class="container">
        <h1>Contact</h1>
        <br>
        <section class="contact-info">
            <h2>Contact Information</h2>
            <ul>
                <li><a href="https://www.instagram.com/davehaniko/">Instagram</a></li>
                <li><a href="https://wa.me/6285397180704">Whatsapp</a></li>
            </ul>
        </section>

        <br><br>

        <section class="contact-form">
            <h2>Contact Form</h2>
            <form action="submit_contact.php" method="POST">
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" required><br><br>

                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required><br><br>

                <label for="message">Message:</label><br>
                <textarea id="message" name="message" rows="4" required></textarea><br><br>

                <button type="submit">Submit</button>
            </form>
        </section>
        <br><br><br><br><br><br>
    </main>

    <footer class="footer">
        <p>&copy; 2024 David Haniko</p>
    </footer>
</body>
</html>
