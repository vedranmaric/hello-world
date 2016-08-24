<?php
class foo {
    public $value = 42;
    public static $v=6;
    public function &getValue() {
        return $this->value;
    }
public function getValue2() {
       return __CLASS__;
    }
    public static function aa(){
    	echo "aa";
    }
    public function bb(){
    	self::aa();echo self::$v;
    }
}

$obj = new foo;
$myValue = &$obj->getValue(); // $myValue is a reference to $obj->value, which is 42.
$myValue = 77;
echo $obj->value;                // prints the new value of $obj->value, i.e. 2.

$o2= &$obj;
//$o2=null;
//var_dump($obj);

function f (&$v){
	$v=null;

}
f($obj);
var_dump($obj);
var_dump($o2);


// create an object and a copy as well as a reference to the variable
$a = new stdclass;
$b = $a;
$c = &$a;

// Do something with the object
$a->foo = 42;
var_dump($a->foo);
var_dump($b->foo);
var_dump($c->foo);

// Now change the variable itself
$a = 42;
var_dump($a);
var_dump($b);
var_dump($c);
echo "///////////////////////////////\n";
$aa=new stdclass;
$bb=$aa;
$cc=&$bb;
$cc=null;
var_dump($aa);var_dump($bb);var_dump($cc);
echo "///////////////////////////////\n";
$aaa=3;
$bbb=&$aaa;
$ccc=$bbb;
$ccc=null;
var_dump($aaa);var_dump($bbb);var_dump($ccc);
$vvvv=new foo;
$vvvv->bb();
$t = function ()  use ( $vvvv ){
	$vvvv->bb();
};
$t();
$uu=5?:0;
var_dump($uu);
if("foo" == 0)
echo $vvvv->getValue2();


$var1=new stdclass;
$var2=& $var1;
if($var1===$var2) echo PHP_EOL."jes";

$arr=[
    "prvinivo 1",
    "gd"=>[
        1 => "drugi nivo 2",
        "gfd"=> "drugi nivo 3",
        "fd" => "drugi"
    ],
    [
        5=>"drugi nivo novi",
        "gdf"=>"drugi nivo tri"
    ]
];

var_dump($arr);
function pass($arr,$indent=""){
    if(is_array($arr)){
        foreach($arr as $value){
            pass($value,$indent."&nbsp");
        }
    }
    else{
        echo $indent.$arr."<br/>";
    }
}
function interesante(array $arr, $indent="",$i=0){
   
    foreach($arr as $value){
        if(is_array($value)){
            interesante($arr,$indent."&nbsp");
        }else{
            echo $indent.$value;
        }
    }
}

function pass2(array $arr, $indent=""){
    foreach($arr as $key => $value){

        if(is_array($value)){
            echo $indent.$key.": <br>";
            pass2($value,$indent."&nbsp&nbsp");
        }else{
            echo $indent.$key.":".$value."<br/>";
        }
    }
}
pass2($arr);

function flatten(array $arr,$flatten=array()){
    foreach($arr as $value){
        if(is_array($value)){
            $flatten=flatten($value,$flatten);
        }
        else $flatten[]=$value;
    }
    return $flatten;
}
function flatten2( $arr,$flatten=array()){
    if(is_array($arr)){
        foreach($arr as $value){
           $flatten=flatten2($value,$flatten);
        }
    }else{
        $flatten[]=$arr;
    }
    
    return $flatten;
}
var_dump(flatten2($arr));
var_dump($_SERVER);var_dump($_REQUEST);
$func= function () use ($arr){
    echo "<br>weee";
    var_dump($arr);
};

?>