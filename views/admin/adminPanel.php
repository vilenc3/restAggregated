<html>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
            if(isset($_SESSION['username'])){
                if($_SESSION['isAdmin'] == '1'){
            ?>

<center>
    <p><a href="index.php?page=admin/restaurantCRUD">Restaurant CRUD</a></p>
    <p><a href="index.php?page=admin/customerCRUD">Customer CRUD</a></p>
</center>


          <?php
                }else{
                echo "<script type='text/javascript'>alert('Security breach alert!');</script>";
                ?><center><img src="images/zlodziejx.jpg" width="30%" height="50%" class="img-fluid" alt="img13" /></a></center><?php
            }
        }
            
    
?>
</html>