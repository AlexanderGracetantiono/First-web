<html>
<head>
    <title>LOGIN TO AlexSite.moe.com</title>
      <link rel="stylesheet" type="text/css" href="style/form.css">
</head>
<body background="img/wp1.jpg" class="a">
    <?php
    include 'db_connect.php';
    $conn = Opencon();
        $name=$umur=$ttl=$tempat_lahir=$gender=$alamat=$kota=$no_telp=$email=$pass1=$pass2="";
        $nameErr=$umurErr=$ttlErr=$kotaErr=$no_telpErr=$emailErr=$passErr="";
        $photourl="";
        $valid="";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name=$_POST["name"];
                if(empty($name)){
                    $nameErr="Nama Dibutuhkan";
                    $valid="false";
                }
                else{
                    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                    $nameErr = "Hanya Boleh menggunakan Huruf"; 
                    $valid="false";
                    }
                }
        
            $umur=$_POST["umur"];
                    if (preg_match("/^[a-zA-Z ]*$/",$umur)) {
                    $umurErr = "Hanya Boleh menggunakan Angka"; 
                    $valid="false";
                    }

        // $tempat_lahir=$_POST["tempat_lahir"];
        $ttl=$_POST["Year"]."-".$_POST["Month"]."-".$_POST["Day"];
        $gender=$_POST["gender"];
        $alamat=$_POST["alamat"];
        $kota=$_POST["kota"];
        if(empty($kota)){
            $kotaErr="Kota Dibutuhkan";
            $valid="false";
        }
        else{
            if (!preg_match("/^[a-zA-Z ]*$/",$kota)) {
            $kotaErr = "Hanya Boleh menggunakan Huruf"; 
            $valid="false";
            }
            else{
                $valid="true";
            }
        }
        $no_telp=$_POST["no_telp"];
        if(empty($no_telp)){
            $no_telpErr="No.Telp Dibutuhkan";
            $valid="false";
        }
        else{
            if (preg_match("/^[a-zA-Z ]*$/",$no_telp)) {
            $no_telpErr = "Hanya Boleh menggunakan Angka"; 
            $valid="false";
            }
            else{
                $valid="true";
            }
        }
        $email=$_POST["email"];
        if(empty($email)){
            $emailErr="Email Dibutuhkan";
            $valid="false";
        }
        else{
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Format Email Salah"; 
                $valid="false";
              }
              else{
                $valid="true";
            }
        }
        $pass1=$_POST["pass"];
        $pass2=$_POST["pass_con"];
        if(empty($pass1)){
            $passErr="Silahkan Masukan Password";
            $valid="false";
        }
        elseif (strlen($pass1) <= '8') {
            $passErr = "Minimal 8 Digit";
            $valid="false";
        }
        elseif($pass1!=$pass2){
            $passErr="Password Tidak Sama";
            $valid="false";
        }
        else{
            $valid="true";
        }
        
        if(!empty(basename($_FILES["imgu"]["name"]))){
            $currentDir = getcwd();
            $target_dir = "/uimg/";
            $target_file = $currentDir.$target_dir . basename($_FILES["imgu"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            if (move_uploaded_file($_FILES["imgu"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["imgu"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
            $photourl=basename($_FILES["imgu"]["name"]);
            echo  $target_file;
        }
        else{
            $photourl="jeff.jpg";
        }
        
        //Notice: Undefined index: imgu in C:\xampp\htdocs\php3_alexanderG\register.php on line 92
        //echo basename($_FILES["imgu"]["name"]);
        
        if($valid==="true"){
            $query="INSERT INTO `user`
            VALUE('$name','$gender','$ttl','$email','$pass1','$kota','$no_telp','$photourl')
            ";
            mysqli_query($conn, $query);
            Closecon($conn);
            header("Location: http://localhost/php3_alexanderG/reg_complete.html");
        }
        }
    ?>
    <!-- start page -->
    <div class="header">
            <table >
                <tr>
                    <td>
                        <img src="img/logo.png"
                        width="200px" height="200px"/>
                    </td>
                    <td >
                        <div class="name">
                            Sakura Insurance Company Website
                            <br>
                            <span style="font-size:26px;">
                            An Insurance For Your Life
                            </span>
                        </div>
                </tr>
            </table>
    </div>
    <div>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" enctype="multipart/form-data">
        <table class="out">
            <tr>
                <td rowspan="4"></td>
                <td>
                    <table class="ins">
                        <tr>
                            <td colspan="3">
                                <h1 style="text-align:center;">
                                    Login Form 
                                </h1>
                            </td>
                            <td>
                                <p class="error">
                                    *Required
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                     Nama
                                </p>
                            </td>
                            <td>
                                <p> : </p>
                            </td>
                            <td>
                                <input class="a" type="text" name="name"placeholder="Jhonny.." >
                            </td>
                            <td>
                                <span class="error">
                                    *<?PHP echo $nameErr;?>
                                </span>
                            </td>
                        </tr>
                        <br>
                        <tr>
                            <td>
                                <p>
                                    Umur
                                </p>
                            </td>
                            <td>
                                <p>
                                    :
                                </p>
                            </td>
                            <td>
                                <input class="a" type="text" name="umur" />
                            </td>
                            <td>
                                <span class="error">
                                    <?PHP echo $umurErr;?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                     Tempat Lahir
                                </p>
                            </td>
                            <td>
                                <p> : </p>
                            </td>
                            <td>
                                <input class="a" type="text" name="tempat_lahir"placeholder="jakarta.." >
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                     Tanggal Lahir
                                </p>
                            </td>
                            <td>
                                <p> : </p>
                            </td>
                            <td>
                                
                                <select name="Year" id="Year">
                                    <option value="1990">1990</option>
                                    <option value="1991">1991</option>
                                    <option value="1992">1992</option>
                                    <option value="1993">1993</option>
                                    <option value="1994">1994</option>
                                    <option value="1995">1995</option>
                                </select>
                                /
                                <select name="Month" id="Month">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                                /
                                <select name="Day" id="Day">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    Gender
                                </p>
                            </td>
                            <td>
                                <p>
                                    :
                                </p>
                            </td>
                            <td>
                                <input class="c"type="radio" name="gender" value="Male" required>Pria
                                <input class="c"type="radio" name="gender" Value="Female" required>Wanita
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    Alamat
                                </p>
                            </td>
                            <td>
                                <p>
                                    :
                                </p>
                            </td>
                            <td>
                                <input class="b" type="text" name="alamat" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <p>
                                     Kota
                                </p>
                            </td>
                            <td>
                                <p> : </p>
                            </td>
                            <td>
                                <input class="a" type="text" name="kota"placeholder="Jakarta.." >
                            </td>
                            <td>
                                <span class="error">
                                    *<?PHP echo $kotaErr;?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                     No.Telp
                                </p>
                            </td>
                            <td>
                                <p> : </p>
                            </td>
                            <td>
                                <input class="a" type="text" name="no_telp"placeholder="16789.." >
                            </td>
                            <td>
                                <span class="error">
                                    *<?PHP echo $no_telpErr;?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                     Email
                                </p>
                            </td>
                            <td>
                                <p> : </p>
                            </td>
                            <td>
                                <input class="a" type="text" name="email"placeholder="Masukan Email " >
                            </td>
                            <td>
                                <span class="error">
                                    *<?PHP echo $emailErr;?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    Masukan Password
                                </p>
                            </td>
                            <td>
                                <p> : </p>
                            </td>
                            <td>
                                <input class="a" type="text" name="pass"placeholder="pass.." >
                            </td>
                            <td>
                                <span class="error">
                                    *<?PHP echo $passErr;?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    Konfirmasi Password
                                </p>
                            </td>
                            <td>
                                <p> : </p>
                            </td>
                            <td>
                                <input class="a" type="text" name="pass_con"placeholder="pass.." >
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                   Upload Profile Image
                                </p>
                            </td>
                            <td>
                                <p> : </p>
                            </td>
                            <td>
                            <input class="b" type="file" name="imgu" id="imgu" >
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <input style="border:2px solid black;border-radius: 3pc;margin-left: 4px;margin-right: 4px;font-size: 20px;"class="smbt"type="submit"/>
                            </td>
                            <td></td>
                            <td align="left">
                                <input style="border:2px solid black;border-radius: 3pc;margin-left: 4px;margin-right: 4px;font-size: 20px;"class="smbt"type="reset"/>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        
    </form>
            
    </div>
</body>
</html>