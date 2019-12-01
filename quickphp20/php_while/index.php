<?php
//while 
$i = 1;
while ($i <= 10) {
    echo $i++; 
}
$a=true;
while($a){
    echo "true";
    break;
}
//do while
$i = 0;
do {
   echo $i;
} while ($i > 0);

$i = 2;
do {
   echo $i--;
} while ($i > 0);