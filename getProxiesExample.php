<?php 
require("class.objectvar.php"); 
require("class.XMLHttpRequest.php"); 
//get here http://www.moonlight21.com/class-XMLHttpRequest-php 
function check($method,$url,$vars=null){ 
    $ajax=new XMLHttpRequest(); 
    $ajax->open($method,$url,true); 
    $ajax->send($vars); 
    $response["text"]=$ajax->responseText; 
    $response["status"]=$ajax->status; 
    $response["allHeaders"]=$ajax->getAllResponseHeaders(); 
    return $response; 
} 
echo "<pre>"; 
for($o=1; $o<=2;$o++){ 
    $url = 'http://www.proxz.com/proxy_list_high_anonymous_' . $o . '.html'; 

    ${"result$o"} = check("GET",$url); 
    ${"pagina$o"} = new ObjectVar; 
    ${"pagina$o"}->create("url",$url); 
    
    //if(${"result$o"}['text']) ${"pagina$o"}->create("text",(${"result$o"}['text'])?${"result$o"}['text']:false); 
    if(${"result$o"}['status']) ${"pagina$o"}->create("status",(${"result$o"}['status'])?${"result$o"}['status']:false); 
    if(${"result$o"}['allHeaders']) ${"pagina$o"}->create("allHeaders",(${"result$o"}['allHeaders'])?${"result$o"}['allHeaders']:false); 
    
    if(${"result$o"}['text']){ 
        preg_match_all("/eval\(unescape\(\'(.*)\'\)\);/sim",${"result$o"}['text'],$tmp); 
        preg_match_all( '/<td>(\d+\.\d+\.\d+\.\d+)<\/td><td>(\d+)<\/td>/sim',urldecode($tmp[1][0]), $the_proxies ); 
        for( $i=0; $i<count($the_proxies[1])-1; $i++ ){ 
            $all_proxies[] = $the_proxies[1][$i].":".$the_proxies[2][$i]; 
        } 
        ${"pagina$o"}->create("proxies",$all_proxies); 
        unset($all_proxies); 
        unset(${"result$o"}); 
    } 
} 
for($p=1;$p<=ObjectVar::getNumInstances();$p++){ 
print_r(${"pagina$p"}); 
} 
echo "</pre>"; 
?> 
