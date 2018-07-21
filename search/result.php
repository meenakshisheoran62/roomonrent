<?php 
 $db=mysqli_connect("localhost","root","1636ms1920","room");
      // check connection
    if(!$db){
        die("connection failed:".mysqli_connect_error());
    }


if(!isset($_POST['submit'])){
    header('location:search.php');
}
    
    ?>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../css/user-dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/result.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Result</title>
</head>

<body>
    <div class="header">
        <h2>RESULT</h2>
    </div>
    <div class="outbox">

        <table>


            <?php 

    if(isset($_POST['submit'])){ 
        
        $s1=mysqli_real_escape_string($db,$_POST['s1']);
		$s2=mysqli_real_escape_string($db,$_POST['s2']);
		$s3=mysqli_real_escape_string($db,$_POST['s3']); 
		$s4=mysqli_real_escape_string($db,$_POST['s4']); 
		$sql="select   A_NAME,LOCATION,CITY,PIN_CODE,ROOM_TYPE,TENANT_PREF,RENT,FOOD_SERIVES,FURNISHED,contactno FROM accomodation where CITY='".$s1."' AND ROOM_TYPE='".$s2."' AND TENANT_PREF='".$s3."'  AND rent<='".$s4."'"; $result=mysqli_query($db,$sql); $qresult=mysqli_num_rows($result); 
                              
        if($qresult>0)
        { // echo " There are ".$qresult."results! "; 
        while($row=mysqli_fetch_assoc($result))
        { echo "<tr><td>
         <div class='result'>
        
        <table >
         <tr>
        <th>Name : </th> <td>".$row['A_NAME']."</td>
         </tr>
     <tr>   <th>Location :</th> <td> ".$row['LOCATION']."</td></tr>
     <tr>   <th>City :</th> <td> ".$row['CITY']."</td></tr>
     <tr>   <th>Pin code :</th> <td> ".$row['PIN_CODE']."</td></tr>
     <tr>   <th>Room Type :</th> <td> ".$row['ROOM_TYPE']."</td></tr>
     <tr>   <th>Tenant pref :</th> <td>".$row['TENANT_PREF']."</td></tr>
     <tr>   <th>Rent :</th> <td>".$row['RENT'] ."</td></tr>
     <tr>   <th>Food servies :</th> <td> ".$row['FOOD_SERIVES']."</td></tr>
     <tr>   <th>Furnished :</th> <td> ".$row['FURNISHED']."</td></tr>
	 <tr>   <th>Contact No. :</th> <td> ".$row['contactno']."</td></tr>
        </table>
        
        <hr></td></tr>
    </div>";
    } 
    }else
    { echo "<div class='error'>Room not found</div>"; 
     } }
    ?>
            <tr>
                <td>
                    <div class="input-group"> <a href="search.php"><button type="button" name="update" class="btn" >Search</button></a>
                    </div>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>
