<?php
 session_start();

 if (isset($_POST['login'])) {
     $login_username = $_POST['username'];
     $password_user = $_POST['password'];
 
     include("../connection.php");
 
     $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
     $stmt->bindParam(':username', $login_username);
     $stmt->execute();
     $user = $stmt->fetch(PDO::FETCH_ASSOC);
 
     if ($user) {
         if (password_verify($password_user, $user['password'])){
             $_SESSION['username'] = $login_username;
             $_SESSION['role'] = $user['type'];
 
             if ($user['type'] === 'admin') {
                 header("Location:../admin/request_admin.php");
             } else {
                 header("Location: ../home/home.php");
             }
             exit();
         } else {
             echo "Invalid username or password!";
         }
     } else {
        echo "This user does not exist! Please register first.";
        header("Refresh: 2; url=../login/login.html");
        exit();
     }
     }




?>