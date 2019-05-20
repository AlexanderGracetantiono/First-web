<?php session_start(); ?>
<?php
include 'db_connect.php';
$conn = Opencon();
$email=$_GET["log_email"];
$pass=$_GET["log_pass"];

$query="SELECT * from `user` WHERE `email`='$email' AND `password`='$pass'";
$results=mysqli_query($conn,$query);
$cek = mysqli_num_rows($results);
if($cek>0){
    $validlog= "Your Login is Valid";
    echo 
    "<div style='text-align:center;font-size:79px;color:red;'>
    Congratulation:<br>
    $validlog
    </div>
    <br>
    <div style='text-align:center;font-size:30px;color:blue;'>
    Wait for 2 Second
    </div>
    ";
    $_SESSION['login']="true";
    $_SESSION['name']=$email;
    $_SESSION['pass']=$pass;
    header("Refresh: 2; URL=http://localhost/php3_alexanderG/home.php");

}
else{
    $validlog="Login Failed";
    echo 
    "<div style='text-align:center;font-size:79px;color:red;'>
    Error:<br>
    $validlog
    </div>
    <br>
    <div style='text-align:center;font-size:30px;color:blue;'>
    Wait for 2 Second
    </div>
    ";
    header("Refresh: 2; URL=http://localhost/php3_alexanderG/login.php?validlog=*password or Email Invalid");
}
/*
http://localhost/php3_alexanderG/process_login.php?log_email=&log_pass=
http://localhost/php3_alexanderG/process_login.php?log_email=alexander.remains.1247%40gmail.c&log_pass=
$name=$_GET["name"];
$umur=$_GET["umur"];
$tempat_lahir=$_GET["tempat_lahir"];
$ttl=$_GET["Year"]." /".$_GET["Month"]." /".$_GET["Day"];
$gender=$_GET["gender"];
echo $gender;
$alamat=$_GET["alamat"];
$kota=$_GET["kota"];
$no_pos=$_GET["no_telp"];

echo $ttl;
*/
?>