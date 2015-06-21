<?php
include '../src/ImageResize.php';

use \Library\ImageResize;

$image = new ImageResize('../images/big/kmrt4.png');
$image->scale(20);
$image->save('../images/thumbs/kmrt4.png');

var_dump($image);

?>