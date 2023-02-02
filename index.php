<?php
ob_start();

$url = $_SERVER['REQUEST_URI'].'web';

// clear out the output buffer
while (ob_get_status()){
    ob_end_clean();
}

header( "Location: $url" );
?>
