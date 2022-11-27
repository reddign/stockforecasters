<?php
function make_links_clickable($text)
{
   return preg_replace ('/http:\/\/[^\s]+/i', "<a href=\"${0}\">${0}</a>", $text);
} 

$result = make_links_clickable($text);

?>
