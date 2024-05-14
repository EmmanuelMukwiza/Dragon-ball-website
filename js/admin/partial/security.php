<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.html");
    exit();
}



switch ($_SESSION['role']) {
    case 'admin':
        break;
    

        case 'user':
            header("Location: ../home/home.php");
            break;
    default:
        header("Location: ../login/home.php");
        exit();

        break;
}
?>