<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>file</title>
</head>
<body>

<?php

// post
// file_get_contents

$url = 'http://localhost:8080/user/edit';

$data = array('name' => 'chen');

$opts = array(
    'http' => array(
        'method' => 'POST',
        'header' => 'Content-type:application/x-www-form-urlencoded',
        'content'=> $data
    )
);

$context = stream_context_create($opts);
$html = file_get_contents($url, false, $context);

$user = json_decode($html);

var_dump($html);
var_dump($context);

echo $user -> name;

?>
<p>ok ...</p>

</body>
</html>