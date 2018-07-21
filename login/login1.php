<?php 
  session_start();
if(isset ($_SESSION['user']) )
{
    header('location:user_dasbord.php');
}

?>



<html>

<head>
    <title>Login</title>
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
        <h1>Log In </h1>
        <form method="post" action="login1.php">
            <p>User name</p>
            <input type="text" name="username" placeholder="Enter Username" required>
            <p>Password</p>
            <input type="Password" name="Password" placeholder="Enter Password" required><br>

            <input type="submit" name="login" value="Login">
            <a href="../registration/userRegistration.php">   <input type="button" name="sinup" value="Sign up">  </a>
            <a href="../meena/indexhome.php">
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
      $sql="select * from log_in where USER_NAME='".$username."' AND  PASSWORD='".$password."'"; 
      $run=mysqli_query($db,$sql);
      $row=mysqli_num_rows($run);
     // echo "dafgasdgasdgasdgasdgaeg";
      if($row<1){
            ?>
<script>
    alert('Username or password not match !!');
    window.open('login1.php', '_self');

</script>
<?php
      }else{
          $data=mysqli_fetch_assoc($run);
          echo "name".$data['USER_NAME'];
          $user=$data['USER_NAME'];
         // $a=4;
          $_SESSION['user']=$user;
          header('location:user_dasbord.php');
      }
      
  }
?>
