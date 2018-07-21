<?php 
// connect to db
 $db=mysqli_connect("localhost","root","1636ms1920","room");
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
  }

 // if register buttom click
if(isset($_POST['update']))
 {
    $username=$_POST['name'];
  //  $aadharno=$_POST['aadharno'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $password1=$_POST['password1'];
    $password2=$_POST['password2'];
    $gender=$_POST['gender'];
    $pincode=$_POST['pincode'];
    $pass_length=strlen($password1);
 //   $aadhar_length=strlen($aadharno);
    // update in owner table
    $sql="UPDATE owner SET NAME='".$username."',password='".$password1."',GENDER='".$gender."',CITY='".$city."',STATE='".$state."',PIN_CODE='".$pincode."'  WHERE AADHAR_ID='".$_SESSION['user']."'";
    //update in login table
    $sql1="UPDATE log_in SET PASSWORD ='".$password1."' WHERE 'USER_NAME'='".$_SESSION['user']."'";
   // $result=mysqli_query($db,$sql2);
    
    //check validation 
    if(empty($username)){
        $msg="enter name";
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
                                    $msg="password should be 8 character long !!";
                                }else
                                    if($password1!=$password2){
                                        $msg="password not equal !!";
                                         
                                    }else
                                        
                                        if(mysqli_query($db,$sql)){
                                           // $s_msg="User Registrated";
                                            mysqli_query($db,$sql1);
                                            header("location:../login/login1.php");
                                        }else
                                         
                                        {
                                            $msg="user already  registrated with same aadhar no!!";
                                        }
 



}  

 
 ?>
