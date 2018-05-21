<center>
<?php

$type=$_GET['type'];

    $restaurant=new restaurant();
    $restaurant->type=$type;
    $res=$restaurant->retrieveByType();
    echo $type;?><br><?php
    while($row=$res->fetch()){
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
?>
</center>