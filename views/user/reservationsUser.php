<center>
<br>
<?php

    $idUser=$_SESSION['id'];

    $res = new reservations();
    $res->idUser=$idUser;
    $str=$res->retrieveByUserID();
    ?>
    <table id="display">
    <tr>
    <th>Restaurant</th>
    <th>Contact Number</th> 
    <th>Date</th>
    <th>Time</th>
    <th>Seats</th>
    <th>Your comments</th>
    <th>Status</th>
    </tr>
    <?php
    
while($row=$str->fetch()){ ?>
         <tr>
                <td><?php echo $row->name; ?><br></td>
                <td><?php echo $row->phone; ?><br></td>
                <td><?php echo $row->date; ?><br></td>
                <td><?php echo $row->time; ?><br></td>
                <td><?php echo $row->numberPpl; ?><br></td>
                <td><?php echo $row->comments; ?><br></td>
                <td><?php echo $row->status; ?><br></td>
            </tr>  

<?php
        }

?>
</table>  
