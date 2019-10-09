// Add the count of number of visits on the website till now and number of customers benefitted from our service.
<?php   $db=mysqli_connect("localhost","root","1636ms1920","room");
 // check connection    
    if(!$db){
       die("connection failed:". mysqli_connect_error());
   }

 session_start();
 
  if($_SESSION['user']){
   // echo "hello ".$_SESSION['user'];
       
  }
  else{
      header('location:login1.php' );
      exit();
  }

?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../css/user-dashboard.css">
</head>

<body>

    <div class="header">
        <h2>Dashboard</h2>

    </div>

    <div class="outbox">

        <table>
            <form action="logout.php" method="post">
                <div>
                    <tr>
                        <th class="lable">
                            Name :
                        </th>
                        <td>
                            <?php  
                    $a="SELECT NAME FROM owner WHERE AADHAR_ID = '".$_SESSION['user']."'";
                     $a1=mysqli_query($db,$a);
                    $d1= mysqli_fetch_assoc($a1);
                    echo $d1['NAME'];
                    ?>
                        </td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <th class="lable">
                            Password :
                        </th>
                        <td>
                            <?php  
                    $a="SELECT password FROM owner WHERE AADHAR_ID = '".$_SESSION['user']."'";
                     $a1=mysqli_query($db,$a);
                    $d1= mysqli_fetch_assoc($a1);
                    echo $d1['password'];
                    ?>
                        </td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <th class="lable">
                            User ID :
                        </th>
                        <td>
                            <?php  
                    $a="SELECT AADHAR_ID FROM OWNER WHERE AADHAR_ID = '".$_SESSION['user']."'";
                     $a1=mysqli_query($db,$a);
                    $d1= mysqli_fetch_assoc($a1);
                    echo $d1['AADHAR_ID'];
                    ?>
                        </td>
                    </tr>

                </div>


                <tr>
                    <td colspan="2" align="center">

                        <div class="input-group">

                            <a href="../meena/indexhome.html"><button type="button" name="home" class="btn" >Home</button></a>

                            <a href="../registration/accomodation_Registration.php"><button type="button" name="login" class="btn" >Accomodation</button></a>
                            <a href="user_update.php"><button type="button" name="update" class="btn" >Edit Profile</button></a>

                            <button type="submit" name="logout" class="btn">Log out</button>

                        </div>
                    </td>
                </tr>
            </form>
        </table>

    </div>



</body>



</html>
