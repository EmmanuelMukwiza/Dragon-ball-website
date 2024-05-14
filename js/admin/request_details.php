
<?php
include("../connection.php");


if (isset($_GET['name'])) {
    $characterName = $_GET['name'];

    $stmt = $conn->prepare("SELECT * FROM character_request WHERE name = :name");
    $stmt->bindParam(':name', $characterName);
    $stmt->execute();
    $char = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$char) {
        $stmt = $conn->prepare("SELECT * FROM approvals WHERE name = :name");
        $stmt->bindParam(':name', $characterName);
        $stmt->execute();
        $char = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    if (!$char) {
        echo "Character not found";
    }
} else {
    echo "Character name not provided";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Saitama">
    <script src="https://kit.fontawesome.com/b8b432d7d3.js" crossorigin="anonymous"></script>
</head>
<body>
<link rel="stylesheet" href="request_details.css">

</nav>

    <div class="container">

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
</body>
</html>