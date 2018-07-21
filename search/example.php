<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link rel="stylesheet" type="text/css" href="../css/result-new.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
	<title>
		example
	</title>
</head>
<body>
	
	<?php 
	//connection to databases
    $db=mysqli_connect("localhost","root","1636ms1920","room");
      // check connection
    if(!$db){
        die("connection failed:".mysqli_connect_error());
    }
   
       

    /* echo "<table border=1px  >";
     for ($i = 1; $i <= 2; $i++) 
     {
    echo	"<tr>";
       for ($j=1; $j<=4; $j++) {
     echo "<td>ku</td>";
     }	
    echo   "</tr>";     
     }

    echo "</table><br>"; */
    //**************************************************************************
    echo "<table  >";
 if(isset($_POST['submit']))
 {  
        
        $s1=mysqli_real_escape_string($db,$_POST['s1']); 
        $s2=mysqli_real_escape_string($db,$_POST['s2']); 
        $s3=mysqli_real_escape_string($db,$_POST['s3']);
        $sql="select   A_NAME,LOCATION,CITY,PIN_CODE,ROOM_TYPE,TENANT_PREF,RENT,FOOD_SERIVES,FURNISHED FROM accomodation where CITY='".$s1."' AND ROOM_TYPE='".$s2."' AND TENANT_PREF='".$s3."' "; 
        $result=mysqli_query($db,$sql); 
        $qresult=mysqli_num_rows($result); 
                              
        if($qresult>0)
        
        {  //echo " There are ".$qresult."results! "; 
          $a= mysqli_num_rows($result);
          
          // for row
          $b=floor($a/4);
          $r=$a%4;
          if($r!=0){
            $s=$b+1;
          }else{
            $s=$b;
          }
         // for colum
         
         
           if($a>4){
            $d=4;
           }else{
            $d=$r;
           }
           //---------
         for ($i=1; $i <=$s; $i++) { 
             # code...
            echo "<tr>";
               if($i==$s && $r>0)
                $d=$r;
              for ($j=1; $j <=$d; $j++) { 
                  # code...
              echo "<td> ";
           //echo "<table border=1px  >";
       $row=mysqli_fetch_assoc($result);
           
         $a= mysqli_num_rows($result);
        $a=1;
        while($a)
        { echo " 
         <div class='result'>
        
        <table>
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
        </table>
        
        <hr>
    </div>";
     echo "<script > break;
      </script>";
      $a=0;   
      }
       
       

      echo "</td>";
   if($row){
    echo "<script > break;
      </script>";
   }
    }
      echo "</tr>";
     }

    }
    else{
    	echo "<div class='error'>Room not found</div>"; 
    }

 }else{
 	echo "not submit";
	 }
 
?>

</body>
</html>