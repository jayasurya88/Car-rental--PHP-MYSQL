<?php
include_once 'config.php';
mysqli_query($conn,"DELETE FROM book WHERE id='" . $_GET["id"] . "'");
header("Location:adminpage.php");
?> 