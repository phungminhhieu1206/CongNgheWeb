<?php
function display_data($data) {
echo "<table border='1'>
<tr>
<th>Id</th>
<th>Product Description</th>
<th>Cost</th>
<th>Weight</th>
<th>Count</th>
</tr>";
 
while($row = mysqli_fetch_array($data))
{
    echo "<tr>";
    echo "<td>" . $row['ProductID'] . "</td>";
    echo "<td>" . $row['Product_desc'] . "</td>";
    echo "<td>" . $row['Cost'] . "</td>";
    echo "<td>" . $row['Weight'] . "</td>";
    echo "<td>" . $row['Numb'] . "</td>";
    echo "</tr>";
}
echo "</table>";
}

$server = 'localhost';
$user = 'root';
$pass = '';
$mydb = 'mydatabase';
$table_name = 'Products';
$connect = mysqli_connect($server, $user, $pass);
if (!$connect) {
    die ("Cannot connect to $server using $user");
} else {
      $SQLcmd = "SELECT * FROM $table_name";
mysqli_select_db($connect,$mydb);

$result = mysqli_query($connect,$SQLcmd);
if ($result) {
    print '<font size="4" color="blue" >Products data';
    print "<i>$table_name</i> in database<i>$mydb</i><br></font>"; 
    print "<br>SQLcmd=$SQLcmd";
    display_data($result);

} else {
    die ("Table Create Creation Failed SQLcmd=$SQLcmd");
} 
mysqli_close($connect);
}

