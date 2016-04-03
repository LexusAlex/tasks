<?php
// reverse all types
 function reverseAll($value){
     if(empty($value)){return false;}
     if(is_string($value)){
         return strrev($value);
     }
     if(is_numeric($value)){
         $num = strrev(abs($value));
         $answear = $value > 0 ? $num : -$num;
         return (int)$answear;
     }
     if(is_array($value)){
         return array_reverse($value,true);
     }
     return false;
 }