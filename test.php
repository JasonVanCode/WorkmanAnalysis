<?php
$a1=array("e"=>"red","green","w"=>"blue","d"=>"yellow");
$a2=array("a"=>"red","green","g"=>"blue1");

$result=array_intersect($a1,$a2);
print_r($result);