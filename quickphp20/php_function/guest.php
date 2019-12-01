<?php
$a=isset($_GET["a"])?$_GET["a"]:"index";
function add(){
    echo "add";
}
function index(){
    echo "index";
}
$a();
?>