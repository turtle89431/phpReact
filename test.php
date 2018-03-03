<?php
 header("Access-Control-Allow-Origin: *");
require 'vendor/autoload.php';
//require 'Client.php';
use Goutte\Client;
$url =(isset($_GET['u']))?$_GET['u']:'https://www.symfony.com/blog/';
$sel =(isset($_GET['s']))?html_entity_decode($_GET['s']):'h2';
$args=(isset($_GET['args']))?$_GET['args']:'';
$aa=(isset($_GET['args']))?'?':null;
$ht = isset($_GET['html'])?true:false;
if($aa){
    $n=0;
foreach($args as $k=>$v){
    if ($n==0){
        $aa .=$k."=".$v;
    }else{
        $aa .="&".$k."=".$v;
    }
    $n++;
    $url .=$aa;
    $aa='';
}
$n=0;
}
$client = new Client();
$crawler = $client->request('GET',$url);
$out=$ht?'':array();
$crawler->filter($sel)->each(function ($node) {
   global $out,$ht;
   if(!$ht){
   $txt=$node->text();
   $href=$node->attr('href');
   $id=$node->attr('id');
   $html=$node->html();
   $tmp =array();
   isset($txt)?$tmp['txt']=$txt:'';
   isset($id)?$tmp['id']=$id:'';
   isset($href)?$tmp['href']=$href:'';
   array_push($out,$tmp);}else{
       $out.=$node->html();
   }
});

print($ht?$out:json_encode($out));
?>
