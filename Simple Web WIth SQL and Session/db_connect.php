<?PHP
function Opencon(){
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $db="user";
    
    $conn=new mysqli($dbhost,$dbuser,$dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    return $conn;
}
function Closecon($conn){
    $conn-> close();
}

?>