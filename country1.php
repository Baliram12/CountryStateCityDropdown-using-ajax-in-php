<!DOCTYPE html>
<html>
<head>
	<title>form</title>
	<script src="jquery.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

</head>
<body>
	<?php
$conn=mysqli_connect('localhost','root','');
mysqli_select_db($conn,'usercountry');
$sql = "select * from countrytable";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
if($conn){

	//echo"Sucessfully Connected";
}
else{

	echo"connection failed";
}
?>

    Country:<select name="country" id="countrybaliram">
    <option value="">Select </option>
    <?php 
    if($result->num_rows > 0){ 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['countryid'].'">'.$row['countryname'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Country not available</option>'; 
    } 
    ?>






</select>
    State:<select  id="statename" name="state"><option value=""> Select </option>







    </select>
    City:<select 
    id="cityname" name="city"><option value="">Select</option>

<?php
if($result->num_rows >0){

	echo'<option value="'.$row['cityid'].'">'.$row['cityname'].'</option>';
}
else{
	echo'<option value="">City not available</option>';


}



?>


</select>
    	
    
  <script>
$(document).ready(function(){

    $('#countrybaliram').change(function(){
        var countryid = $(this).val();
        if(countryid!='')
        {
            $.ajax({
            type:'POST',
            url:'ajaxData.php',
            data: {'countryid':countryid},
            success:function(data){
                $('#statename').html(data);
                
        }
            }); 
        }
    });


$('#statename').change(function(){
    var stateid = $(this).val();
    if(stateid!='')
        {
            $.ajax({
            type:'POST',
            url:'ajax.php',
            data: {'stateid':stateid},
            success:function(data){
                
                $('#cityname').html(data);
        }
            }); 
        }

});


});


</script>

   	

</body>
</html>