<?php
include_once 'config.php';
mysqli_query($conn,"UPDATE `book` SET `status` = 'finished' WHERE id='" . $_GET["id"] . "'");

header("Location:adminpage.php");
?> 