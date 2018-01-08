<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>file</title>
</head>
<body>

<?php

// get

$url='http://localhost:8080/user/1';
$html = file_get_contents($url);
$user = json_decode($html);
echo $user -> name;



?>
<p>ok ...</p>

</body>
</html>