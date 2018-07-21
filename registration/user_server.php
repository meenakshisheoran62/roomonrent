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
    $username=$_POST['name'];
    $aadharno=$_POST['aadharno'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $password1=$_POST['password1'];
    $password2=$_POST['password2'];
    $gender=$_POST['gender'];
    $pincode=$_POST['pincode'];
    $pass_length=strlen($password1);
    $aadhar_length=strlen($aadharno);
     $sql="INSERT INTO OWNER (AADHAR_ID,NAME,PASSWORD,GENDER,CITY,STATE,PIN_CODE) VALUES('$aadharno','$username','$password1','$gender','$city','$state','$pincode')";
    $sql1="INSERT INTO log_in(USER_NAME,PASSWORD) VALUES('$aadharno ','$password1')";
    $sql2="select AADHAR_ID from owner where AADHAR_ID='".$aadharno."' ";
   // $result=mysqli_query($db,$sql2);
    
    //check validation 
    if(empty($username)){
        $msg="enter name";
    }else
        if(empty($aadharno)){
            $msg="enter aadhar no";
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
                                        if(!($result=mysqli_query($db,$sql2))){
                                            $msg="User alredy exit";
                                        }
    
                                        else
                                            
                                        if(mysqli_query($db,$sql)){
                                            $s_msg="User Registrated";
                                            mysqli_query($db,$sql1);
                                            header("location:../login/login1.php");
                                        }else
                                         
                                        {
                                            $msg="user already  registrated with same aadhar no!!";
                                        }
 



}  

 
mysqli_close($db);
?>
