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

$f = @fopen('data', 'r');

while (!feof($f)) {
    $content = fgets($f);
    echo $content;
    echo "<br>";
}

fclose($f);

?>
<p>ok ...</p>

</body>
</html>
