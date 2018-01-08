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

$f = @fopen('data', 'w');

if ($f) {
    fwrite($f, 'hello php');
    fclose($f);
    echo 'ok';
} else {
    echo "create failed..";
}

?>
<p>ok ...</p>

</body>
</html>