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
</body>
</html>