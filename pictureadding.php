<?php
include 'config.php'; // Ensure database connection is included

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Handle image upload
    $targetDir = "uploads/";
    $fileName = basename($_FILES["book_image"]["name"]);
    $targetFilePath = $targetDir . $fileName;

    if (move_uploaded_file($_FILES["book_image"]["tmp_name"], $targetFilePath)) {
        // Insert into database
        $stmt = $conn->prepare("INSERT INTO books (title, description, image_path) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $description, $targetFilePath);
        $stmt->execute();
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #574964, #9F8383, #C8AAAA );
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container {
            width: 90%;
            max-width: 800px;
            background: linear-gradient(to right, #574964, #9F8383, #C8AAAA );
            opacity: 89% ;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        input, textarea, button {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background:rgb(115, 78, 128);
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background:rgb(109, 97, 128);
        }

        .book-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .book-card {
            background: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .book-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 5px;
        }

        .book-info h3 {
            margin: 10px 0;
        }

        .book-info p {
            font-size: 14px;
            color: #555;
        }

        .delete-btn {
            display: inline-block;
            padding: 8px 12px;
            background: #e74c3c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .delete-btn:hover {
            background: #c0392b;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>📚 Add Pictures That Will Keep You Motivated</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="The name of the picture" required>
            <textarea name="description" placeholder="description" required></textarea>
            <input type="file" name="image" required>
            <button type="submit">Add To your liking.</button>
        </form>

        <h2>📖 Your Pictures</h2>
        <div class="book-list">
            <?php
            $result = $conn->query("SELECT * FROM books");
            while ($row = $result->fetch_assoc()):
            ?>
                <div class="book-card">
                    <img src="<?= $row['image_path'] ?>" alt="Book Cover">
                    <div class="book-info">
                        <h3><?= htmlspecialchars($row['title']) ?></h3>
                        <p><?= htmlspecialchars($row['description']) ?></p>
                        <a href="delete.php?id=<?= $row['id'] ?>" class="delete-btn">🗑 Delete</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

</body>
</html>
