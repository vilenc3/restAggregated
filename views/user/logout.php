<center><img src="https://media.tenor.co/images/16fe97b70683870d3d4357a31c5a95a8/tenor.gif"/></center>
<center><h3>Goodbye <?php echo $_SESSION['username'];?>!</h3></center>
<?php
//session=[];
//delete cookie
session_destroy();
?>
<meta http-equiv="refresh" content="2;url=index.php" />