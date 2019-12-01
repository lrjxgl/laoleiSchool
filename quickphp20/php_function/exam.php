<?php

function maxsort($a,$b,$c){
    $s1="";
    if($a>=$b){
        if($a>=$c){
            if($c>=$b){
                return $a.$c.$b;    
            }else{
                return $a.$b.$c;
            }
        }else{
            return $c.$a.$b;
        }
        
    }else{
       if($a>=$c){
           return $b.$a.$c;
       }else{
           if($b>$c){
               return $b.$c.$a;
           }else{
               return $c.$b.$a;
           }
       }
    }
}
echo maxsort(11,9,32);
echo "<br/>";
function mat($a,$b,$c,$d){
    return $a+$b*$c-$d;
}
$a=mat(1,6,3,22);
$b=mat(3,2,3,42);
if($a>$b){
    echo "a:$a b:$b A大";
}else{
    echo "a:$a b:$b B大";
}
echo "<br/>";
//投骰子
function win($a,$b,$c){
    if($a>$b){
        if($a>$c){
            return "A";
        }elseif($a==$c){
            return "A和C";
        }else{
            return "C";
        }
    }elseif($a==$b){
        if($a>$c){
            return " A B";
        }elseif($a<$c){
            return "C";
        }else{
            return "平手";
        }
    }else{
        if($b>$c){
            return "B";
        }elseif($b==$c){
            return "B C";
        }else{
            return "C";
        }
    }
}
echo win(2,2,1);