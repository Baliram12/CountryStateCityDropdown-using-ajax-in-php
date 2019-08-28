<?php

$conn=mysqli_connect('localhost','root','');
mysqli_select_db($conn,'usercountry');
$sql="select * from citytable where stateid='".$_POST['stateid']."'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);

if($num >0){
        echo '<option value="">Select City</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['cityid'].'">'.$row['cityname'].'</option>'; 
        } 
    }


?>