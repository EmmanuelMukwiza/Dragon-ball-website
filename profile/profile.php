<?php
include("../connection.php");
session_start();

if(isset($_GET['name'])) {
    $characterName = $_GET['name'];

    $stmt = $conn->prepare("SELECT * FROM character_info WHERE name = :name");
    $stmt->bindParam(':name', $characterName);
    $stmt->execute();
    $char = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    $char = null;
    echo "Charachter not found";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Saitama">
    <title>OnePunchMan</title>
    <script src="https://kit.fontawesome.com/b8b432d7d3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="../home/home.css">
</head>
<body>
<script src="login/check_session.js"></script>
<nav class="navbar">
    <a class="navbar-brand rounded-logo" href="../home/home.php">
        <img src="../home/Goku.png" alt="Navbar Logo"> 
    </a>

    <ul class="navbar-nav">
        <li class="nav-item Main central">
            <a class="nav-link active" aria-current="page" href="../main/main.php">Main</a>
        </li>
        <li class="nav-item AI central">
            <a class="nav-link" href="../admin/request_admin">Admin</a>
        </li>
        <li class="nav-item Shows central">
            <a class="nav-link" href="../Request/request.php">Request a hero</a>
        </li>
    </ul>
    
    <div class="nav-icons">
        <a class="nav-link" href="../main/main.php"><i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i></a>
        <a class="nav-link" href="../login/login.php" id="userIcon"><i class="fa-solid fa-user" style="color: #ffffff;"></i></a>
        <a class="nav-link" href="../login/logout.php"><i class="fa-solid fa-sign-out" style="color: #ffffff;"></i></a>
    </div>
</nav>

    <div class="container">

    <img src="goku-pro.png" alt="Goku" class="profile-image-left" style="position: absolute; bottom: 25%; left: -77px; ; width:500px; height: 500px; object-fit: cover;  overflow: visible;">
    <img src="vegeta-pro.png" alt="Vegeta" class="profile-image-right" style="position: absolute; bottom: 30%; right: 20px; margin-right: 20px; width: 360px; height: 360px; object-fit: cover;  overflow: visible;">

        <div class="profile-card">
            <div class="profile-header">
          
                <div class="main-profile">
                    <div class="profile-image" style="background-image: url('<?php echo $char['face_image']; ?>')"></div>
                    <div class="profile-names">
                        <h1 class="username"><?php echo $char['name']; ?></h1>
                        <small class="page-title"><?php echo $char['affiliation']; ?></small>
                    </div>
</div>
            </div>

            <div class="profile-body">
                <div class="profile-actions">
                    <button class="follow">Follow</button>
                    <button class="message">Message</button>
                    <section class="bio">
                        <div class="bio-header">
                            <i class="fa fa-info-circle"></i>
                            Bio
                        </div>
                        <p class="bio-text"><?php echo $char['description']; ?></p>
                    </section>
                </div>

                <div class="account-info">
                    <div class="data">
                        <div class="important-data">
                            <section class="data-item">
                                <h3 class="value"><?php echo $char['ki']; ?> </h3>
                                <hr>
                                <small class="title">Base Ki</small>
                            </section>
                            <section class="data-item">
                                <h3 class="value"><?php echo $char['max_ki']; ?></h3>
                                <hr>
                                <small class="title">Max Ki</small>
                            </section>
                            </section>
                            <section class="data-item">
                                <h3 class="value">Gender</h3>
                                <hr>
                                <small class="title"><?php echo $char['gender']; ?></small>
                            </section>
                        </div>
                        <div class="other-data">
                            <section class="data-item">
                                <h3 class="value"><?php echo $char['race']; ?></h3>
                                <hr>
                                <small class="title">Race</small>
                            </section>
                            <section class="data-item">
                                <h3 class="value"><?php echo $char['id']; ?></h3>
                                <hr>
                                <small class="title">ID</small>
                            </section>
                            <section class="data-item">
                                <h1 class="value"><?php echo $char['affiliation']; ?></h1>
                                <hr>
                                <small class="title">Affiliation</small>
                            </section>
                        </div>
                    </div>

                    <div class="social-media">
                        <span>Follow me in:</span>
                        <a href="" class="media-link"><i class="fab fa-facebook-square"></i></a>
                        <a href="" class="media-link"><i class="fab fa-twitter-square"></i></a>
                        <a href="" class="media-link"><i class="fab fa-instagram-square"></i></a>
                    </div>
                    
                    <div class="last-post">
    <div class="post-cover">
        <div class="ability" style="margin-bottom: 25px;">
            <label for="strength" style="font-size: 24px;  color:  rgba(255, 255, 255, 0.7);  margin-right: 18px;"><?php echo $char['ability_1']; ?></label>
            <a href="#" data-video-url="https://www.youtube.com/watch?v=<?php echo $char['ability_1_yt']; ?>" class="youtube-icon"><i class="fa-brands fa-youtube" style="color: #74C0FC; font-size: 18px;"></i></a>
        </div>
        <div class="ability" style="margin-bottom: 25px;">
            <label for="speed" style="font-size: 24px;  color:  rgba(255, 255, 255, 0.7);  margin-right: 18px;"><?php echo $char['ability_2']; ?></label>
            <a href="#" data-video-url="https://www.youtube.com/watch?v=<?php echo $char['ability_2_yt']; ?>" class="youtube-icon"><i class="fa-brands fa-youtube" style="color: #74C0FC; font-size: 18px;"></i></a>
        </div>
        <div class="ability" style="margin-bottom: 25px;">
            <label for="durability" style="font-size: 24px; color:  rgba(255, 255, 255, 0.7); margin-right: 18px;"><?php echo $char['ability_3']; ?></label>
            <a href="#" data-video-url="https://www.youtube.com/watch?v=<?php echo $char['ability_3_yt']; ?>" class="youtube-icon"><i class="fa-brands fa-youtube" style="color: #74C0FC; font-size: 18px;"></i></a>
        </div>
        <div class="ability" style="margin-bottom: 25px;">
            <label for="accuracy" style="font-size: 24px;  color:  rgba(255, 255, 255, 0.7);  margin-right: 18px;"><?php echo $char['ability_4']; ?></label>
            <a href="#" data-video-url="https://www.youtube.com/watch?v=<?php echo $char['ability_4_yt']; ?>" class="youtube-icon"><i class="fa-brands fa-youtube" style="color: #74C0FC; font-size: 18px;"></i></a>
        </div>
    </div>
</div>



                </div>
            </div>
        </div>

    </div>



    <script>
document.addEventListener('DOMContentLoaded', function() {
    function openVideoPopup(event) {
        event.preventDefault();
        const videoUrl = this.getAttribute('data-video-url');
        const width = 800;
        const height = 600; 
        const left = window.innerWidth / 2 - width / 2;
        const top = window.innerHeight / 2 - height / 2;
        const popupFeatures = `width=${width},height=${height},left=${left},top=${top},resizable=yes,scrollbars=yes,status=yes`;
        const popupWindow = window.open(videoUrl, '_blank', popupFeatures);

        if (popupWindow) {
            popupWindow.focus();
        }
    }
    document.querySelectorAll('.youtube-icon').forEach(icon => {
        icon.addEventListener('click', openVideoPopup);
    });
});
</script>
<link rel="stylesheet" href="home.css">
<script src="../login/check_session.js"></script>

</body>
</html>
