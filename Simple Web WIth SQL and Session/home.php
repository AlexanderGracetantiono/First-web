<?php session_start(); 
if($_SESSION['login']!="true"){
    header("location: http://localhost/php3_alexanderG/notlog.html");
}

?>
<html>
    <head>
        <title>
            Home
        </title>
        <link rel="stylesheet" type="text/css" href="style/form.css">
    </head>
    <body  background="img/wp1.jpg" class="a">
    <?php
    include 'db_connect.php';
    $conn = Opencon();
    $user = $_SESSION['name'];
    $pass = $_SESSION['pass'];
    $query = "SELECT * FROM `user` WHERE `email`='$user' AND `password`='$pass'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    ?>
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
                    </td>
                    <td>
                        <div style="margin-left:120px;">
                        <form action="http://localhost/php3_alexanderG/logout.php"> 
                            <input style="border:0.5px solid black;font-size:25px;padding:11px 15px;border-radius:2pc;background-color:rgb(255, 158, 158);"
                            type="submit" value="Log Out">
                        </form>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div>
            <table class="home">
                <tr>
                    <th>
                        <img src="<?php echo "uimg/".$row['photo'];?>"width="120px" height="120px" class="brdr">
                    </th>
                    <th colspan="2">
                        <span class="name_home">
                        <?php  echo $row['fullName'];  ?>

                        </span>
                    </th>
                </tr>
                <tr>
                    <td colspan="4">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td class="a">Jenis Kelamin</td><td class="a"> : </td>
                    <td class="a"> <?php  echo $row['gender'];  ?>  </td>
                </tr>
                <tr>
                    <td class="a">Tanggal Lahir</td><td class="a"> : </td>
                    <td class="a"> <?php  echo $row['dateOfBirth'];  ?>   </td>
                </tr>
                <tr>
                    <td class="a">Kota Tinggal</td><td class="a"> : </td>
                    <td class="a"> <?php  echo $row['country'];  ?>   </td>
                </tr>
                <tr>
                    <td class="a">No.Telp</td><td class="a"> : </td>
                    <td class="a"> <?php  echo $row['phone'];  ?>   </td>
                </tr>
            </table>
        </div>
    </body>
</html>