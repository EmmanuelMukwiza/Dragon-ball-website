<?php
include("../connection.php");
include("../security.php");
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
</head>
<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <nav style="background-color: orange;" class="navbar navbar-expand-lg" class="navbar" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="Dragon_Ball_Super.png" alt="Bootstrap" width="170" height="70">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../home/home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-disabled="false" href="../Request/request.php">Request Charachter</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" aria-disabled="false" href="../admin/request_admin.php">Admin</a>
          </li>
        </ul>
        <form class="d-flex" role="search"   method="get" action="../leaderboard.php">
        <a href="../leaderboard.php"><input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="background-color:orange;"></a>
        <button class="btn btn-outline-warning" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="website-logo">
  <img src="main_logo.png" alt="image-website-logo" style = "object-fit: cover; display: block; margin-left: auto;margin-right: auto;width: 50%" >
  </div>
  
  <div class="container" style = "overflow: visible;">
    <div class="content-container">

      <?php foreach ($dragonball_data as $char) { ?>

        <a href="../profile/profile.php?name=<?php echo urlencode($char['name']); ?>" class="text-decoration-none">
          <div class="card" style="overflow: visible; width: 300px; background-color: orange;">

            <img style="overflow: visible; width: 350x; height: 500px; object-fit: cover; display: block; margin-left: auto;margin-right: auto;width: 50%; transition: transform 0.6s ease-in-out;" src="<?php echo $char['image']; ?>"alt="..." onmouseover="this.style.transform='scale(1.2)'" onmouseout="this.style.transform='scale(1)'">

            <div class="card-body">

              <h5 class="card-title"><h1 class="card-title"><b><?php echo $char['name']?></b></h1></h5>

            </div>

            <ul class="list-group-flush" style="background-color: orange;">

              <li class="list-group-item">Race: <?php echo $char['race'] ?></li>

              <li class="list-group-item">Base Ki: <?php echo $char['ki']?></li>

              <li class="list-group-item">Max ki: <?php echo $char['max_ki']?></li>

            </ul>

          </div>
        </a>
      <?php } ?>
    </div>
  </div>




  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="main.css">
  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
