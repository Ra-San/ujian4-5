<?php
include 'db.php';

$sql = "SELECT * FROM blog_posts ORDER BY date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Os1 Blog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">Os1<span>Pedia</span></div>
            <nav>
                <ul>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Solutions</a></li>
                    <li><a href="#">Case Studies</a></li>
                    <li><a href="#">Company</a></li>
                    <li><a href="#">Career</a></li>
                    <li><a href="#" class="contact-btn">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="blog-section">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <article class="blog-card">
                        <div class="date">
                            <span><?php echo date("d", strtotime($row['date'])); ?></span>
                        </div>
                        <img src="<?php echo $row['image_url']; ?>" alt="Blog image">
                        <div class="content">
                            <h3><?php echo $row['title']; ?></h3>
                            <p><?php echo $row['content']; ?></p>
                            <a href="#" class="read-more">Baca Selengkapnya</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No blog posts found.</p>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>

<?php
$conn->close();
?>
