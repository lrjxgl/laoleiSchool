<?php
ob_start();
echo "Hello World";
$out1 = ob_get_contents();
ob_end_flush();
file_put_contents("ob.html",$out1);