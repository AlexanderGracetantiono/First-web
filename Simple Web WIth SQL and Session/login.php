<?php session_start(); ?>
<html>
    <head>
        <title>
            Home
        </title>
        <link rel="stylesheet" type="text/css" href="style/form.css">
        <?php
        error_reporting(0);
        ?>
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
                    <form action="process_login.php">
                    <td style="padding-left:22px;"  >
                        <div class="logn">
                            <span style="font-size:30px;">Login</span>
                            <br>
                            <input class="b" type="text" name="log_email" placeholder="Email..">
                            <br>
                            <input class="b" type="text" name="log_pass" placeholder="Password...">
                            <br>
                            <input type="submit" value="Submit" class="subs">
                        </div>
                    </td>
                    </form>
                </tr>
                <tr>
                    <td></td><td></td>
                    <td style="color:red;font-size:20px;text-align:center;">
                        <?php
                        $validlog = strval($_GET['validlog']);
                        // include 'process_login.php'; 
                        echo $validlog;
                        ?>
                    </td>
                </tr>
            </table>
    </div>
    </body>
</html>