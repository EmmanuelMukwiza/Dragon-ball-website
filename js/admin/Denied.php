<?php
include("partial/security.php");
include("../connection.php");

$sql = "SELECT * FROM Approvals WHERE approval_status = false";
$result = $conn->query($sql);
$denied_data = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="wrapper d-flex align-items-stretch">

    <?php include "partial/menu.php"?>

    <div id="content" class="p-4 p-md-5 pt-5">
        <main class="table" id="customers_table">
            <section class="table__header">
                <h1>Denied Characters</h1>
                <div class="input-group">
                    <input type="search" placeholder="Search Data...">
                    <img src="../images/search.png" alt="">
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
                            <th>Requested by</th>
                            <th>More</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($denied_data as $char) { ?>
                            <tr>
                                <td><img src="<?php echo $char['face_image']; ?>" alt="Face Image"></td>
                                <td><?php echo $char['name']; ?></td>
                                <td><?php echo $char['ki']; ?></td>
                                <td><?php echo $char['max_ki']; ?></td>
                                <td><?php echo $char['race']; ?></td>
                                <td><?php echo $char['requested_by']; ?></td>
                                <td><a href="Request_details.php?name=<?php echo urlencode($char['name']); ?>" class="text-decoration-none" target="_blank">Details</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="../leaderboard.css">
<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
<script src="../Script.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>
</body>
</html>