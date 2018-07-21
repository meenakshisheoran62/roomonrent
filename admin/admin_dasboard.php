<?php   $db=mysqli_connect("localhost","root","1636ms1920","room");
 // check connection    
    if(!$db){
       die("connection failed:". mysqli_connect_error());
   }

 session_start();
 
  if($_SESSION['admin']){
   // echo "hello ".$_SESSION['user'];
       
  }
  else{
      header('location:admin_login.php' );
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
        <h2>Admin Portal</h2>

    </div>

    <div class="outbox">

        <table>
            <form action="admin_logout.php" method="post">
                <div>
                    <tr>
                        <th class="lable">
                            Name :
                        </th>
                        <td>
                            <?php  
                    $a="SELECT admin_id FROM admin WHERE admin_id = '".$_SESSION['admin']."'";
                     $a1=mysqli_query($db,$a);
                     $d1= mysqli_fetch_assoc($a1);
                    echo $d1['admin_id'];
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
                    $a="SELECT password FROM admin WHERE admin_id = '".$_SESSION['admin']."'";
                     $a1=mysqli_query($db,$a);
                    $d1= mysqli_fetch_assoc($a1);
                    echo $d1['password'];
                    ?>
                        </td>
                    </tr>
                </div>
                 
                <tr>
                    <td colspan="2" align="center">

                        <div class="input-group">

                            <a href="../home/index.html"><button type="button" name="home" class="btn" >Home</button></a>

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
