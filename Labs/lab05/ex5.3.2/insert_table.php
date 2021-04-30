<html><head><title>Create Table</title></head><body>
<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$mydb = 'mydatabase';
$table_name = 'Products';

$connect = mysqli_connect($server, $user, $pass);
if (!$connect) {
    die ("Cannot connect to $server using $user");
} else {
      $SQLcmd = "INSERT INTO $table_name VALUES ('0','".$_POST['des']."','".$_POST['cost']."','".$_POST['wei']."','".$_POST['num']."')";
mysqli_select_db($connect,$mydb);
if (mysqli_query($connect,$SQLcmd)){
    print '<font size="4" color="blue" >INSERT to Product';
    print "<i>$table_name</i> in database <i>$mydb</i><br></font>"; 
    print "<br>SQLcmd=$SQLcmd";
} else {
    die ("Table insert Failed SQLcmd=$SQLcmd");
} 
mysqli_close($connect);
}
?></body></html> 
