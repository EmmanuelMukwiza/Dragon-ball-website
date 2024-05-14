
<?php
session_start();

if (isset($_SESSION['username'])) {
    echo 'loggedin';
} else {
    echo 'notloggedin';
}
?>
