<center><form method="post">
        Filter<br>
		<label for="name">Restaurant Name:</label>
                <input id="name" type="text" name="name" placeholder="restaurant name">
                
                <label for="average_pricing">Minimal pricing:</label>
                <input id="average_pricing" type="number" step="any" name="average_pricing" min="0" max="10" placeholder="1 - most expensive">
                
                <label for="average_speed">Minimal speed:</label>
                <input id="average_speed" type="number" step="any" name="average_speed" min="0" max="10" placeholder="1 - slowest speed of service">
                
                <label for="average_presentation">Minimal presentation:</label>
                <input id="average_presentation" type="number" step="any" name="average_presentation" min="0" max="10" placeholder="1 - worst look">
                
                <label for="average_quality">Minimal quality:</label>
                <input id="average_quality" type="number" step="any" name="average_quality" min="0" max="10" placeholder="1 - worst quality">
           

	<div class="row-form">
        <input type="submit"  value="Submit" name="filter-restaurant">
    </div>
</form>
</center>

<?php
if(isset($_POST['filter-restaurant'])){
 
        $m=new restaurant();
            $m->name=$_POST['name'];
            $m->average_pricing=($_POST['average_pricing']);
            $m->average_speed=($_POST['average_speed']);
            $m->average_presentation=($_POST['average_presentation']);
            $m->average_quality=($_POST['average_quality']);
            $restaurant=$m->retrieveByFilters();
}else
{  
    $restaurant= restaurant::retrieveAll();
}

?>
 <center>
 <table id="display">
      
  <?php        
        while ($row=$restaurant->fetch()){ 
?>
            <tr>                  
                <td><h4><a href="index.php?page=restaurant/restaurant&id=<?php echo $row->id; ?>"><?php echo $row->name; }?></a></h4></td>
<!--                 <td><?php// echo $row->average_pricing; ?><br></td>
                <td><?php// echo $row->average_speed; ?><br></td>
                <td><?php// echo $row->average_presentation; ?><br></td>
                <td><?php// echo $row->average_quality; }?><br></td> -->
            </tr>
 <?php 
               $restaurant->closeCursor(); 
?>
    </table></center>