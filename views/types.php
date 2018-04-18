<center>
<?php

$type=$_GET['type'];

    $restaurant=new restaurant();
    $restaurant->type=$type;
    $res=$restaurant->retrieveByType();
    echo $type;?><br><?php
    while($row=$res->fetch()){
    	?>
    	<a href="index.php?page=restaurant/restaurant&id=<?php echo $row->id; ?>"><img src="https://picsum.photos/300/200?image=<?php mt_rand(0,1000)?>" title="<?php echo $row->name;?>"></a><br>
    	<a href="index.php?page=restaurant/restaurant&id=<?php echo $row->id; ?>"><?php echo $row->name; ?></a><br>
<?php
    }
?>
</center>