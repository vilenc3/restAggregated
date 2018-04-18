<center>

<?php

    $idUser=$_SESSION['id'];

    $res = new reservations();
    $res->idUser=$idUser;
    $str=$res->retrieveByRestID();
    ?>
    <table id="display">
    <tr>
    <th>User</th>
    <th>Email</th> 
    <th>Date</th>
    <th>Time</th>
    <th>Seats</th>
    <th>Your comments</th>
    <th>Status</th>
    </tr>
    <?php
    
while($row=$str->fetch()){ ?>
         <tr>
                <td><?php echo $row->username; ?><br></td>
                <td><?php echo $row->email; ?><br></td>
                <td><?php echo $row->date; ?><br></td>
                <td><?php echo $row->time; ?><br></td>
                <td><?php echo $row->numberPpl; ?><br></td>
                <td><?php echo $row->comments; ?><br></td>
                <td><?php echo $row->status; ?><br></td>
                <?php if($row->status == 'Pending') { ?>
                <td><form method="post">
                <input type='hidden' name='idReserv' id='idReserv' value='<?php echo $row->idReserv; ?>' required/>
                <input type='hidden' name='status' id='status' value='3' required/>
                <input type="submit"  value="Accept" name="accept-reservation">
                </form></td>
                <td><form method="post">
                <input type='hidden' name='idReserv' id='idReserv' value='<?php echo $row->idReserv; ?>' required/>
                <input type='hidden' name='status' id='status' value='2' required/>
                <input type="submit"  value="Decline" name="decline-reservation">
                </form></td>
                <?php } ?> 
            </tr>  

<?php
        }

?>
</table>  

