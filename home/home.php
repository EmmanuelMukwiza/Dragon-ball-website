<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-image: url('background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-color: rgba(42, 42, 42, 0.7); /* 70% opacity */
            font-family: 'Pistacho Soft', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(116, 185, 255, 0.1); /* Soft blue color */
            color: rgba(255, 255, 255); 
            padding: 10px 20px;
            width: 100%;
            border: none;
        }

        .navbar-brand img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
        }

        .navbar-nav {
            display: flex;
            gap: 100px;
            list-style-type: none;
        }

        .navbar-nav a {
            color: black;
            font-family: 'Pistacho Soft', sans-serif;
            text-decoration: none;
            position: relative;
        }

        .navbar-nav .nav-item.central a,
        .navbar-nav .nav-item.central a.active {
            color: #979A9A;
        }

        .navbar-nav .nav-item.central a::after {
            content: '';
            display: block;
            width: 3px;
            height: 3px;
            background-color: transparent;
            position: absolute;
            bottom: -6px;
            left: 50%;
            transform: translateX(-50%);
            transition: background-color 0.3s ease-in-out;
        }

        .navbar-nav .nav-item.central a:hover {
            color: white;
        }

        .navbar-nav .nav-item.central a:hover::after {
            background-color: #AB57F7;
        }

        .nav-icons {
            display: flex;
            gap: 30px;
            margin-right: 50px;
        }

        .image-goku-flying {
            width: 80%;
            position: absolute;
            left: 420px;
            top: 70px;
        }

        .left-content {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-top: 110px;
            margin-left: 50px;
            color: black;
            max-width: 50%;
            padding-left: 20px;
        }

        .text-img {
            margin-right: 150px;
        }

        .left-content .image-container img {
            max-width: 50%;
            height: auto;
        }

        .left-content .text-container {
            text-align: left;
        }

        .left-content .text-container h1 {
            font-size: 24px;
        }

        .left-content .text-container p {
            margin: 10px 0;
        }

        .btn {
            padding: 15px 30px; /* Larger padding */
            background-color: rgba(171, 87, 247, 0.2); /* Light purple with 20% opacity */
            color: white;
            border-radius: 30px; /* Larger border radius */
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #979A9A;
        }

        .btn-signup {
            padding: 15px 30px; /* Larger padding */
            background-color: rgba(255, 255, 255, 0.2); /* White with 20% opacity */
            color: #AB57F7;
            border-radius: 30px; /* Larger border radius */
            border: 2px solid #AB57F7;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-signup:hover {
            background-color: #AB57F7;
            color: white;
        }
    </style>
    <script src="https://kit.fontawesome.com/fd451e4400.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar">
    <a class="navbar-brand rounded-logo" href="home.php">
        <img src="Goku.png" alt="Navbar Logo"> 
    </a>

    <ul class="navbar-nav">
        <li class="nav-item Main central">
            <a class="nav-link active" aria-current="page" href="../main/main.php">Main</a>
        </li>
        <li class="nav-item AI central">
            <a class="nav-link" href="../admin/request_admin.php">Admin</a>
        </li>
        <li class="nav-item Shows central">
            <a class="nav-link" href="../Request/request.php">Request a hero</a>
        </li>
    </ul>
    
    <div class="nav-icons">
        <a class="nav-link" href="../main/main.php"><i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i></a>
        <a class="nav-link" href="../login/login.html"  id="userIcon"><i class="fa-solid fa-user" style="color: #ffffff;"></i></a>
        <a class="nav-link" href="../login/logout.php"><i class="fa-solid fa-sign-out" style="color: #ffffff;"></i></a>
    </div>
</nav>

<div class="left-content">
    <div class="image-container">
        <img src="DRAGON-BALL-text.png" alt="Dragon Ball Text" class="text-img">
    </div>

    <div class="text-container"> 
        <h1>Welcome to the world of Dragon Ball!</h1>
        <b>
        <p>Dragon Ball," a Japanese franchise by Akira Toriyama, chronicles Son Goku's martial arts odyssey, pursuit of the Dragon Balls, and epic battles against formidable adversaries. It explores themes of friendship, personal growth, and determination in a fantastical universe brimming with adventure and imagination, captivating audiences across various media platforms worldwide.</p>
        </b>
        <a href="../main/main.php"><button class="btn btn-primary">Charachters</button></a>
        <a href="../signup/signup.php"><button class="btn-signup">Sign Up</button></a>
    </div>
</div>

<img src="goku-flying.png" alt="Flying Goku" class="image-goku-flying">
</body>
</html>
