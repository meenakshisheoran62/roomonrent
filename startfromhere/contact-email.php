<?php 
$name=$_POST["username"];
$visitor_email=$_POST["email"];
$comment=$_POST["comment"];

$email_from="roomonrent@gmail.com";
$email_subject="new submission";
$email_body="user name : $name.\n".
              "user email : $visitor_email.\n".
              "user comment : $comment.\n";

$to="kuldeepsuthar96@gmail.com";
$headers="from :$email_from \r \n ";
$headers .="Reply to : $visitor_email \r\n";
mail($to,$email_subject,$email_body,$headers);
header("Location: indexhome.php");
 
?>