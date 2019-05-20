<?php session_start();
if($_SESSION['login']="true"){
    session_destroy();
    
} 
header("Refresh: 2; URL=http://localhost/php3_alexanderG/login.php");
?>
<html>
    <head>
        <title>
            Home
        </title>
        <link rel="stylesheet" type="text/css" href="style/forms.css">
    </head>
    <body  background="img/wp1.jpg" class="a">
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
                    
                </tr>
            </table>
    </div>
    <div class="header">
    <span style="font-size:40px;color:red;">Log Out</span>    <br>
    <span style="font-size:30px;color:cyan;">Thank You for Using Our Website</span>
    </div>
    </body>
</html>