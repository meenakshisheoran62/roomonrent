<?php 
  session_start();
if(isset ($_SESSION['admin']) )
{
    header('location:admin_dasboard.php');
}

?>


<html>

<head>
    <title>Admin login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../css/login.css">

</head>

<body>
    <?php 
    $db=mysqli_connect("localhost","root","1636ms1920","room");
 // check connection    
    if(!$db){
       die("connection failed:". mysqli_connect_error());
   }
    ?>
    <div class="loginbox">
        <img src="../img/login1.jpg" class="avatar">
        <h1>Admin Log In </h1><br>
        <form method="post" action="admin_login.php">
            <p>Admin name</p>
            <input type="text" name="username" placeholder="Enter Username" required> <br>
            <p>Password</p>
            <input type="Password" name="Password" placeholder="Enter Password" required><br>
            <br>
            <input type="submit" name="login" value="Login">
            <br><br>
            <a href="../home/index.html">
            <input type="button" value="Home">
            </a>

        </form>
    </div>

</body>

</html>
<?php 
 
  if(isset($_POST['login'])){
      $username=$_POST['username'];
      $password=$_POST['Password'];
    //  echo " dfasdfasdf";
      $sql="select * from admin where admin_id='".$username."' AND  password='".$password."'"; 
      $run=mysqli_query($db,$sql);
      $row=mysqli_num_rows($run);
     // echo "dafgasdgasdgasdgasdgaeg";
      if($row<1){
            ?>
<script>
    alert('Username or password not match !!');
    window.open('admin_login.php', '_self');

</script>
<?php
      }else{
           
          $data=mysqli_fetch_assoc($run);
          echo "name".$data['admin_id'];
          $admin=$data['admin_id'];
         // $a=4;
          $_SESSION['admin']=$admin;
          header('location:admin_dasboard.php');
      }
      
  }
?>
