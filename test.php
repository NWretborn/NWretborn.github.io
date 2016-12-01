<?php
echo $_SERVER['PATH_INFO']
echo explode('/', trim($_SERVER['PHP_USER'],'/'));
#echo preg_replace('/[^a-z0-9_]+/i','',array_shift(explode('/', trim($_SERVER['PATH_INFO'],'/'));));
?>
