<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login
    </title>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    header {
        margin-top: 15px;  
        padding: 10px 20px; 
        background: linear-gradient(to right, #574964, #9F8383, #C8AAAA );
        opacity: 89%;
        color: white;
        display: flex;
        flex-direction:row;
        align-items: center;
        text-align: center;
        justify-content:flex-start;
      }
    
      header .logo {
        display: flex;
        flex-direction: row;
        justify-content: center;
        text-align: center;
      }
    
    body {
        background: 
            radial-gradient(circle, rgba(0, 0, 0, 0.2) 30%, rgba(0, 0, 0, 0.8) 100%), 
            url('books.png');
        background-size: cover;
        background-position: center;
        margin: 0;
        height: 100vh;
        opacity: 95%;
    }
    
    
    
    header .logo h1 {
        
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }
    header .logo h1 a{
        padding: 10px;
    
    }
    
    header nav{
        margin-left: 60%;
    }
    
    header nav ul {
        display: flex;
        flex-direction: row;
        list-style: none;
        
    }
    
    header nav ul li {
        margin-left: 20px;
    
    
    
    }
    
    header nav ul li a {
        color: white;
        text-decoration: none;
        font-weight: bold;
        margin-top: 50px;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
       
    
    
    }
    main {
        padding: 40px 20px;
    }
        .container {
            display: flex;
            width: 80%;
            background: linear-gradient(to right, #574964, #9F8383, #C8AAAA );
            opacity: 79%;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .image {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .image img {
            width: 100%;
            max-width: 300px;
            border-radius: 10px;
        }
        .description {
            flex: 2;
            padding: 20px;
        }
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                text-align: center;
            }
            .image, .description {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>fletë të Pambarimta </h1>
            <a href="index.html"><img src="icon.png" alt="Home Icon" style="height: 70px; width: 70px;"></a>
        <nav>
            <ul>
                <li><a href="login.php" method="POST">Log In</a></li>
                <li><a href="signup.php" method="POST">Sign Up</a></li>
                <li><a href="bookmenagment.php">Keep Track</a></li>
            </ul>
        </nav>
    </header>
    <br>
    <div class="container">
        <div class="image">
            <img src="bookshop.png" alt="Your Image">
        </div>
        <div class="description">
            <h2>Advice</h2>
           <p>Being a loser isn’t cool—there’s nothing great about not trying, staying ignorant, or acting like knowledge doesn’t matter. What’s really impressive is being smart, knowing a lot, and constantly learning. Intelligence opens doors, helps you succeed, and earns you respect. When you understand the world, you can make better choices, have deeper conversations, and actually make a difference. The people who change the world aren’t the ones who settle for being average; they’re the ones who push themselves to grow. So why waste potential? It’s way better to be sharp, informed, and capable than to be clueless and left behind.</p>
           <p>With our website you can keep track of you favorite books and remember how good it feeels to know more than poeple that do not like you.</p>
        </div>
    </div>
    <?php
include 'config.php'; // Database connection

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $targetDir = "uploads/";
    $fileName = basename($_FILES["book_image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    
    if (move_uploaded_file($_FILES["book_image"]["tmp_name"], $targetFilePath)) 
        $stmt = $conn->prepare("INSERT INTO books (title, description, image_path) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $description, $targetFilePath);
        $stmt->execute();
        $stmt->close();
    }

?>
</body>
</html>