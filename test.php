<?php

echo $request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
echo $table = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));


?>
