<?php
require("ObjectVarClass.php");
echo "<pre>";
$var1 = new ObjectVar;

$var1->create("objectname","people1");
echo $var1->objectname."<br>";

$var1->create("arr1",Array("Name"=>"Octane Fx","beauty"=>true,"age"=>36,"birthday"=>Array("day"=>14,"month"=>"november")));
print_r($var1->arr1);

$var1->arr1["Name"]="Marcelo Octane FX";
$var1->arr1["beauty"]=false;
print_r($var1->arr1);

$var1->create("eye","blue");
echo $var1->eye."<br>";

$var1->arr1["birthday"]["day"]="15";
$var1->arr1["birthday"]["month"]="september";
$var1->arr1["beauty"]=true;
print_r($var1->arr1);
echo "</pre>";
?>
