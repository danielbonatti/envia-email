<?php

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST' && isset($_FILES['file']['tmp_name'])) {
    $path = "attachments/".$_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $path);
}

?>
