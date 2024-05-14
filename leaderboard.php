<?php 
include("connection.php");

$sql = "SELECT * FROM character_info";
$result = $conn->query($sql);
$dragonball_data = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Request's</title>
    <link rel="stylesheet" type="text/css" href="leaderboard.css">
</head>
<body>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Hero Association</h1>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="images/search.png" alt="">
            </div>
        </section>
        <section class="table__body">
            <table class="sortable">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Ki</th>
                        <th>Max ki</th>
                        <th>Race</th>
                        <th>more</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dragonball_data as $char) { ?>
                    <tr>
                        <td><img src="<?php echo $char['face_image']; ?>" alt="Face Image"></td>
                        <td><?php echo $char['name']; ?></td>
                        <td><?php echo $char['ki']; ?></td>
                        <td><?php echo $char['max_ki']; ?></td>
                        <td><?php echo $char['race']; ?></td>
                        <td><a href="../Profile/Profile.php?name=<?php echo urlencode($char['name']); ?>" class="text-decoration-none" target="_blank">Details</a></td>
                        <td></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </main>
    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
    <script src="Script.js"></script>
</body>
</html>
