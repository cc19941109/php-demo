<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>file</title>
</head>
<body>

<?php
// [1,2,3,6,8,"ad",[1,2,4],{"h":"hello"}]
//  {"h":"hello","w":"world","arr":[1,2,3]}


$arr1 = array(1, 2, 4, 'cc', 'chen',array('sda',1,2),array("h"=>"hello","w"=>"world"));
$arr2  =array("h"=>"hello","w"=>"world");
//print_r($arr1);

//echo "<br>";

$json_data = json_encode($arr);

//echo $json_data;

$str = '{"h":"hello","w":"world","arr":[1,2,3]}';
$obj = json_decode($str);
echo $obj->h;

?>

</body>
</html>