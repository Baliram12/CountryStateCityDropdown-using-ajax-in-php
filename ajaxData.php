<?php 

$conn=mysqli_connect('localhost','root','');
mysqli_select_db($conn,'usercountry');
$sql="select * from statetable where countryid='".$_POST['countryid']."'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);

if($num > 0){ 
        echo '<option value="">Select State</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['stateid'].'">'.$row['statename'].'</option>'; 
        } 
    }






?>


