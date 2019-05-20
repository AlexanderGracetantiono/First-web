<?php
include 'db_connect.php';
$conn = Opencon();
echo "Connected Success";
//check connections
$sql = "SELECT * FROM `login`";
//select table
$name=$_GET["name"];
$pass=$_GET["pass"];
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>  Alamat  </th>";
                echo "<th>  Job  </th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                if($name == $row['nama']&&$pass==$row['passwrd']){
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['job'] . "</td>";
                }
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

Closecon($conn);

?>