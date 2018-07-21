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
<style>
.checked {
    color: orange;
}</style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     
    <link rel="stylesheet" type="text/css" href="../css/result-new.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <title>Result</title>
</head>

<body>
    <div class="header">
        <h2>RESULT</h2>
    </div>
    <div class="outbox">

         

              
            <?php 
 echo "<table  >";
    if(isset($_POST['submit'])){ 
        
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

     
         for ($i=1; $i <=$s; $i++) { 
             # code...
            echo "<tr>";
            if ($i==$s && $r>0) 
                $d=$r;
               
              for ($j=1; $j <=$d; $j++) { 
                  # code...
              echo "<td>";
         //  echo "<table border=1px  >";
            $row=mysqli_fetch_assoc($result);
           
         $a= mysqli_num_rows($result);
        $a=1;
      /*  while($r1--){ 
<span class='fa fa-star checked'></span>
      }*/

        while( $a)
        {$r1=$row['rating'];
        echo "this is ".$row['rating']."";
          //$r2=$row['rating'];
           echo " 
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
    <tr> <th>Star Rating</th><td>
    while(".$r1--."){ 
<span class='fa fa-star checked'></span>
      }
      while(".$r2--."){ 
<span class='fa fa-star'></span> } 
</td></tr>
        </table>
        
        <hr> 
    </div>";
     echo "<script > break;
      </script>";
      $a=0; 
      }


     // echo "</table>";
      echo "</td>";
      if($row){
    echo "<script > break;
      </script>";
   }
    }
      echo "</tr>";
     }
    }



    else
    { echo "<div class='error'>Room not found</div>"; 
     } }
    ?>
            <tr>
                <td>
                    <div class="input-group"> <a href="search.php"><button type="button" name="update" class="btn" >Search</button></a>
                        <h2>Star Rating</h2>
<i class="fa fa-star checked"></i>
<i class="fa fa-star checked"></i>
<i class="fa fa-star checked"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
                    </div>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>
