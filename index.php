
<?php
$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'hotels'; // Nama Database
 
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die ('Fail to connect to MySQL: ' . mysqli_connect_error());   
}
 
$sql = 'SELECT id, first_name, last_name, created
        FROM test';
         
$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hotels.ng Test</title>

    <h2>Hotels.ng Tests-- Oreoluwa Ojo</h2>
    <p>First Task for Hotels.ng Remote Internship</p>
</head>

<body>
<br>
<br>
<?php
 
if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}
 
echo '<table>
        <thead>
            <tr>
                <th> ID</th>
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                <th>DATE</th>
            </tr>
        </thead>
        <tbody>';
         
while ($row = mysqli_fetch_array($query))
{
    echo '<tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['first_name'].'</td>
            <td>'.$row['last_name'],'</td>
            <td>'.$row['created'].'</td>
        </tr>';
}
echo '
    </tbody>
</table>';
if ($conn->query($sql)==TRUE){

    echo  "File Printed from Database Successfully!";
} else {
    echo "Error:" . $sql . "<br>".$conn->error;


}

 

mysqli_free_result($query);
 
mysqli_close($conn);


?>