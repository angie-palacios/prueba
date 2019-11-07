<?php
$connection = new mysqli('localhost', 'root', '', 'prueba');
$accents = $connection ->query ('SET NAME UTF8');
if ($connection ->connect_error > 0) {
    die ('Error ['. $connect_error->error .']');
}
?>