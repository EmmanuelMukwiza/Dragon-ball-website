<?php
include("../connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password =  password_hash($_POST['pass'], PASSWORD_DEFAULT);

    $checkStmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $checkStmt->bindParam(':username', $username);
    $checkStmt->execute();

    if ($checkStmt->rowCount() > 0) {
        echo "Username already exists. Please choose another.";
        header("Refresh: 2; url=../signup/signup.php");
        exit();
    } else {
        $insertStmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $insertStmt->bindParam(':username', $username);
        $insertStmt->bindParam(':password', $password);

        if ($insertStmt->execute()) {
            header("Location: ../login/login.html");
            exit();
        } else {
            echo "Error creating account.";
        }
    }
} else {
    echo "No data received.";
}
?>
