<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #574964, #9F8383, #C8AAAA );
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background: linear-gradient(to right,rgb(109, 94, 123),rgb(129, 101, 101),rgb(160, 123, 123) );
            opacity:89%;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            border-color: black;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: rgb(158, 131, 131);
            text:rgb(83, 71, 95)
        }
        button {
            width: 100%;
            padding: 10px;
            background:rgb(80, 67, 96);
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background:rgb(86, 65, 111);
        }
        .error {
            color: black;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="" method="POST">
            <input type="text" name="Username" placeholder="Username" required>
            <input type="password" name="Password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <?php
        session_start();
        include "config.php";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Username = htmlspecialchars($_POST["Username"]);
            $password = $_POST["Password"];
        
            $sql = "SELECT * FROM users WHERE Username=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $Username);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
        
            if ($user && password_verify($password, $user["password"])) {
                $_SESSION["user"] = $user["username"];
                header("Location: dashboard.php");
                exit();
            } else {
                echo '<p class="error">Invalid username or password!</p>';
            }
        }
        ?>
    </div>
</body>
</html>
