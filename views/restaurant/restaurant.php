<html>
<head>
<style>
div.gallery {
    margin: 5px;
    border: 1px solid #ccc;
    float: left;
    width: 180px;
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {
    width: 100%;
    height: auto;
}

div.desc {
    padding: 15px;
    text-align: center;
}
</style>
</head>
<body>

<center> 
    <img src="https://picsum.photos/600/500/?random" align="left">
    
<?php

if($_GET['id']){
$idRestaurant=$_GET['id'];

    $res1=new restaurant();
    $res1->idRestaurant=$idRestaurant;
    if($res1->retrieveByID()){
        ?>
    Restaurant name:<b><?php echo $res1->name;?></b><br>
    Address:<b><?php echo $res1->address;?></b><br>
    Phone Number:<b><?php echo $res1->phone;?></b><br>
    District name:<b><?php echo $res1->disName;?></b><br><br>
 
    <?php echo $res1->description;?><br><br>
    Pricing:<b><?php echo $res1->average_pricing;?></b>
    Speed:<b><?php echo $res1->average_speed;?></b>
    Design:<b><?php echo $res1->average_presentation;?></b>
    Quality:<b><?php echo $res1->average_quality;?></b><br><br>

  
       <?php 
    } 
    $disName = $res1->disName;
    ?>
<b>Reserve table in here</b>:
<div class="rw-ui-container"></div>
<?php
if(isset($_SESSION['username'])){?>
    <form method='post'>
        
  <div>
        <label for="date">Select the date:</label>
                <input id="date" type="date" name="date" required>
    </div> 
    <div>
        <label for="time">Select the time:</label>
                <input id="time" type="time" name="time" required>
    </div> 
    <div>
        <label for="numberPpl">Specify the number of people:</label>
                <input id="numberPpl" type="number" name="numberPpl" min="1" max="10" required>
    </div>
    <label for="comments">Write any comments (optional):</label> 
    <div id="textarea">
      <textarea name='comments' id='comments' cols="40" rows="13" ></textarea><br />
    </div>
        <input type='hidden' name='idUser' id='idUser' value='<?php echo $_SESSION['id']; ?>' required/>
        <input type='hidden' name='idRestaurant' id='idRestaurant' value='<?php echo $_GET['id']; ?>' required/>
        <input type='hidden' name='status' id='status' value='1' required/>
  <input type="submit" value="Submit" name="reserve-restaurant" onclick="msg()">  
</form>

<script>
function msg() {
    alert("Your reservation has been sent and is waiting for the restaurant");
}
</script>

<?php
}else
    echo 'You have to be logged in to be able to reserve table';
?>    


<div class="gallery">
  <a target="_blank" href="https://picsum.photos/300/200?image=620">
    <img src="https://picsum.photos/300/200?image=620" alt="Photo1" width="300" height="200">
  </a>
  <div class="desc">Photo 1</div>
</div>

<div class="gallery">
  <a target="_blank" href="https://picsum.photos/300/200?image=620">
    <img src="https://picsum.photos/300/200?image=675" alt="Photo2" width="300" height="200">
  </a>
  <div class="desc">Photo 2</div>
</div>

<div class="gallery">
  <a target="_blank" href="https://picsum.photos/300/200?image=620">
    <img src="https://picsum.photos/300/200?image=679" alt="Photo3" width="300" height="200">
  </a>
  <div class="desc">Photo 3</div>
</div>

<div class="gallery">
  <a target="_blank" href="https://picsum.photos/300/200?image=620">
    <img src="https://picsum.photos/300/200?image=622" alt="Photo4" width="300" height="200">
  </a>
  <div class="desc">Photo 4</div>
</div>
<div class="gallery">
  <a target="_blank" href="https://picsum.photos/300/200?image=621">
    <img src="https://picsum.photos/300/200?image=621" alt="Photo5" width="300" height="200">
  </a>
  <div class="desc">Photo 5</div>
</div>
<div class="gallery">
  <a target="_blank" href="https://picsum.photos/300/200?image=611">
    <img src="https://picsum.photos/300/200?image=611" alt="Photo6" width="300" height="200">
  </a>
  <div class="desc">Photo 6</div>
</div>
<div class="gallery">
  <a target="_blank" href="https://picsum.photos/300/200?image=642">
    <img src="https://picsum.photos/300/200?image=642" alt="Photo7" width="300" height="200">
  </a>
  <div class="desc">Photo 7</div>
</div>

</body>
</html>


    <?php

    if($disName == 'Śródmieście'){
        ?>
        <iframe width="1000" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJhRJgFi_oD0cR4e4bUyVONb0&key=AIzaSyCZ-8fE0wEjKNJgFh8RPS_OMPpxDZi8QWw" allowfullscreen></iframe>
        <?php
    }
    if ($disName == 'Stare Miasto') {
        ?>
        <iframe width="1000" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJJTb9l-HpD0cRJAXnTqkWtIA&key=AIzaSyCZ-8fE0wEjKNJgFh8RPS_OMPpxDZi8QWw" allowfullscreen></iframe>
        <?php
    }
    if ($disName == 'Krzyki') {
        ?>
        <iframe width="1000" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJ-fYWmPrCD0cRPYVxqwzQiMk&key=AIzaSyCZ-8fE0wEjKNJgFh8RPS_OMPpxDZi8QWw" allowfullscreen></iframe>
        <?php
    }
    if ($disName == 'Psie Pole') {
        ?>
        <iframe width="1000" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJ4RK5jZjpD0cRLawG8AnW3so&key=AIzaSyCZ-8fE0wEjKNJgFh8RPS_OMPpxDZi8QWw" allowfullscreen></iframe>
        <?php
    }
    if ($disName == 'Fabryczna') {
        ?>
        <iframe width="1000" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJm4R6KIPqD0cRomxQ5QktECY&key=AIzaSyCZ-8fE0wEjKNJgFh8RPS_OMPpxDZi8QWw" allowfullscreen></iframe>
        <?php
    }
?><br><br><?php
    echo "Last 5 reviews of this restaurant: ";
    $res2 = new restaurant();
    $res2->idRestaurant=$idRestaurant;
    $str=$res2->retrieveReviews();
    
        while($row=$str->fetch()){
            ?>  
        <br><b><?php echo $row->username; ?></b>
        Pricing:<b><?php echo $row->pricing; ?></b>
        Speed:<b><?php echo $row->speed; ?></b>
        Design:<b><?php echo $row->presentation; ?></b>
        Quality:<b><?php echo $row->quality; ?></b>
        <br><p><?php echo $row->description?></p>
        
        <?php
        }
}


?>
Rate restaurant in here:
<div class="rw-ui-container"></div><br><br><br>
<?php
if(isset($_SESSION['username'])){?>
    <form method='post'>
        
  <div>
        <label for="pricing">Pricing (1 - most expensive, 10 - the cheapest):</label>
                <input id="pricing" type="number" name="pricing" min="1" max="10" required>
    </div> 
    <div>
        <label for="speed">Speed (1 - the slowest, 10 - the fastest):</label>
                <input id="speed" type="number" name="speed" min="1" max="10" required>
    </div> 
    <div>
        <label for="presentation">Presentation (1 - ugly, 10 - pretty):</label>
                <input id="presentation" type="number" name="presentation" min="1" max="10" required>
    </div> 
    <div>
        <label for="quality">Quality(1 - terrible taste, 10 - great taste):</label>
                <input id="quality" type="number" name="quality" min="1" max="10" required>
    </div>
      Write review: (optional)<br />
  <div id="textarea">
      <textarea name='description' id='description' cols="60" rows="10" ></textarea><br />
  </div>
        <input type='hidden' name='user_id' id='user_id' value='<?php echo $_SESSION['id']; ?>' required/>
        <input type='hidden' name='restaurant_id' id='restaurant_id' value='<?php echo $_GET['id']; ?>' required/>
  <div>
	<label for="agreed">I am aware that using bad words and false information is not nice:</label>
	<input id="agreed" type="checkbox" name="agreed" required>
  </div>

  <input type="submit" value="Submit" name="review-restaurant" />  
</form>

<?php
}else
    echo 'You have to be logged in to be able to review restaurant';
?>    

</center>