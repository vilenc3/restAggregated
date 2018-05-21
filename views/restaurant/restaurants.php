<center><form method="post">
        <br>                
                <label for="average_pricing">Minimal pricing:</label>
                <input id="average_pricing" type="number" step="any" name="average_pricing" min="0" max="10" placeholder="1 - most expensive">
                
                <label for="average_speed">Minimal speed:</label>
                <input id="average_speed" type="number" step="any" name="average_speed" min="0" max="10" placeholder="1 - slowest speed of service">
                
                <label for="average_presentation">Minimal presentation:</label>
                <input id="average_presentation" type="number" step="any" name="average_presentation" min="0" max="10" placeholder="1 - worst look">
                
                <label for="average_quality">Minimal quality:</label>
                <input id="average_quality" type="number" step="any" name="average_quality" min="0" max="10" placeholder="1 - worst quality">
           
                 <input type="submit"  value="Submit" name="filter-restaurant">
</form>
</center>

<?php
if(isset($_POST['filter-restaurant'])){
 
        $m=new restaurant();
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

  <?php        
        while ($row=$restaurant->fetch()){ 
?>
                <?php
                $randNum1 =  rand(1,300);
                $randNum2 = rand(1,300);
                $randNum3 = rand(1,300);
                ?>

<div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="index.php?page=restaurant/restaurant&id=<?php echo $row->id; ?>" target="_blank">
          <img src="https://picsum.photos/300/200?image=<?php echo $randNum1-1;?>" style="width:100%">
          <div class="caption">
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="index.php?page=restaurant/restaurant&id=<?php echo $row->id; ?>" target="_blank">
          <img src="https://picsum.photos/300/200?image=<?php echo $randNum2-1;?>" style="width:100%">
          <div class="caption">
            <center>
            <a href="index.php?page=restaurant/restaurant&id=<?php echo $row->id; ?>"><?php echo $row->name; ?></a></h4>
            </center>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="index.php?page=restaurant/restaurant&id=<?php echo $row->id; ?>" target="_blank">
          <img src="https://picsum.photos/300/200?image=<?php echo $randNum3-1;?>" style="width:100%">
          <div class="caption">
          </div>
        </a>
      </div>
    </div>
  </div>
</div>

 <?php 
}
               $restaurant->closeCursor(); 
?>

