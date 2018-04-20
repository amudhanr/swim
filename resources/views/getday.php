<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','peter','abc123','my_db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM user WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);


while($val = mysqli_fetch_array($result)) {
    
    echo "
        <select>
             <option value="1">$val['day1']</option>
             <option value="2">$val['day1']</option>
             <option value="3">$val['day1']</option>
             <option value="4">$val['day1']</option>
        </select>";
}
mysqli_close($con);
?>
</body>
</html>
