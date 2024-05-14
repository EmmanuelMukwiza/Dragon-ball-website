<?php
include("partial/security.php");
include("../connection.php");


if (isset($_POST['remove'])) {
    
    $useridremove = $_POST['user_id'];
    $stmt = $conn->prepare("SELECT type FROM users WHERE id = :id");
    $stmt->bindParam(':id', $useridremove);
    $stmt->execute();
    $userType = $stmt->fetchColumn();
    
    if ($userType !== 'admin') {
        $deleteStmt = $conn->prepare("DELETE FROM users WHERE id = :id");
        $deleteStmt->bindParam(':id', $useridremove);
        $deleteStmt->execute();
        header("Location: Users.php");
        exit();
    } else {
        echo "Cannot delete admin user.";
    }
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
$users = $result->fetchAll(PDO::FETCH_ASSOC);
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
                <h1>Approved Characters</h1>
                <div class="input-group">
                    <input type="search" placeholder="Search Data...">
                    <img src="../images/search.png" alt="">
                </div>
            </section>
            <section class="table__body">
                <table class="sortable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) { ?>
                            <tr>
                                <td><?php echo $user['id']?></td>
                                <td><?php echo $user['username']; ?></td>
                                <td><?php echo $user['type']; ?></td>
                                <td>
                                    <?php if ($user['type'] !== 'admin') { ?>
                                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                            <button type="submit" name="remove" class="btn btn-danger">Remove</button>
                                        </form>
                                    <?php } else {
                                        echo "Admin User";
                                    } ?>
                                </td>
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
