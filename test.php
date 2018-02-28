<?php
require_once('Src/Sunra/PhpSimple/simplehtmldom_1_5/simple_html_dom.php');
use Sunra\PhpSimple\HtmlDomParser;
$dom = HtmlDomParser::file_get_html( $file_name );

$elems = $dom->find($elem_name);
?>
