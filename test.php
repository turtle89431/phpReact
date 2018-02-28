<?php
header("Access-Control-Allow-Origin: *"); 
include_once("./grab.php");
try{
$url=(isset($_GET['url']))?$_GET['url']:'';
$sec=(isset($_GET['s']))?'s':'';
$sel=(isset($_GET['sel']))?$_GET['sel']:'';
$path=(isset($_GET['path']))?$_GET['path']:'';
//$uri= sprintf("http%s://%s/%s",$sec,$url,$path);
$uri=sprintf("https://www.dice.com/jobs?q=Information+Technology&l=95965");
$test=file_get_html($uri);
$out = $test->find('#div.serp-result-content.bold-highlight');
echo json_encode($out);} catch(Exception $e) {
    echo($e->getMessage());
}
?>
