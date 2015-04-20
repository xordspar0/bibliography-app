<?php
if ( isset($_SESSION['name']) ) {
    header("Location: bibliography_management.php");
} else {
    header("Location: login.php");
}

exit;
?>