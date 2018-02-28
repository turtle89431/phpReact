<?php
use Sunra\PhpSimple\HtmlDomParser;
$dom = HtmlDomParser::file_get_html( $file_name );

$elems = $dom->find($elem_name);
?>
