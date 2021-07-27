<?php
    include 'datafile.php';
    $post_id = $_GET["id"];

    $functions->delete_post($post_id);

?>