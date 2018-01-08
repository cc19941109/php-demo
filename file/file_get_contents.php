<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>file</title>
</head>
<body>

<?php
// write data
// F1 查看文档

$str1 = file_get_contents('data');

var_dump($str1);
$strs1 = explode(' ',$str1);

print_r($strs1);

foreach ($strs1 as $strid) {
    echo "<br>";
    echo $strid;
}


?>
<p>ok ...</p>

</body>
</html>