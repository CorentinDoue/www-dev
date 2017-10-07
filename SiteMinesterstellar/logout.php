<?php session_start();
	session_destroy();	
    header('Location: index.php?logout=true');
    include("footer.php");
    exit(); ?>

