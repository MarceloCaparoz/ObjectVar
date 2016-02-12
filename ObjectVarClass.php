<?php
/**
*	Class ObjectVar
*	Object Variable emulator.
*
*	@author Marcelo Octane <octanefx.com@gmail.com>
*	@version 0.1 20:00 12/11/2009
*	@link http://www.octanefx.com   Comments & suggestions
*	@Available at
*	@copyright GPL © 2007, Marcelo Octane
*	@license http://creativecommons.org/licenses/by-nc-sa/3.0/ Released under a Creative Commons License
*/

/*
example

require("class.objectvar.php");
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

*/
class ObjectVar{
	protected static $instances = 0;
	function __construct(){ self::$instances++; }
	function __destruct() { self::$instances--; }
	public function __clone () { self::$instances++; }
	static function getNumInstances() { return self::$instances; }

	public function __set($name, $value) { $this->{$name} = $value; }
	public function __toString(){ return __CLASS__; }

	public function create($name, $value){
		${$name}=$value;	
		if(!$this->{$name} = $value)
		throw new Exception("class \"".__CLASS__."\" exception creating \"$name\"");
	}
}
?>
