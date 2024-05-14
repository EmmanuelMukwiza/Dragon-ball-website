<?php
include("partial/security.php");
include("../connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['approve'])) {
        $charId = $_POST['char_id'];
        $requested_by = $_SESSION['username'];
        approveCharacter($charId, $conn, $requested_by);
    } elseif (isset($_POST['deny'])) {
        $charId = $_POST['char_id'];
        $requested_by = $_SESSION['username'];
        denyCharacter($charId, $conn,$requested_by);
    }
}


function approveCharacter($charId, $conn, $requested_by) {
    try {
        $stmt = $conn->prepare("INSERT INTO Approvals (id, name, ki, max_ki, race, gender, description, image, affiliation, face_image, ability_1, ability_2, ability_3, ability_4, ability_1_yt, ability_2_yt, ability_3_yt, ability_4_yt, approval_status, requested_by) 
            SELECT id, name, ki, max_ki, race, gender, description, image, affiliation, face_image, ability_1, ability_2, ability_3, ability_4, ability_1_yt, ability_2_yt, ability_3_yt, ability_4_yt, true, :requested_by 
            FROM character_request WHERE id = :charId");
        $stmt->bindParam(':charId', $charId);
        $stmt->bindParam(':requested_by', $requested_by);
        $stmt->execute();

        $stmt = $conn->prepare("INSERT INTO character_info (id, name, ki, max_ki, race, gender, description, image, affiliation, face_image, ability_1, ability_2, ability_3, ability_4, ability_1_yt, ability_2_yt, ability_3_yt, ability_4_yt) 
            SELECT id, name, ki, max_ki, race, gender, description, image, affiliation, face_image, ability_1, ability_2, ability_3, ability_4, ability_1_yt, ability_2_yt, ability_3_yt, ability_4_yt 
            FROM character_request WHERE id = :charId");
        $stmt->bindParam(':charId', $charId);
        $stmt->execute();

        $stmt = $conn->prepare("DELETE FROM character_request WHERE id = :charId");
        $stmt->bindParam(':charId', $charId);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error approving character: " . $e->getMessage();
    }
}

function denyCharacter($charId, $conn,$requested_by) {
    try {
        $stmt = $conn->prepare("INSERT INTO Approvals (id, name, ki, max_ki, race, gender, description, image, affiliation, face_image, ability_1, ability_2, ability_3, ability_4, ability_1_yt, ability_2_yt, ability_3_yt, ability_4_yt, approval_status,requested_by) 
            SELECT id, name, ki, max_ki, race, gender, description, image, affiliation, face_image, ability_1, ability_2, ability_3, ability_4, ability_1_yt, ability_2_yt, ability_3_yt, ability_4_yt, false ,:requested_by
            FROM character_request WHERE id = :charId");
        $stmt->bindParam(':charId', $charId);
        $stmt->bindParam(':requested_by', $requested_by);
        $stmt->execute();

        $stmt = $conn->prepare("DELETE FROM character_request WHERE id = :charId");
        $stmt->bindParam(':charId', $charId);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error denying character: " . $e->getMessage();
    }
}
$sql = "SELECT * FROM character_request";
$result = $conn->query($sql);
$dragonball_data = $result->fetchAll(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .action-btn {
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            border: none;
        }

        .approve-btn {
            background-color: #4CAF50;
            color: white;
        }

        .deny-btn {
            background-color: #f44336;
            color: white;
        }

        .action-btn:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
<div class="wrapper d-flex align-items-stretch">
    <?php include "partial/menu.php"?>
  
    <div id="content" class="p-4 p-md-5 pt-5">
        <main class="table" id="customers_table">
            <section class="table__header">
                <h1>Request's</h1>
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
                            <th>Approve</th>
                            <th>Deny</th>
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
                                <td><?php echo $char['requested_by']; ?></td>
                                <td><a href="Request_details.php?name=<?php echo urlencode($char['name']); ?>" class="text-decoration-none" target="_blank">Details</a></td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="char_id" value="<?php echo $char['id']; ?>">
                                        <button type="submit" name="approve" class="action-btn approve-btn">Approve</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="char_id" value="<?php echo $char['id']; ?>">
                                        <button type="submit" name="deny" class="action-btn deny-btn">Deny</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </section>
        </main>
        <link rel="stylesheet" type="text/css" href="../leaderboard.css">
        <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
        <script src="../Script.js"></script>
    </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>
