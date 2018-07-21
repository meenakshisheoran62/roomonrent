<?php 
// connect to db
 $db=mysqli_connect("localhost","root","1636ms1920","room");
 // check connection    
if(!$db){
       die("connection failed:". mysqli_connect_error());
   }
 // if register buttom click
if(isset($_POST['register']))
 {
    $username= $_POST['name'];
    $aadharno= $_POST['aadharno'];
    $city=  $_POST['city'];
    $state=  $_POST['state'];
    $password1= $_POST['password1'];
    $password2=  $_POST['password2'];
    $gender=$_POST['gender'];
    $pincode=$_POST['pincode'];
    $pass_length=strlen($password1);
    $aadhar_length=strlen($aadharno);
     $sql="INSERT INTO OWNER (AADHAR_ID,NAME,PASSWORD,GENDER,CITY,STATE,PIN_CODE) VALUES('$aadharno','$username','$password1','$gender','$city','$state','$pincode')";
    //check validation 
    if(empty($username)){
        $msg="enter name";
    }else
        if(empty($aadharno)){
            $msg="enter aadharno";
        }else 
            if($aadhar_length<12){
                $msg="aadhar no. should be 12 ";
            }else
                
            if(empty($gender)){
                $msg="enter gender";
            }else
                if(empty($city)){
                    $msg="enter city";
                }else
                    if(empty($state)){
                        $msg="enter state";
                    }else
                        if(empty($pincode)){
                            $msg="enter pincode";
                        }else 
                            if(empty($password1)){
                                $msg="enter password";
                            }else
                                if($pass_length<8){
                                    $msg="password should be 8 character long";
                                }else
                                    if($password1!=$password2){
                                        $msg="password not equal";
                                         
                                    }else
                                        if(mysqli_query($db,$sql)){
                                            $s_msg="User Registrated";
                                        }
 



}  
mysqli_close($db);
 ?>


<html>

<head>
     
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <div class="header">
        <h2>Register</h2>
    </div>
    <form action="a.php" method="post">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="name" placeholder="username">
        </div>
        <div class="input-group">
            <label>Aadhar NO</label>
            <input type="text" name="aadharno" placeholder="aadhar no.">
        </div>
        <div class="inout-group">
            <label>Gender</label>
            <input type="radio" name="gender" value="male" checked> Male
            <input type="radio" name="gender" value="female"> Female
            <input type="radio" name="gender" value="other"> Other
        </div>
        <div class="input-group">
            <label>city</label>
            <input type="text" name="city" placeholder="city">
        </div>
        <div class="input-group">
            <label>state</label>
            <input type="text" name="state" placeholder="state">
        </div>
        <div class="input-group">
            <label>pin code</label>
            <input type="number" name="pincode" placeholder="pincode">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password1" placeholder="password">
        </div>
        <div class="input-group">
            <label>Confirm password</label>
            <input type="password" name="password2" placeholder="confirm password">
        </div>
        <div class="input-group">
            <button type="submit" name="register" class="btn"> Register</button>
            <button type="reset" name="reset" class="btn">Reset</button>
            <a href="../login/login1.html"><button type="button" name="login" class="btn" >Login</button></a>

        </div>
           <p style="color:red;">
            <?php 
            if(isset($msg)){
                echo $msg;
            }
         
         ?>

        </p>
        <p style="color:green;">
            <?php 
            if(isset($s_msg)){
                echo $s_msg;
            }
         
         ?>

        </p>


    </form>
</body>

</html>

